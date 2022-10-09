<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // jika user belum login
        if(! session()->get('logged_in')){
          session()->setFlashdata('pesan','Anda Belum Login');
          // maka redirct ke halaman login
          return redirect()->to('login'); 
      }
 
        // if(session()->level == ''){
        //     session()->setFlashdata('pesan','Anda Belum Login');
        //         return redirect()->to('login'); 
        //     }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
        if(session()->level == 2){
          return redirect()->to('admin/index'); 
        }
        
    }
}