<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
   }
   public function index()
   {
      if ($this->session->userdata('email')) {
         redirect('user');
      }

      $this->form_validation->set_rules(
         'email',
         'Email',
         'trim|required|valid_email',
         [
            'required' => '{field} harus diisi!',
            'valid_email' => 'Masukan {field} terdaftar!'
         ]
      );
      $this->form_validation->set_rules(
         'password',
         'Password',
         'trim|required',
         [
            'required' => '{field} harus diisi!',
         ]
      );

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Login Page | Perpustakaan'
         ];
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/login');
         $this->load->view('templates/auth_footer');
      } else {
         // validasi sukses
         $this->_login();
      }
   }

   private function _login()
   {
      if ($this->session->userdata('email')) {
         redirect('user');
      }

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      // jika user ada
      if ($user) {
         // jika user aktif
         if ($user['is_active'] == 1) {
            // cek password
            if (password_verify($password, $user['password'])) {
               // 
               $data = [
                  'email' => $user['email'],
                  'role_id' => $user['role_id']
               ];
               $this->session->set_userdata($user);
               if ($user['role_id'] == 1) {
                  redirect('admin');
               } else {
                  redirect('user');
               }
            } else {
               // password tidak sesuai
               $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
               Password salah!</div>');
               redirect('auth');
            }
         } else {
            // user tidak aktif
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Email belum diaktivasi!</div>');
            redirect('auth');
         }
      } else {
         // user tidak ada
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Email belum terdaftar!</div>');
         redirect('auth');
      }
      // var_dump($user);
      // die;
   }

   public function register()
   {
      if ($this->session->userdata('email')) {
         redirect('user');
      }

      $this->form_validation->set_rules(
         'name',
         'Name',
         'required|trim',
         [
            'required' => '{field} harus diisi!'
         ]
      );
      $this->form_validation->set_rules(
         'email',
         'Email',
         'required|trim|valid_email|is_unique[user.email]',
         [
            // 'required' => '{field} harus diisi!',
            'valid_email' => 'Masukan {field} yang benar!',
            'is_unique' => '{field} sudah terdaftar!'
         ]
      );
      $this->form_validation->set_rules(
         'password1',
         'Password',
         'required|trim|min_length[3]|matches[password2]',
         [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek'
         ]
      );
      $this->form_validation->set_rules(
         'password2',
         'Password',
         'required|trim|matches[password2]'
      );

      if ($this->form_validation->run() == false) {
         $data = [
            'title' => 'Register | Perpustakaan'
         ];
         $this->load->view('templates/auth_header', $data);
         $this->load->view('auth/register');
         $this->load->view('templates/auth_footer');
      } else {
         $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
         ];

         $this->db->insert('user', $data);

         // $this->_sendEmail();

         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Selamat! Anda sudah terdaftar, Silahkan login!</div>');
         redirect('auth');
      }
   }

   // private function _sendEmail()
   // {
   //    $config = [
   //       'protocol' => 'smtp',
   //       'smptp_host' => 'ssl://smtp.googlemail.com',
   //       'smtp_user' => 'praktikumpbo21@gmail.com',
   //       'smtp_pass' => '---',
   //       'smtp_port' => 465,
   //       'mail_type' => 'html',
   //       'charset' => 'utf-8',
   //       'newline' => "\r\n"

   //    ];

   //    $this->load->library('email', $config);
   //    $this->email->initialize($config);

   //    $this->email->from('praktikumpbo21@gmail.com', 'Praktikum PBO');
   //    $this->email->to('indrampd21@gmail.com');
   //    $this->email->subject('testing');
   //    $this->email->message('Hello World!');

   //    if ($this->email->send()) {
   //       return true;
   //    } else {
   //       echo $this->email->print_debugger();
   //       die;
   //    }
   // }

   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');

      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Kamu sudah logout!</div>');
      redirect('auth');
   }

   public function blocked()
   {
      $data['title'] = 'Ferbodden!';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $this->load->view('templates/header', $data);
      $this->load->view('auth/blocked', $data);
      $this->load->view('templates/footer');
   }

   public function forgotPassword()
   {
      $data = [
         'title' => 'Lupa Password | Perpustakaan'
      ];
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/forgot-password');
      $this->load->view('templates/auth_footer');
   }
}
