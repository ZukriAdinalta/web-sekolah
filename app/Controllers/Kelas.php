<?php

namespace App\Controllers;

use App\Models\KelasModel;

class Kelas extends BaseController
{
    public function __construct()
    {
      $this->KelasModel = new KelasModel();
    }

/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Kelas',
            'link' => $this->request->uri->getSegment(1),
            'kelas' => $this->KelasModel->getData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/kelas', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add(){
      if($this->validate([
        'kelas' => [
          'label' => 'Nama Kelas',
          'rules' => 'required|is_unique[kelas.kelas]',
          'errors' => [
            'required' => '{field} Wajib Di isi',
            'is_unique' => '{field} Sudah Ada',
          ]]
      ])){
      $data = [
        'kelas' => $this->request->getVar('kelas'),
      ];

      $this->KelasModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
      return redirect()->to('kelas');
    }else {
      session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
      return redirect()->to('kelas');
    }}

/* ######################################### Edit Data ########################################################## */
    public function edit($id){
      if($this->validate([
        'kelas' => [
          'label' => 'Nama Kelas',
          'rules' => 'required|is_unique[kelas.kelas]',
          'errors' => [
            'required' => '{field} Wajib Di isi',
            'is_unique' => '{field} Sudah Ada',
          ]]
      ])){
      $data = [
        'id_kelas' => $id,
        'kelas' => $this->request->getVar('kelas'),
      ];

      $this->KelasModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
      return redirect()->to('kelas');
    }else {
      session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
      return redirect()->to('kelas');
    }
    }

/* ######################################### Delete Data ########################################################## */
    public function delete($id){
      $this->KelasModel->delete($id);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('kelas');
    }



}