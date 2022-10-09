<?php

namespace App\Controllers;

use App\Models\PrestasiModel;

class Prestasi extends BaseController
{
  public function __construct()
  {
    $this->PrestasiModel = new PrestasiModel();
  }
/* ######################################### Prestasi Sekolah ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Prestasi Sekolah',
            'link' => $this->request->uri->getSegment(1),
            'prestasi' => $this->PrestasiModel->orderBy('id', 'DESC')->getData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/prestasi/index', $data);
    }
/* ######################################### Tambah Data ########################################################## */
    public function add()
    {
      // dd($this->PrestasiModel->findColumn('judul'));
        $data = [
          'title' => 'Prestasi Sekolah',
          'link' => $this->request->uri->getSegment(1),
          'prestasi' => $this->PrestasiModel->getData(),
          'validation' => \Config\Services::validation()
        ];
        return view('admin/prestasi/add', $data);
    }

    public function save()
    {

        if($this->validate([
            'judul' => [
                'label' => 'Judul Prestasi',
                'rules' => 'required|is_unique[prestasi.judul]',
                'errors' => [
                    'required' => '{field} Wajib Di Isi',
                    'is_unique' => '{field} Sudah Ada'
                ],],
            'foto' => [
                'label' => 'Foto Prestasi',
                'rules' => 'is_image[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} telalu besar',
                    'is_image' => 'Yang anda pilih bukan {field}',
                    'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                ], ],
            'isi' => [
                'label' => 'Isi Prestasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ]
            ]
        ])){
            $foto = $this->request->getFile('foto');
            if($foto->getError() == 4){
                $namafoto = 'prestasi.jpg';
            }else{
                $namafoto = $foto->getRandomName();
                $foto->move('img/prestasi', $namafoto);
            }
            $slug = url_title($this->request->getVar('judul'), '-', true);
            $data = [
                'slug' => $slug,
                'judul' => ucwords($this->request->getVar('judul')),
                'isi' => $this->request->getVar('isi'),
                'foto' => $namafoto,
            ];
            $this->PrestasiModel->save($data);
            session()->getFlashdata('pesan', 'Data Berhasil Di Simpan');
            return redirect()->to('prestasi');
        }else{
            session()->getFlashdata('pesan', 'Data Gagal Di Simpan');
            return redirect()->to('prestasi/add')->withInput();
        }
    }
/* ######################################### Edit Data ########################################################## */
public function edit($slug)
{
    $data = [
        'title' => 'Halaman Prestasi',
        'link' => $this->request->uri->getSegment(1),
        'prestasi' => $this->PrestasiModel->getData($slug),
        'validation' => \Config\Services::validation()
    ];
    return view('admin/prestasi/edit', $data);
}

public function update($id)
{
    // cek judul
  $PrestasiLama = $this->PrestasiModel->getData($this->request->getVar('slug'));
  if($PrestasiLama['judul'] == $this->request->getVar('judul') ){
    $rule_judul = 'required';
  }else {
    $rule_judul = 'required|is_unique[prestasi.judul]';
  }
    if($this->validate([
        'judul' => [
            'label' => 'Judul Prestasi',
            'rules' => $rule_judul,
            'errors' => [
                'required' => '{field} Wajib Di Isi',
                'is_unique' => '{field} Sudah Ada'
            ],],
        'foto' => [
            'label' => 'Foto Prestasi',
            'rules' => 'is_image[foto]|max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
            'errors' => [
                'max_size' => 'Ukuran {field} telalu besar',
                'is_image' => 'Yang anda pilih bukan {field}',
                'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                ], ],
        'isi' => [
            'label' => 'Isi Prestasi',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Wajib Di Isi'
            ],],
    ])){

        $foto = $this->request->getFile('foto');
        $fotolama = $this->request->getVar('fotolama');

        if($foto->getError() == 4){
            $namafoto = $fotolama;
        }else{
            if($fotolama == 'prestasi.jpg'){
                $namafoto =  $foto->getRandomName();
                $foto->move('img/prestasi', $namafoto);
            } else{
                $namafoto =  $foto->getRandomName();
                $foto->move('img/prestasi', $namafoto);
                unlink('img/prestasi/'. $fotolama );
            }
        }
    $slug = url_title($this->request->getVar('judul'), '-', true);
    $data = [
        'id' => $id,
        'slug' => $slug,
        'judul' => ucwords($this->request->getVar('judul')),
        'foto' => $namafoto,
        'isi' => $this->request->getVar('isi'),
    ];

    $this->PrestasiModel->save($data);
    session()->getFlashdata('pesan', 'Data Berhasil Di Simpan');
    return redirect()->to('prestasi');
        
    }else{
    $slug = $this->request->getVar('slug');
    return redirect()->to('prestasi/edit/' . $slug)->withInput();
    }
}
/* ######################################### Delete Data ########################################################## */
  public function delete($id)
  {
      $foto = $this->PrestasiModel->find($id);
      if($foto['foto'] != 'prestasi.jpg'){
          unlink('img/prestasi/' . $foto['foto']);
      }

      $this->PrestasiModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    return redirect()->to('prestasi');
  }

}