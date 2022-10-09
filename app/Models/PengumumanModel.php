<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class PengumumanModel extends Model{
    protected $table = 'pengumuman';
    protected $useTimestamps = true;
    protected $allowedFields = ['slug','nama','isi','foto'];


  public function getData($slug = false){
    if($slug == false){
    return $this->OrderBy('id', 'DESC')->findAll();
    } else{
    return $this->where([ 'slug' => $slug])->first();
    }
  }

  public function getLimit()
  {
    return $this->db->table('pengumuman')
    ->orderBy('pengumuman.id', 'DESC')
    ->limit(3)
    ->get()
    ->getResultArray();
  } 

  public function getDetail($slug)
  {
    return $this->db->table('pengumuman')
    ->where('pengumuman.slug',  $slug)
    ->get()
    ->getRowArray();
  } 


}