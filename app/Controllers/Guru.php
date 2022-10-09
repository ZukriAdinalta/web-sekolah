<?php

namespace App\Controllers;

use App\Models\GuruModel;
use App\Models\MapelModel;
use CodeIgniter\HTTP\Request;

class Guru extends BaseController
{
    public function __construct()
    {
      $this->GuruModel = new GuruModel();
      $this->MapelModel = new MapelModel();
    }

/* ######################################### Tampilkan Data ########################################################## */
    public function index()
    {
        $data = [
            'title' => 'Data Guru',
            'link' => $this->request->uri->getSegment(1),
            'guru' => $this->GuruModel->getGuru(),
            'mapel' => $this->MapelModel->getMapel()
        ];
        return view('admin/guru/index', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add(){
      $data = [
        'title' => 'Tambah Data Guru',
        'link' => $this->request->uri->getSegment(1),
        'guru' => $this->GuruModel->getGuru(),
        'mapel' => $this->MapelModel->getMapel(),
        'validation' => \Config\Services::validation(),
      ];

      return view('admin/guru/add', $data);
    }

    public function save(){
      if($this->validate([
        'nip' => [
          'label' => 'Nip',
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

                'id_mapel' => [
                  'label'  => 'Mata Pelajaran',
                  'rules'  => 'required',
                  'errors' => [
                      'required' => '{field} Wajib Di isi!!',
                  ],], 
    
                  'pendidikan' => [
                    'label'  => 'Pendidikan',
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
        $foto->move('img/guru/', $namaFoto);
        }
        $data = [
          'nip' => $this->request->getVar('nip'),
          'nama' => $this->request->getVar('nama'),
          'tempat_lahir' => $this->request->getVar('tempat_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'id_mapel' => $this->request->getVar('id_mapel'),
          'pendidikan' => $this->request->getVar('pendidikan'),
          'foto' => $namaFoto,
          
        ];
  
        $this->GuruModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Simpan');
        return redirect()->to('guru');
      }else{
        return redirect()->to('guru/add')->withInput();
      }
     
    }

/* ######################################### Edit Data ########################################################## */

    public function edit($id_guru){
        $data = [
          'title' => 'Edit Data Guru',
          'link' => $this->request->uri->getSegment(1),
          'guru' => $this->GuruModel->EditGuru($id_guru),
          'mapel' => $this->MapelModel->getMapel(),
          'validation' => \Config\Services::validation()
        ];
        return view('admin/guru/edit', $data);
    }

    public function update($id_guru){
      if($this->validate([
        'nip' => [
          'label' => 'Nip',
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

                'id_mapel' => [
                  'label'  => 'Mata Pelajaran',
                  'rules'  => 'required',
                  'errors' => [
                      'required' => '{field} Wajib Di isi!!',
                  ],], 
    
                  'pendidikan' => [
                    'label'  => 'Pendidikan',
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
          $foto->move('img/guru/', $namaFoto);
          }else{
            $namaFoto = $foto->getRandomName();
            $foto->move('img/guru/', $namaFoto);
            unlink('img/guru/' . $fotolama);
          }}
        $data = [
          'id_guru' => $id_guru,
          'nip' => $this->request->getVar('nip'),
          'nama' => $this->request->getVar('nama'),
          'tempat_lahir' => $this->request->getVar('tempat_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'tgl_lahir' => $this->request->getVar('tgl_lahir'),
          'id_mapel' => $this->request->getVar('id_mapel'),
          'pendidikan' => $this->request->getVar('pendidikan'),
          'foto' => $namaFoto,
          
        ];
  
        $this->GuruModel->save($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Edit');
        return redirect()->to('guru');
      }else{
        return redirect()->to('guru/edit')->withInput();
      }
    }

// /* ######################################### Delete Data ########################################################## */
    public function delete($id_guru){
      $foto = $this->GuruModel->find($id_guru);
        if($foto['foto'] != "profil.jpg"){
            unlink('img/guru/' . $foto['foto']);
        }
      $this->GuruModel->delete($id_guru);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('guru');
    }


}