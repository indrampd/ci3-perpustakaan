<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Perpustakaan_model', 'book');
      cekLogin();
   }

   public function index()
   {
      $data['title'] = 'Dashboard';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['admincount'] = $this->db->get_where('user', ['role_id' => 1])->num_rows();
      $data['membercount'] = $this->db->get_where('user', ['role_id' => 2])->num_rows();
      $data['bookcount'] = $this->db->get('book')->num_rows();
      $data['pinjamcount'] = $this->book->lihatPinjam()->num_rows();

      // var_dump($data['pinjam']);
      // die;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer');
   }

   public function role()
   {
      $data['title'] = 'Role';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['role'] = $this->db->get('user_role')->result_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('templates/footer');
   }

   public function roleAccess($role_id)
   {
      $data['title'] = 'Role Akses';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

      $this->db->where('id !=', 1);

      $data['menu'] = $this->db->get('user_menu')->result_array();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role-access', $data);
      $this->load->view('templates/footer');
   }

   public function changeAccess()
   {
      $menu_id = $this->input->post('menuId');
      $role_id = $this->input->post('roleId');

      $data = [
         'role_id' => $role_id,
         'menu_id' => $menu_id
      ];

      $result = $this->db->get_where('user_access_menu', $data);
      // var_dump($result);
      // die;

      if ($result->num_rows() < 1) {
         $this->db->insert('user_access_menu', $data);
      } else {
         $this->db->delete('user_access_menu', $data);
      }
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
               Akses berhasil diubah!</div>');
   }


   public function dataBuku()
   {
      $data['title'] = 'Kelola Buku Perpustakaan';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['book'] = $this->book->lihatBuku();

      // var_dump($data['book']);
      // die;

      // var_dump($data['book']);

      $this->form_validation->set_rules('judul', 'Judul', 'required|is_unique[book.judul]');
      $this->form_validation->set_rules('penulis', 'Penulis', 'required');
      $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('admin/databuku', $data);
         $this->load->view('templates/footer');
      } else {
         $databook['judul'] = $this->input->post('judul');
         $databook['slug'] = url_title($databook['judul'], '-', TRUE);
         $databook['penulis'] = $this->input->post('penulis');
         $databook['penerbit'] = $this->input->post('penerbit');
         $databook['created_at'] = time();
         $databook['updated_at'] = time();

         // jika gambar diupload
         // $upload_image = $_FILES['sampul']['name'];

         $config['allowed_types'] = 'gif|jpg|png|svg';
         $config['max_size']     = '5000';
         $config['upload_path'] = './assets/img/sampul';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('sampul')) {
            $databook['sampul'] = $this->upload->data('file_name');
         } else {
            $databook['sampul'] = 'default.png';
         }

         $this->db->insert('book', $databook);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Buku berhasil ditambahkan!</div>');
         redirect('admin/databuku');
      }
   }

   public function deleteBuku($slug)
   {
      $data['book'] = $this->book->lihatBuku($slug);
      $old_image = $data['book']['sampul'];

      if ($old_image != 'default.jpg') {
         unlink(FCPATH . 'assets/img/sampul/' . $old_image);
      }

      $this->db->where('slug', $slug);
      $this->db->delete('book');

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Buku berhasil dihapus!</div>');
      redirect('admin/databuku');
   }

   public function editBuku($slug)
   {
      $data['title'] = 'Edit Buku';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['book'] = $this->book->lihatBuku($slug);

      // var_dump($data['book']);
      // die;

      $this->form_validation->set_rules('penulis', 'Penulis', 'required');
      $this->form_validation->set_rules('penerbit', 'Penerbit', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('admin/editbuku', $data);
         $this->load->view('templates/footer');
      } else {

         $penulis = $this->input->post('penulis');
         $penerbit = $this->input->post('penerbit');
         $sinopsis = $this->input->post('sinopsis');
         $updated_at = time();


         $upload_image = $_FILES['sampul']['name'];


         if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']     = '5000';
            $config['upload_path'] = './assets/img/sampul';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('sampul')) {
               $old_image = $data['book']['sampul'];
               if ($old_image != 'default.jpg') {
                  unlink(FCPATH . 'assets/img/sampul/' . $old_image);
               }
               $new_image = $this->upload->data('file_name');
               $this->db->set('sampul', $new_image);
            } else {
               echo $this->upload->display_errors();
            }
         }
         // die;
         $this->db->set('penulis', $penulis);
         $this->db->set('penerbit', $penerbit);
         $this->db->set('sinopsis', $sinopsis);
         $this->db->set('updated_at', $updated_at);
         $this->db->where('slug', $slug);
         $this->db->update('book');


         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Buku berhasil diedit!</div>');
         redirect('admin/databuku');
      }
   }


   public function dataPinjam()
   {
      $data['title'] = 'Kelola Data Pinjam';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['book'] = $this->book->lihatBuku();

      // $user_id = $this->session->userdata('id');
      $data['pinjam'] = $this->book->lihatPinjam()->result_array();


      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/datapinjam', $data);
      $this->load->view('templates/footer');
   }

   public function bukuKembali($id)
   {

      $data['pinjam'] = $this->book->lihatPinjam($id)->result_array();

      $this->db->where('id', $id);
      $this->db->delete('pinjam');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Buku telah dikembalikan!</div>');
      redirect('admin/datapinjam');
   }
}

/* End of file User.php */
