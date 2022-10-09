<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\UserModel;

class Berita extends BaseController
{

    public function __construct()
    {
      $this->BeritaModel = new BeritaModel();  
      $this->UserModel = new UserModel();
    } 
/* ######################################### Lihat Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Halaman Berita',
            'link' => $this->request->uri->getSegment(1),
            'berita' => $this->BeritaModel->getBerita(),
            'user' => $this->UserModel->findAll()
        ];
        return view('admin/berita/index', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add()
    {
        $data = [
            'title' => 'Halaman Berita',
            'link' => $this->request->uri->getSegment(1),
            'berita' => $this->BeritaModel->getData(),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/berita/add', $data);
    }

    public function save()
    {
        if($this->validate([
            'judul' => [
                'label' => 'Judul Berita',
                'rules' => 'required|is_unique[berita.judul]',
                'errors' => [
                    'required' => '{field} Wajib Di Isi',
                    'is_unique' => '{field} Sudah Ada'
                ],],
            'gambar' => [
                'label' => 'Gambar Berita',
                'rules' => 'is_image[gambar]|max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} telalu besar',
                    'is_image' => 'Yang anda pilih bukan {field}',
                    'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                ], ],
            'isi' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ]
            ]
        ])){
            $foto = $this->request->getFile('gambar');
            if($foto->getError() == 4){
                $namafoto = 'berita.jpg';
            }else{
                $namafoto = $foto->getRandomName();
                $foto->move('img/berita', $namafoto);
            }
            $slug = url_title($this->request->getVar('judul'), '-', true);
            $data = [
                'judul' => ucwords($this->request->getVar('judul')),
                'slug' => $slug,
                'isi' => $this->request->getVar('isi'),
                'gambar' => $namafoto,
                'id_user' => session()->get('id')
            ];
            $this->BeritaModel->save($data);
            session()->getFlashdata('pesan', 'Data Berhasil Di Simpan');
            return redirect()->to('berita');
        }else{
            session()->getFlashdata('pesan', 'Data Gagal Di Simpan');
            return redirect()->to('berita/add')->withInput();
        }
    }
/* ######################################### Edit Data ########################################################## */
    public function edit($slug)
    {
        $data = [
            'title' => 'Halaman Berita',
            'link' => $this->request->uri->getSegment(1),
            'berita' => $this->BeritaModel->getData($slug),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/berita/edit', $data);
    }

    public function update($id)
    {
        // cek judul
      $BeritaLama = $this->BeritaModel->getData($this->request->getVar('slug'));
      if($BeritaLama['judul'] == $this->request->getVar('judul') ){
        $rule_judul = 'required';
      }else {
        $rule_judul = 'required|is_unique[berita.judul]';
      }
        if($this->validate([
            'judul' => [
                'label' => 'Judul Berita',
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} Wajib Di Isi',
                    'is_unique' => '{field} Sudah Ada'
                ],],
            'gambar' => [
                'label' => 'Gambar Berita',
                'rules' => 'is_image[gambar]|max_size[gambar,1024]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} telalu besar',
                    'is_image' => 'Yang anda pilih bukan {field}',
                    'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                    ], ],
            'isi' => [
                'label' => 'Isi Berita',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi'
                ],],
        ])){

            $foto = $this->request->getFile('gambar');
            $fotolama = $this->request->getVar('gambarlama');

            if($foto->getError() == 4){
                $namaGambar = $fotolama;
            }else{
                if($fotolama == 'berita.jpg'){
                    $namaGambar =  $foto->getRandomName();
                    $foto->move('img/berita', $namaGambar);
                } else{
                    $namaGambar =  $foto->getRandomName();
                    $foto->move('img/berita', $namaGambar);
                    unlink('img/berita/'. $fotolama );
                }
            }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $data = [
            'id_berita' => $id,
            'judul' => ucwords($this->request->getVar('judul')),
            'slug' => $slug,
            'gambar' => $namaGambar,
            'isi' => $this->request->getVar('isi'),
        ];

        $this->BeritaModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil Di Simpan');
        return redirect()->to('berita');
            
        }else{
        $slug = $this->request->getVar('slug');
        return redirect()->to('berita/edit/' . $slug)->withInput();
        }
    }
/* ######################################### Delete Data ########################################################## */
    public function delete($id)
    {
        $foto = $this->BeritaModel->find($id);
        if($foto['gambar'] != 'berita.jpg'){
            unlink('img/berita/' . $foto['gambar']);
        }

        $this->BeritaModel->delete($id);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('berita');
    }

    
}