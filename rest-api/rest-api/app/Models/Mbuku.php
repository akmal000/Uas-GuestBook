<?php

namespace App\Models;

use CodeIgniter\Model;

class Mbuku extends Model
{
   protected $table = 'buku';

   public function getBuku($id = false)
   {
      if ($id === false) {
         return $this->findAll();
      } else {
         return $this->getWhere(['id' => $id])->getRowArray();
      }
   }
   public function insertBuku($data)
   {
      $query = $this->db->table($this->table)->insert($data);
      if ($query) {
         return true;
      } else {
         return false;
      }
   }
   public function updateBuku($data, $id)
   {
      return $this->db->table($this->table)->update($data, ['id' => $id]);
   }
   public function deleteBuku($id)
   {
      return $this->db->table($this->table)->delete(['id' => $id]);
   }
}
