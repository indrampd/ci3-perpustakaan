<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
   public function getMenu()
   {
      return $this->db->get('user_menu');
   }

   public function getSubMenu()
   {
      $query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                  ORDER BY `user_sub_menu`.`url` ASC 
               ";
      return $this->db->query($query)->result_array();
   }

   public function getMenuById($id)
   {
      return $this->db->get_where('user_menu', ['id' => $id])->row_array();
   }

   public function getSubMenuById($id)
   {
      return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
   }


   public function ubahMenu()
   {
      $id = $this->input->post('id', true);
      $menu = $this->input->post('menu', true);
      $this->db->set('menu', $menu);
      $this->db->where('id', $id);
      $this->db->update('user_menu');
   }

   public function ubahSubMenu()
   {
      $data = [
         'id' => $this->input->post('id', true),
         'title' => $this->input->post('title', true),
         'menu_id' => $this->input->post('menu_id'),
         'url' => $this->input->post('url'),
         'icon' => $this->input->post('icon'),
         'is_active' => $this->input->post('is_active')
      ];
      $this->db->set('id', $data['id']);
      $this->db->set('title', $data['title']);
      $this->db->set('menu_id', $data['menu_id']);
      $this->db->set('url', $data['url']);
      $this->db->set('icon', $data['icon']);
      $this->db->set('is_active', $data['is_active']);
      $this->db->where('id', $data['id']);
      $this->db->update('user_sub_menu');
   }
}

/* End of file Menu_model.php */
