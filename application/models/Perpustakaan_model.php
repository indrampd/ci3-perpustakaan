<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Perpustakaan_model extends CI_Model
{
   public function lihatBuku($slug = false)
   {
      if ($slug == false) {
         return $this->db->get('book')->result_array();
      } else {
         return $this->db->get_where('book', ['slug' => $slug])->row_array();
      }
   }

   public function lihatPinjam($user_id = false)
   {
      if ($user_id == false) {

         $query = "SELECT pinjam.* , `user`.`name`, `book`.`judul`
                  FROM `pinjam` 
                  JOIN `user` ON `pinjam`.`user_id` = `user`.`id`
                  JOIN `book` ON `pinjam`.`book_id` = `book`.`id`
               ";
      } else {
         $query = "SELECT pinjam.* , `user`.`name`, `book`.`judul`
                  FROM `pinjam` 
                  JOIN `user` ON `pinjam`.`user_id` = `user`.`id`
                  JOIN `book` ON `pinjam`.`book_id` = `book`.`id`
                  WHERE `pinjam`.`user_id` = $user_id
               ";
      }
      return $this->db->query($query);
   }
}

/* End of file ModelName.php */
