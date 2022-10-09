<?php

namespace App\Controllers;

use App\Models\DownModel;

class Down extends BaseController
{
/* ######################################### Tampilan Data ########################################################## */
  public function __construct()
  {
    $this->DownModel = new DownModel();
  }
    public function index()
    {
        $data = [
            'title' => 'File Download',
            'link' => $this->request->uri->getSegment(1),
            'down' => $this->DownModel->findAll()
        ];
        return view('admin/download/index', $data);
    }

/* ######################################### Add Data ########################################################## */
public function add()
{
  if($this->validate([
    'nama' => [
      'label' => 'Nama File',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Wajib Di Isi'
      ],],
      'file' => [
        'label'  => 'File',
        'rules'  => 'uploaded[file]|ext_in[file,pdf,doc,docx]',
        'errors' => [
          'uploaded' => '{field} Wajib Di Upload',
          'ext_in' => '{field} Wajib PDF, Docx, Doc',
        ],], 
  ])){
        $file = $this->request->getFile('file');
        $namaFile =$file->getRandomName();
        $file->move( 'file/', $namaFile);

    $data = [
      'nama' => $this->request->getVar('nama'),
      'file' => $namaFile
    ];
    $this->DownModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('down');
  }else{
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('down');
  }
}
/* ######################################### Edit Data ########################################################## */
public function edit($id)
{
  if($this->validate([
    'nama' => [
      'label' => 'Nama File',
      'rules' => 'required',
      'errors' => [
        'required' => '{field} Wajib Di Isi'
      ],],
      'file' => [
        'label'  => 'File',
        'rules'  => 'ext_in[file,pdf,doc,docx]',
        'errors' => [
          'ext_in' => '{field} Wajib PDF, Docx, Doc',
        ],], 
  ])){
    $file = $this->request->getFile('file');
    $filelama = $this->request->getPost('filelama');
    if($file->getError() == 4){
      $namaFile = $filelama;
    }else{
        $namaFile = $file->getRandomName();
        $file->move('file/', $namaFile);
        unlink('file/' . $filelama);
    }

    $data = [
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
      'file' => $namaFile
    ];
    $this->DownModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Disimpan');
    return redirect()->to('down');
  }else{
    session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
    return redirect()->to('down');
  }
}
/* ######################################### Delete Data ########################################################## */
public function delete($id){
  $file = $this->DownModel->find($id);
    if($file['file'] != ""){
        unlink('file/' . $file['file']);
    }
  $this->DownModel->delete($id);
  session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
  return redirect()->to('down');
}


}