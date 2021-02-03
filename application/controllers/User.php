<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      cekLogin();
   }


   public function index()
   {
      $data['title'] = 'My Profile';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      // var_dump($data);
      // die;
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('user/index', $data);
      $this->load->view('templates/footer');
   }

   public function edit()
   {
      $data['title'] = 'Edit Profile';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('user/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $name = $this->input->post('name');
         $email = $this->input->post('email');

         // cek jika ada gambar diupload
         $upload_image = $_FILES['image']['name'];

         if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
               $old_image = $data['user']['image'];
               if ($old_image != 'default.jpg') {
                  unlink(FCPATH . 'assets/img/profile/' . $old_image);
               }

               $new_image = $this->upload->data('file_name');
               $this->db->set('image', $new_image);
            } else {
               echo $this->upload->display_errors();
            }
         }

         $this->db->set('name', $name);
         $this->db->where('email', $email);
         $this->db->update('user');

         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Profile sudah diupdate!</div>');
         redirect('user');
      }
   }

   public function changePassword()
   {
      $data['title'] = 'Ubah Password';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->form_validation->set_rules('current_password', 'Current Password', 'trim|required');
      $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[5]|matches[new_password2]');
      $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[5]|matches[new_password1]');

      if ($this->form_validation->run() == FALSE) {
         //
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('user/changepassword', $data);
         $this->load->view('templates/footer');
      } else {
         $current_password = $this->input->post('current_password');
         $new_password = $this->input->post('new_password1');

         if (!password_verify($current_password, $data['user']['password'])) {
            // var_dump($data['user']['password']);
            // die;
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Password salah!</div>');
            redirect('user/changepassword');
         } else {
            if ($current_password == $new_password) {
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Password tidak boleh sama!</div>');
               redirect('user/changepassword');
            } else {
               // password benar
               $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

               $this->db->set('password', $password_hash);
               $this->db->where('email', $this->session->userdata('email'));
               $this->db->update('user');

               $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Password diubah!</div>');
               redirect('user/changepassword');
            }
         }
      }
   }
}

/* End of file User.php */
