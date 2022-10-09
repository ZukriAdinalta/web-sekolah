<?php

namespace App\Controllers;

use App\Models\SekolahModel;

class Sekolah extends BaseController
{
  public function __construct()
  {
    $this->SekolahModel = new SekolahModel();
  }
/* ######################################### Visi Dan Misi ########################################################## */
    public function visiMisi($id)
    {
        $data = [
            'title' => 'Visi Dan Misi',
            'link' => $this->request->uri->getSegment(1),
            'sekolah' => $this->SekolahModel->getData($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sekolah/visimisi', $data);
    }

    public function updateVisimisi($id){

      $data = [
        'id' => $id,
        'visiMisi' => $this->request->getVar('visiMisi')
      ];

      $this->SekolahModel->save($data);
      session()->getFlashdata('pesan', 'Data Berhasil Di Ubah');
      return redirect()->to('sekolah/visiMisi/'.$id)->withInput();

    }
/* ######################################### Sejarah ########################################################## */

    public function Sejarah($id)
    {
        $data = [
            'title' => 'Sejarah Sekolah',
            'link' => $this->request->uri->getSegment(1),
            'sekolah' => $this->SekolahModel->getData($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sekolah/sejarah', $data);
    }

    public function updateSejarah($id){
      // dd($this->request->getPost());

      $data = [
        'id' => $id,
        'sejarah' => $this->request->getVar('sejarah')
      ];

      $this->SekolahModel->save($data);
      session()->getFlashdata('pesan', 'Data Berhasil Di Ubah');
      return redirect()->to('sekolah/sejarah/'.$id)->withInput();
    }

/* ######################################### Organisasi ########################################################## */

    public function Organisasi($id)
    {
        $data = [
            'title' => 'Organisasi Sekolah',
            'link' => $this->request->uri->getSegment(1),
            'sekolah' => $this->SekolahModel->getData($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sekolah/organisasi', $data);
    }

    public function updateOrganisasi($id){

      if($this->validate([
        'organisasi' => [
          'label'  => 'Struktur Organisasi',
          'rules'  => 'max_size[organisasi,2048]|is_image[organisasi]|mime_in[organisasi,image/png,image/jpg,image/jpeg]',
          'errors' => [
            'max_size' => 'Ukuran {field} telalu besar',
            'is_image' => 'Yang anda pilih bukan {field}',
            'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
          ],], 
    ])){
      $foto = $this->request->getFile('organisasi');
      $fotolama = $this->request->getVar('fotolama');

       if($foto->getError() == 1){
         $namaFoto = $fotolama;
          }else{
           if($fotolama == 'guru.jpg'){
              $namaFoto =  $foto->getRandomName();
              $foto->move('img/berita', $namaFoto);
            } else{
               $namaFoto =  $foto->getRandomName();
               $foto->move('img/berita', $namaFoto);
                unlink('img/berita/'. $fotolama );
           }
          }
           
      $data = [
        'id' => $id,
        'organisasi' => $namaFoto
      ];

      $this->SekolahModel->save($data);
      session()->getFlashdata('pesan', 'Data Berhasil Di Ubah');
      return redirect()->to('sekolah/organisasi/'.$id)->withInput();
    }else{
      return redirect()->to('sekolah/organisasi/'.$id)->withInput();
    }
  }
/* ######################################### Logo ########################################################## */
    public function logo($id)
    {
        $data = [
            'title' => 'Logo',
            'link' => $this->request->uri->getSegment(1),
            'sekolah' => $this->SekolahModel->getData($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sekolah/logo', $data);
}

      public function updateLogo($id){

        if($this->validate([
          'title' => [
            'label'  => 'Nama Sekola',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
          'title2' => [
            'label'  => 'Nama Sekola',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
          'logo' => [
            'label'  => 'Struktur logo',
            'rules'  => 'max_size[logo,2048]|is_image[logo]|mime_in[logo,image/png,image/jpg,image/jpeg]',
            'errors' => [
              'max_size' => 'Ukuran {field} telalu besar',
              'is_image' => 'Yang anda pilih bukan {field}',
              'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
            ],], 
      ])){
        $foto = $this->request->getFile('logo');
        $fotolama = $this->request->getVar('fotolama');

        if($foto->getError() == 4){
          $namaFoto = $fotolama;
            }else{
            if($fotolama == 'logo.png'){
                $namaFoto =  $foto->getRandomName();
                $foto->move('img/berita', $namaFoto);
              } else{
                $namaFoto =  $foto->getRandomName();
                $foto->move('img/berita', $namaFoto);
                  unlink('img/berita/'. $fotolama );
            }
            }
            
        $data = [
          'id' => $id,
          'logo' => $namaFoto,
          'title' => $this->request->getVar('title'),
          'title2' => $this->request->getVar('title2'),
        ];

        $this->SekolahModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to('sekolah/logo/'.$id)->withInput();
      }else{
        return redirect()->to('sekolah/logo/'.$id)->withInput();
      }
      }

/* ######################################### Kontak ########################################################## */
    public function updateKontak($id){

      if($this->validate([
        'email' => [
          'label'  => 'Email Sekola',
          'rules'  => 'required',
          'errors' => [
              'required' => '{field} Wajib Di isi!!',
          ],], 
        'tlpn' => [
          'label'  => 'Telpon Sekolah',
          'rules'  => 'required',
          'errors' => [
              'required' => '{field} Wajib Di isi!!',
          ],], 
        'alamat' => [
          'label'  => 'Alamat Sekolah',
          'rules'  => 'required',
          'errors' => [
              'required' => '{field} Wajib Di isi!!',
          ],], 

          'map' => [
            'label'  => 'Map Sekolah',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],], 
        
    ])){  
      $data = [
        'id' => $id,
        'email' => $this->request->getVar('email'),
        'alamat' => $this->request->getVar('alamat'),
        'map' => $this->request->getVar('map'),
        'tlpn' => $this->request->getVar('tlpn'),
      ];

      $this->SekolahModel->save($data);
      session()->getFlashdata('msg', 'Data Berhasil Di Ubah');
      return redirect()->to('sekolah/logo/'.$id)->withInput();
    }else{
      return redirect()->to('sekolah/logo/'.$id)->withInput();
    }
    }

/* ######################################### Kepsek ########################################################## */
public function kepsek($id)
    {
        $data = [
            'title' => 'Kepala Sekolah',
            'link' => $this->request->uri->getSegment(1),
            'sekolah' => $this->SekolahModel->getData($id),
            'validation' => \Config\Services::validation()
        ];
        return view('admin/sekolah/kepsek', $data);
}

      public function updatekepsek($id){

        if($this->validate([
          'kepalaSekolah' => [
            'label'  => 'Profil Kepala Sekolah',
            'rules'  => 'required',
            'errors' => [
                'required' => '{field} Wajib Di isi!!',
            ],],  
          'fotoKepsek' => [
            'label'  => 'Foto Kepala Sekolah',
            'rules'  => 'max_size[fotoKepsek,2048]|is_image[fotoKepsek]|mime_in[fotoKepsek,image/png,image/jpg,image/jpeg]',
            'errors' => [
              'max_size' => 'Ukuran {field} telalu besar',
              'is_image' => 'Yang anda pilih bukan {field}',
              'mime_in' => 'Format {field} Wajib JPEG,JPG,PNG'
            ],], 
      ])){
        $foto = $this->request->getFile('fotoKepsek');
        $fotolama = $this->request->getVar('fotolama');

        $namaFoto =  $foto->getRandomName();
        $foto->move('img/guru', $namaFoto);
        unlink('img/guru/'. $fotolama );
            
        $data = [
          'id' => $id,
          'fotoKepsek' => $namaFoto,
          'kepalaSekolah' => $this->request->getVar('kepalaSekolah'),
        ];

        $this->SekolahModel->save($data);
        session()->getFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to('sekolah/kepsek/'.$id)->withInput();
      }else{
        return redirect()->to('sekolah/kepsek/'.$id)->withInput();
      }
      }

}