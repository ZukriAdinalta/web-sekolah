<?php

namespace App\Controllers;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        if(session('id')){
            return redirect()->to('admin');
        }
        $data = [
            'title' => 'Halaman Login',
        ];
        return view('login/index', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if($data){
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id'            => $data['id'],
                    'nama'          => $data['nama'],
                    'username'      => $data['username'],
                    'level'         => $data['level'],
                    'foto'          => $data['foto'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('admin');
            }else{
                $session->setFlashdata('pesan', 'Password Salah');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('pesan', 'Username Tidak Ada');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}