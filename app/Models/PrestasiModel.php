<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PrestasiModel extends Model{
    protected $table = 'prestasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['slug','judul','isi','foto'];

    public function getData($slug = false){
      if($slug == false){
      return $this->findAll();
      } else{
      return $this->where([ 'slug' => $slug])->first();
      }
    }
  
    public function getLimit()
    {
      return $this->db->table('prestasi')
      ->orderBy('prestasi.id', 'DESC')
      ->limit(3)
      ->get()
      ->getResultArray();
    } 

    public function getDetail($slug)
  {
    return $this->db->table('prestasi')
    ->where('prestasi.slug',  $slug)
    ->get()
    ->getRowArray();
  } 
    
}