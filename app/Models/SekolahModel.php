<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SekolahModel extends Model{
    protected $table = 'tentang';
    protected $allowedFields = ['logo', 'title', 'title2', 'email', 'tlpn', 'alamat', 'map','visiMisi' , 'sejarah', 'fotoKepsek', 'kepalaSekolah', 'organisasi'];

    public function getData($id = false){
      if($id == false){
      return $this->findAll();
      } else{
      return $this->where([ 'id' => $id])->first();
    }
  }
}