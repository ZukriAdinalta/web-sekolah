<?php

namespace App\Controllers;

use App\Models\MapelModel;

class Mapel extends BaseController
{
    public function __construct()
    {
      $this->MapelModel = new MapelModel();
    }

/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Mata Pelajaran',
            'link' => $this->request->uri->getSegment(1),
            'mapel' => $this->MapelModel->getMapel(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/mapel', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add(){
      if($this->validate([
        'nama_mapel' => [
          'label' => 'Nama Mata Pelajaran',
          'rules' => 'required|is_unique[mapel.nama_mapel]',
          'errors' => [
            'required' => '{field} Wajib Di isi',
            'is_unique' => '{field} Sudah Ada',
          ]]
      ])){
      $data = [
        'nama_mapel' => ucwords($this->request->getVar('nama_mapel')),
      ];

      $this->MapelModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
      return redirect()->to('mapel');
      } else {
        session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
        return redirect()->to('mapel');
      }
    }

/* ######################################### Edit Data ########################################################## */
    public function edit($id){
      if($this->validate([
        'nama_mapel' => [
          'label' => 'Nama Mata Pelajaran',
          'rules' => 'required|is_unique[mapel.nama_mapel]',
          'errors' => [
            'required' => '{field} Wajib Di isi',
            'is_unique' => '{field} Sudah Ada',
          ]]
      ])){
      $data = [
        'id' => $id,
        'nama_mapel' => ucwords($this->request->getVar('nama_mapel')),
      ];

      $this->MapelModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
      return redirect()->to('mapel');
    }else{
      session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
      return redirect()->to('mapel');
    }
    }

/* ######################################### Delete Data ########################################################## */
    public function delete($id){
      $this->MapelModel->delete($id);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('mapel');
    }
}