<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\SekolahModel;
use App\Models\UserModel;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->HomeModel = new HomeModel();
        $this->SekolahModel = new SekolahModel();
    }
    public function index()
    {
        
        $data = [
            'title' => 'Home',
            'link' => $this->request->uri->getSegment(1),
            'totalGuru' => $this->HomeModel->totalGuru(), 
            'totalSiswa' => $this->HomeModel->totalSiswa(), 
            'totalBerita' => $this->HomeModel->totalBerita(),  
            'totalPrestasi' => $this->HomeModel->totalPrestasi(), 
        ];
        return view('admin/index', $data);
    }

    public function profil()
    {
        $data = [
            'title' => 'Profil',
            'link' => $this->request->uri->getSegment(1),
            'user' => $this->UserModel->find(session()->get('id')),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/profil', $data);
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
            ];
            $this->UserModel->edit($data);
            session()->getFlashdata('pesan', 'Profil Berhasil Di Ubah');
            return redirect()->to('admin/profil');
        } else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('admin/profil');

        }
    }
    public function reset(){
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
                'id' => session()->get('id'),
                'password' => password_hash($this->request->getVar('konpassword'), PASSWORD_DEFAULT),
            ];
            $this->UserModel->save($data);
            session()->getFlashdata('errors', 'Password Berhasil Di Ubah');
            return redirect()->to('admin/profil');
        }else{
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('admin/profil');
        }
    }
}