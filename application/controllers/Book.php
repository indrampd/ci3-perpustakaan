<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Perpustakaan_model', 'book');
      // $this->load->model('Perpustakaan_model', 'pinjam');
      cekLogin();
   }

   public function index()
   {
      $data['title'] = 'Data Buku';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['book'] = $this->book->lihatBuku();
      // var_dump($data);
      // die;

      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('book/index', $data);
      $this->load->view('templates/footer');
   }

   public function detailBuku($slug)
   {
      $data['title'] = 'Detail Buku';
      $data['menu'] = $this->db->get_where('user_menu')->row_array();
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['book'] = $this->book->lihatBuku($slug);

      $user_id = $this->session->userdata('id');
      $data['pinjam'] = $this->book->lihatPinjam($user_id)->result_array();

      $this->form_validation->set_rules('user_id', 'User ID', 'required');
      $this->form_validation->set_rules('book_id', 'book ID', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('book/detailbuku', $data);
         $this->load->view('templates/footer');
      } else {
         $dataPinjam = [
            'user_id' => $this->input->post('user_id'),
            'book_id' => $this->input->post('book_id'),
            'date_created' => time()
         ];

         // var_dump($dataPinjam);
         // die;
         $this->db->insert('pinjam', $dataPinjam);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Buku berhasil dipinjam!</div>');
         redirect('book/pinjam');
      }
   }

   public function pinjam()
   {
      $data['title'] = 'Data Peminjaman Buku';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['book'] = $this->book->lihatBuku();

      $user_id = $this->session->userdata('id');
      $data['pinjam'] = $this->book->lihatPinjam($user_id)->result_array();


      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('book/pinjam', $data);
      $this->load->view('templates/footer');
   }
}
