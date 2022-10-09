<?php

namespace App\Controllers;

use App\Models\FotoModel;
use App\Models\GalleryModel;

class Gallery extends BaseController
{
    public function __construct()
    {
      $this->GalleryModel = new GalleryModel();
      $this->FotoModel = new FotoModel();
    }
/* ######################################### Lihat Data ########################################################## */
    public function index()
    {
      
        $data = [
            'title' => 'Gallery',
            'link' => $this->request->uri->getSegment(1),
            'gallery' => $this->GalleryModel->list()
        ];
        return view('admin/gallery/index', $data);
    }
/* ######################################### Add Data ########################################################## */
    public function add()
    {
      if($this->validate([
        'nama_gallery' => [
          'label' => 'Nama Gallery',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Wajib Di Isi'
          ],],
          'sampul_gallery' => [
            'label'  => 'Sampul Gallery',
            'rules'  => 'max_size[sampul_gallery,2048]|is_image[sampul_gallery]|mime_in[sampul_gallery,image/png,image/jpg,image/jpeg]',
            'errors' => [
              'max_size' => 'Ukuran {field} telalu besar',
              'is_image' => 'Yang anda pilih bukan {field}',
              'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
            ],], 
      ])){
        $foto = $this->request->getFile('sampul_gallery');
        if($foto->getError() == 4){
          $namaFoto = 'gallery.jpg';
        }else{
          $namaFoto = $foto->getRandomName();
          $foto->move('img/gallery/', $namaFoto);
        }

        $data = [
          'nama_gallery' => $this->request->getVar('nama_gallery'),
          'sampul_gallery' => $namaFoto
        ];
        $this->GalleryModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
        return redirect()->to('gallery');
      }else{
        session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
        return redirect()->to('gallery');
      }
    }
/* ######################################### Edit Data ########################################################## */
public function edit($id)
{
  if($this->validate([
    'nama_gallery' => [
      'label' => 'Nama Gallery',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Wajib Di Isi'
      ],],
      'sampul_gallery' => [
        'label'  => 'Sampul Gallery',
        'rules'  => 'max_size[sampul_gallery,2048]|is_image[sampul_gallery]|mime_in[sampul_gallery,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => 'Ukuran {field} telalu besar',
          'is_image' => 'Yang anda pilih bukan {field}',
          'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
        ],], 
  ])){
    $foto = $this->request->getFile('sampul_gallery');
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
      'id_gallery' => $id,
      'nama_gallery' => $this->request->getVar('nama_gallery'),
      'sampul_gallery' => $namaFoto
    ];
    $this->GalleryModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('gallery');
  }else{
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('gallery');
  }
}
/* ######################################### Delete Data ########################################################## */
public function delete($id){
  $foto = $this->GalleryModel->find($id);
    if($foto['sampul_gallery'] != "gallery.jpg"){
        unlink('img/gallery/' . $foto['sampul_gallery']);
    }
  
    $foto2 =  $this->FotoModel->where('id_gallery', $id)->findColumn('foto');
      foreach($foto2 as $f){
        if($f != 'gallery.jpg'){
        unlink('img/gallery/'. $f );
      }
    }
    
  $this->GalleryModel->delete($id);
  $this->FotoModel->where('id_gallery', $id)->delete();
  session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
  return redirect()->to('gallery');
}

}