<?php

namespace App\Controllers;

use App\Models\Mbuku;
use CodeIgniter\RESTful\ResourceController;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class buku extends ResourceController
{
   protected $format = 'json';
   protected $modelName = 'use App\Models\Mbuku';

   public function __construct()
   {
      $this->mbuku = new Mbuku();
   }

   public function index()
   {
      $mbuku = $this->mbuku->getBuku();

      foreach ($mbuku as $row) {
         $mbuku_all[] = [
            'id' => intval($row['id']),
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'no_kamar' => $row['no_kamar'],
         ];
      }

      return $this->respond($mbuku_all, 200);
   }
   public function create()
   {
      $nama = $this->request->getPost('nama');
      $alamat = $this->request->getPost('alamat');
      $no_kamar = $this->request->getPost('no_kamar');

      $data = [
         'nama' => $nama,
         'alamat' => $alamat,
         'no_kamar' => $no_kamar
      ];

      $simpan = $this->mbuku->insertBuku($data);

      if ($simpan == true) {
         $output = [
            'status' => 200,
            'message' => 'Berhasil menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Gagal menyimpan data',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
   public function show($id = null)
   {
      $mbuku = $this->mbuku->getBuku($id);

      if (!empty($mbuku)) {
         $output = [
            'id' => intval($mbuku['id']),
            'nama' => $mbuku['nama'],
            'alamat' => $mbuku['alamat'],
            'no_kamar' => $mbuku['no_kamar'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];

         return $this->respond($output, 400);
      }
   }

   public function edit($id = null)
   {
      $mbuku = $this->mbuku->getBuku($id);

      if (!empty($mbuku)) {
         $output = [
            'id' => intval($mbuku['id']),
            'nama' => $mbuku['nama'],
            'alamat' => $mbuku['alamat'],
            'no_kamar' => $mbuku['no_kamar'],
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => 400,
            'message' => 'Data tidak ditemukan',
            'data' => ''
         ];
         return $this->respond($output, 400);
      }
   }
  public function update($id = null)
   {
      // menangkap data dari method PUT, DELETE
      $data = $this->request->getRawInput();

      // cek data berdasarkan id
      $mbuku = $this->mbuku->getTodo($id);

      //cek todo
      if (!empty($mbuku)) {
         // update data
         $updateBuku = $this->mbuku->updateBuku($data, $id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses melakukan update'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal melakukan update'
         ];

         return $this->respond($output, 400);
      }
   }
   public function delete($id = null)
   {
      // cek data berdasarkan id
      $mbuku = $this->mbuku->getBuku($id);

      //cek todo
      if (!empty($mbuku)) {
         // delete data
         $deleteBuku= $this->mbuku->deleteBuku($id);

         $output = [
            'status' => true,
            'data' => '',
            'message' => 'sukses hapus data'
         ];

         return $this->respond($output, 200);
      } else {
         $output = [
            'status' => false,
            'data' => '',
            'message' => 'gagal hapus data'
         ];

         return $this->respond($output, 400);
      }
   }
}