<?php

namespace App\Controllers;

use App\Models\PengumumanModel;

class Pengumuman extends BaseController
{
    public function __construct()
    {
      $this->PengumumanModel = new PengumumanModel();
    } 
/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Halaman Pengumuman',
            'link' => $this->request->uri->getSegment(1),
            'pengumuman' => $this->PengumumanModel->getData(),
        ];
        return view('/admin/pengumuman/index', $data);
    }
/* ######################################### Tambah Data ########################################################## */
    public function add()
    {
        $data = [
            'title' => 'Tambah Data Pengumuman',
            'link' => $this->request->uri->getSegment(1),
            'pengumuman' => $this->PengumumanModel->getData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('/admin/pengumuman/add', $data);
    }
    public function save()
    {
      if($this->validate([
        'nama' => [
          'label' => 'Judul Pengumuman',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Wajib Di Isi'
          ],],

          'isi' => [
            'label' => 'Isi Pengumuman',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Di Isi'
            ],],
      ])){
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data = [
          'slug' => $slug,
          'nama' => ucwords($this->request->getVar('nama')),
          'isi' => $this->request->getVar('isi')
        ];

        $this->PengumumanModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil di simpan');
        return redirect()->to('pengumuman');
      }else{
        return redirect()->to('pengumuman/add')->withInput();
      }
    }

/* ######################################### Edit Data ########################################################## */
    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Data Pengumuman',
            'link' => $this->request->uri->getSegment(1),
            'pengumuman' => $this->PengumumanModel->getData($slug),
            'validation' => \Config\Services::validation(),
        ];
        return view('/admin/pengumuman/edit', $data);
    }
    
    public function update($id)
    {

      $JudulLama = $this->PengumumanModel->getData($this->request->getPost('slug'));
      if($JudulLama['nama'] == $this->request->getVar('nama') ){
        $rule_judul = 'required';
      }else {
        $rule_judul = 'required|is_unique[pengumuman.nama]';
      }

      if($this->validate([
        'nama' => [
          'label' => 'Judul Pengumuman',
          'rules' => $rule_judul,
          'errors' => [
            'required' => '{field} Wajib Di Isi',
            'is_unique' => '{field} Sudah Ada'
          ],],

          'isi' => [
            'label' => 'Isi Pengumuman',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Wajib Di Isi'
            ],],
      ])){
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $data = [
          'id' => $id,
          'slug' => $slug,
          'nama' => ucwords($this->request->getVar('nama')),
          'isi' => $this->request->getVar('isi')
        ];

        $this->PengumumanModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil di simpan');
        return redirect()->to('pengumuman');
      }else{
        return redirect()->to('pengumuman/edit/' . $this->request->getVar('slug') )->withInput();
      }
    }
/* ######################################### Delete Data ########################################################## */
    public function delete($id){
      $this->PengumumanModel->delete($id);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('pengumuman');
    }
}