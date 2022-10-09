<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\GalleryModel;

class foto extends BaseController
{
    public function __construct()
    {
      $this->FotoModel = new FotoModel();
      $this->GalleryModel = new GalleryModel();
    } 
/* ######################################### Tampil Data ########################################################## */
    public function index($id_gallery)
    {
        $data = [
            'title' => 'Foto Gallery',
            'link' => $this->request->uri->getSegment(1),
            'foto' => $this->FotoModel->getFoto($id_gallery),
            'gallery' => $this->GalleryModel->getData($id_gallery)
        ];
        return view('admin/gallery/foto', $data);
    }

/* ######################################### Add Data ########################################################## */
public function add($id)
{
  if($this->validate([
    'ket_foto' => [
      'label' => 'Keterangan Foto',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Wajib Di Isi'
      ],],
      'foto' => [
        'label'  => 'Foto',
        'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => 'Ukuran {field} telalu besar',
          'is_image' => 'Yang anda pilih bukan {field}',
          'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
        ],], 
  ])){
    $foto = $this->request->getFile('foto');
    if($foto->getError() == 4){
      $namaFoto = 'gallery.jpg';
    }else{
      $namaFoto = $foto->getRandomName();
      $foto->move('img/gallery/', $namaFoto);
    }

    $data = [
      'id_gallery' => $this->request->getPost('id_gallery'),
      'ket_foto' => $this->request->getVar('ket_foto'),
      'foto' => $namaFoto
    ];
    $this->FotoModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('foto/index/'.$id);
  }else{
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('foto/index/'.$id);
  }
}

/* ######################################### Edit Data ########################################################## */
public function edit($id)
{
  if($this->validate([
    'ket_foto' => [
      'label' => 'Keterangan Foto',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Wajib Di Isi'
      ],],
      'foto' => [
        'label'  => 'Foto',
        'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
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
      if($fotoLama == 'gallery.jpg'){
        $namaFoto = $foto->getRandomName();
        $foto->move('img/gallery/', $namaFoto);
      }else{
        $namaFoto = $foto->getRandomName();
        $foto->move('img/gallery/', $namaFoto);
        unlink('img/gallery/' . $fotoLama);
      }
    }

    $data = [
      'id_foto' => $id,
      'id_gallery' => $this->request->getPost('id_gallery'),
      'ket_foto' => $this->request->getVar('ket_foto'),
      'foto' => $namaFoto
    ];
    $gallery = $this->request->getPost('id_gallery');
    $this->FotoModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('foto/index/'.$gallery);
  }else{
    $gallery = $this->request->getPost('id_gallery');
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('foto/index/'. $gallery);
  }
}
/* ######################################### Delete Data ########################################################## */
  public function delete($id){
    $foto = $this->FotoModel->find($id);
      if($foto['foto'] == "gallery.jpg"){
      }else{
        unlink('img/gallery/' . $foto['foto']);
      }
    $gallery = $this->request->getPost('id_gallery');
    $this->FotoModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    return redirect()->to('foto/index/'.$gallery);
  }
}