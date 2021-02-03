<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Menu_model');
      $this->load->model('Menu_model', 'menu');
      cekLogin();
   }


   public function index()
   {
      $data['title'] = 'Menu Management';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['menu'] =  $this->db->get('user_menu')->result_array();
      // var_dump($data);
      // die;

      $this->form_validation->set_rules('menu', 'Menu', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/index', $data);
         $this->load->view('templates/footer');
      } else {
         $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Menu berhasil ditambahkan!</div>');
         redirect('menu');
      }
   }


   public function deleteMenu($id)
   {

      $this->db->where('id', $id);
      $this->db->delete('user_menu');

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Menu berhasil dihapus!</div>');
      redirect('menu');
   }


   public function updateMenu($id)
   {
      $data['title'] = 'Ubah Menu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['menu'] = $this->Menu_model->getMenuById($id);

      $this->form_validation->set_rules('menu', 'menu', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/updatemenu', $data);
         $this->load->view('templates/footer');
      } else {
         $this->Menu_model->ubahMenu();
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Nama Menu Berhasil Diubah!</div>');
         redirect('menu');
      }
   }

   public function subMenu()
   {
      $data['title'] = 'Submenu Management';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

      $data['subMenu'] = $this->menu->getSubMenu();
      $data['menu'] = $this->db->get('user_menu')->result_array();

      // var_dump($data);
      // die;

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required');
      $this->form_validation->set_rules('icon', 'icon', 'required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/submenu', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menu_id'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
         ];
         $this->db->insert('user_sub_menu', $data);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Submenu baru ditambahkan!</div>');
         redirect('menu/submenu');
      }
   }


   public function deleteSUbMenu($id)
   {

      $this->db->where('id', $id);
      $this->db->delete('user_sub_menu');

      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Sub Menu berhasil dihapus!</div>');
      redirect('menu/submenu');
   }


   public function updateSubMenu($id)
   {
      $data['title'] = 'Edit Submenu';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['submenu'] =  $this->Menu_model->getSubMenuById($id);
      $data['menu'] = $this->menu->getMenu()->result_array();
      $id_submenu = $data['submenu']['menu_id'];

      $data['menu_id'] = $data['menu'][$id_submenu - 1];

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('menu_id', 'Menu', 'required');
      $this->form_validation->set_rules('url', 'URL', 'required');
      $this->form_validation->set_rules('icon', 'Icon', 'required');
      $this->form_validation->set_rules('is_active', 'Is_Active', 'required');

      if ($this->form_validation->run() == FALSE) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/sidebar', $data);
         $this->load->view('templates/topbar', $data);
         $this->load->view('menu/update-sub-menu', $data);
         $this->load->view('templates/footer');
      } else {
         $this->Menu_model->ubahSubMenu();
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Submenu Berhasil Diubah!</div>');
         redirect('menu/submenu');
      }
   }
}

/* End of file Controllername.php */
