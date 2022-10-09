<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    public function __construct()
    {
      $this->SiswaModel = new SiswaModel();
      $this->KelasModel = new KelasModel();
    }
/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Halaman Siswa',
            'link' => $this->request->uri->getSegment(1),
            'siswa' => $this->SiswaModel->getData(),
        ];
        return view('admin/siswa/index', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add()
    {
        $data = [
          'title' => 'Tambah Data Siswa',
          'link' => $this->request->uri->getSegment(1),
          'kelas' => $this->KelasModel->getData(),
          'validation' => \Config\Services::validation(),
            ];
            return view('admin/siswa/add', $data);
    }

    public function save()
    {
      if($this->validate([
        'nis' => [
          'label' => 'Nis',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Wajib Di Isi'
          ],],
        
          'nama' => [
            'label'  => 'Nama',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
            'tempat_lahir' => [
              'label'  => 'Tempat Lahir',
              'rules'  => 'required',
              'errors' => [
                  'required' => '{field} Wajib Di isi!!',
              ],], 

              'tgl_lahir' => [
                'label'  => 'Tanggal Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi!!',
                ],], 

                'id_kelas' => [
                  'label'  => 'Kelas',
                  'rules'  => 'required',
                  'errors' => [
                      'required' => '{field} Wajib Di isi!!',
                  ],], 

                    'foto' => [
                      'label'  => 'Foto',
                      'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                      'errors' => [
                        'max_size' => 'Ukuran {field} telalu besar',
                        'is_image' => 'Yang anda pilih bukan {field}',
                        'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                      ],], 
      ]
      )){
        $foto = $this->request->getFile('foto');
        if($foto->getError() == 4){
          $namaFoto = 'profil.jpg';
        }else{
        $namaFoto = $foto->getRandomName();
        $foto->move('img/siswa/', $namaFoto);
        }
        $data = [
          'nis' => $this->request->getVar('nis'),
          'nama' => $this->request->getVar('nama'),
          'tempat_lahir' => $this->request->getVar('tempat_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'id_kelas' => $this->request->getVar('id_kelas'),
          'foto' => $namaFoto,
          
        ];
  
        $this->SiswaModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
        return redirect()->to('siswa');
      }else{
        return redirect()->to('siswa/add')->withInput();
      }
    }
/* ######################################### Edit Data ########################################################## */
    public function edit($id)
    {
      $data = [
        'title' => 'Edit Data Siswa',
        'link' => $this->request->uri->getSegment(1),
        'siswa' => $this->SiswaModel->getEdit($id),
        'kelas' => $this->KelasModel->getData(),
        'validation' => \Config\Services::validation(),
      ];

      return view('admin/siswa/edit', $data);
    }

    public function update($id){
      if($this->validate([
        'nis' => [
          'label' => 'Nis',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Wajib Di Isi'
          ],],
        
          'nama' => [
            'label'  => 'Nama',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
            'tempat_lahir' => [
              'label'  => 'Tempat Lahir',
              'rules'  => 'required',
              'errors' => [
                  'required' => '{field} Wajib Di isi!!',
              ],], 

              'tgl_lahir' => [
                'label'  => 'Tanggal Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di isi!!',
                ],], 
    
                  'id_kelas' => [
                    'label'  => 'Kelas',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Di isi!!',
                    ],], 

                    'foto' => [
                      'label'  => 'Foto',
                      'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                      'errors' => [
                        'max_size' => 'Ukuran {field} telalu besar',
                        'is_image' => 'Yang anda pilih bukan {field}',
                        'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                      ],], 
      ]
      )){
        $foto = $this->request->getFile('foto');
        $fotolama = $this->request->getVar('fotolama');
        if($foto->getError() == 4){
          $namaFoto = $fotolama;
        }else{
          if($fotolama == 'profil.jpg'){
          $namaFoto = $foto->getRandomName();
          $foto->move('img/siswa/', $namaFoto);
          }else{
            $namaFoto = $foto->getRandomName();
            $foto->move('img/siswa/', $namaFoto);
            unlink('img/siswa/' . $fotolama);
          }}
        $data = [
          'id' => $id,
          'nis' => $this->request->getVar('nis'),
          'nama' => $this->request->getVar('nama'),
          'tempat_lahir' => $this->request->getVar('tempat_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'id_kelas' => $this->request->getVar('id_kelas'),
          'foto' => $namaFoto,
          
        ];
  
        $this->SiswaModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
        return redirect()->to('siswa');
      }else{
        return redirect()->to('siswa/edit')->withInput();
      }
    }
/* ######################################### Delete Data ########################################################## */
  public function delete($id){
    $foto = $this->SiswaModel->find($id);
      if($foto['foto'] != "profil.jpg"){
          unlink('img/siswa/' . $foto['foto']);
      }
    $this->SiswaModel->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
    return redirect()->to('siswa');
  }

  }