<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function __construct()
    {
      $this->UserModel = new UserModel();
    }
    public function index()
    {
      $data = [
        'title' => 'Halaman Users',
        'users' => $this->UserModel->findAll(),
        'link' => $this->request->uri->getSegment(1),
      ];

      return view('admin/users/index', $data);
    }

/* ######################################### Tambah Data ########################################################## */
    public function add(){
      $data = [
        'title' => 'Tambah Data Guru',
        'link' => $this->request->uri->getSegment(1),
        'users' => $this->UserModel->findAll(),
        'validation' => \Config\Services::validation(),
      ];

      return view('admin/users/add', $data);
    }

    public function save()
    { 
        if($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                ],],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[users.username]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ],],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                  'max_size' => 'Ukuran {field} telalu besar',
                  'is_image' => 'Yang anda pilih bukan {field}',                      
                  'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                    ],], 
            'password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[6]|max_length[16]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'min_length' => '{field} Minimal 6 Digit',
                    'max_length' => '{field} Maksimal 16 Digit'
                    ],],
            'password1' => [
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'matches' => '{field} & Password Tidak Sama',
                    ],],
            'level' => [
                    'label'  => 'Status',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Di isi!!',
                    ],], 
        ])){
          $foto = $this->request->getFile('foto');
          if($foto->getError() == 4){
            $namaFoto = 'profil.jpg';
          }else{
          $namaFoto = $foto->getRandomName();
          $foto->move('img/guru/', $namaFoto);
          }
            $data = [
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'level' => $this->request->getVar('level'),
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'foto' => $namaFoto,
            ];
            $this->UserModel->save($data);
            session()->getFlashdata('pesan', 'Data Berhasil Di Simpan');
            return redirect()->to('users');
        } else{
            return redirect()->to('users/add')->withInput();

        }
    }
/* ######################################### Edit Data ########################################################## */
    public function edit($id)
    {
        $data = [
          'title' => 'Edit Data Guru',
          'link' => $this->request->uri->getSegment(1),
          'users' => $this->UserModel->getData($id),
          'validation' => \Config\Services::validation(),
        ];
        return view('admin/users/edit', $data);
    }


    public function update($id)
    { 

    $UsernameLama = $this->UserModel->getData($this->request->getVar('id'));
      if($UsernameLama['username'] == $this->request->getVar('username') ){
        $rule_username = 'required';
      }else {
        $rule_username = 'required|is_unique[users.username]';
      }

        if($this->validate([
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi'
                ],],
            'username' => [
                'label' => 'Username',
                'rules' => $rule_username,
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'is_unique' => '{field} Sudah Ada'
                ],],
            'foto' => [
                'label'  => 'Foto',
                'rules'  => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                  'max_size' => 'Ukuran {field} telalu besar',
                  'is_image' => 'Yang anda pilih bukan {field}',                      
                  'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
                    ],], 
            'level' => [
                    'label'  => 'Status',
                    'rules'  => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Di isi!!',
                    ],], 
        ])){
            $foto = $this->request->getFile('foto');
            $fotolama = $this->request->getPost('fotolama');
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
                }
            }
            $data = [
                'id' => $id,
                'nama' => $this->request->getVar('nama'),
                'username' => $this->request->getVar('username'),
                'foto' => $namaFoto,
                'level' => $this->request->getVar('level'),
            ];
            $this->UserModel->edit($data);
            session()->getFlashdata('pesan', 'Profil Berhasil Di Ubah');
            return redirect()->to('users');
        } else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('users/edit/'. $id)->withInput();

        }
    }
/* ######################################### Ganti Password ########################################################## */
    public function reset($id){
      if($this->validate([
          'repassword' => [
              'label' => 'Password Baru',
              'rules' => 'required|min_length[6]|max_length[16]',
              'errors' => [
                  'required' => '{field} Wajib Diisi',
                  'min_length' => '{field} Minimal 6 Digit',
                  'max_length' => '{field} Maksimal 6 Digit'
                  ],],
          'konpassword' => [
              'label' => 'Konfirmasi Password',
              'rules' => 'required|matches[repassword]',
              'errors' => [
                  'required' => '{field} Wajib Diisi',
                  'matches' => '{field} & Password Baru Tidak Sama',
                  ],],
      ])){
          $data = [
              'id' => $id,
              'password' => password_hash($this->request->getVar('konpassword'), PASSWORD_DEFAULT),
          ];
          $this->UserModel->save($data);
          session()->getFlashdata('pesan', 'Password Berhasil Di Ubah');
          return redirect()->to('users');
      }else{
          session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
          return redirect()->to('users');
      }
  }
/* ######################################### Delete Data ########################################################## */
    public function delete($id){
      $foto = $this->UserModel->find($id);
        if($foto['foto'] != "profil.jpg"){
            unlink('img/guru/' . $foto['foto']);
        }
      $this->UserModel->delete($id);
      session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
      return redirect()->to('users');
    }
}