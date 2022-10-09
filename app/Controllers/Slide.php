<?php

namespace App\Controllers;

use App\Models\SlideModel;

class Slide extends BaseController
{
  public function __construct()
  {
    $this->SlideModel = new SlideModel();
  } 
    public function index()
    {
        $data = [
            'title' => 'Slide Show',
            'link' => $this->request->uri->getSegment(1),
            'slide' => $this->SlideModel->getSlide()
        ];
        return view('admin/slideshow/index', $data);
    }
/* ######################################### Add Data ########################################################## */
    public function add()
    {
      if($this->validate([
          'foto' => [
            'label'  => 'Foto',
            'rules'  => 'uploaded[foto]|max_size[foto,4048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
            'errors' => [
              'uploaded' => '{field} Wajib Di Upload',
              'max_size' => 'Ukuran {field} telalu besar',
              'is_image' => 'Yang anda pilih bukan {field}',
              'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
            ],], 
      ])){
        $foto = $this->request->getFile('foto');
        $namaFoto = $foto->getRandomName();
        $foto->move('img/slide/', $namaFoto);

        $data = [
          'judul' => $this->request->getVar('judul'),
          'foto' => $namaFoto
        ];
        $this->SlideModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('slide');
      }else{
        session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
        return redirect()->to('slide');
      }
    }
/* ######################################### Edit Data ########################################################## */
public function edit($id)
{
  if($this->validate([
      'foto' => [
        'label'  => 'Foto',
        'rules'  => 'max_size[foto,4048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => 'Ukuran {field} telalu besar',
          'is_image' => 'Yang anda pilih bukan {field}',
          'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
        ],], 
  ])){
    $foto = $this->request->getFile('foto');
    $fotoLama = $this->request->getVar('fotolama');
    if($foto->getError() == 4){
      $namaFoto = $fotoLama;
    }else{
    $namaFoto = $foto->getRandomName();
    $foto->move('img/slide/', $namaFoto);
    unlink('img/slide/' . $fotoLama);
    }
    $data = [
      'id' => $id,
      'judul' => $this->request->getVar('judul'),
      'foto' => $namaFoto
    ];
    $this->SlideModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('slide');
  }else{
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('slide');
  }
}
/* ######################################### Delete Data ########################################################## */
  public function delete($id){
    $foto = $this->SlideModel->find($id);
      if($foto['foto'] != ""){
          unlink('img/slide/' . $foto['foto']);
      }
    $this->SlideModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    return redirect()->to('slide');
  }
}