<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class BeritaModel extends Model{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug' ,'isi', 'views','gambar', 'id_user',];


  public function getData($slug = false){
    if($slug == false){
    return $this->findAll();
    } else{
    return $this->where([ 'slug' => $slug])->first();
    }
  }

  public function getBerita()
  {
    return $this->db->table('berita')
    ->join('users', 'users.id = berita.id_user', 'left')
    ->orderBy('berita.id_berita', 'DESC')
    ->get()
    ->getResultArray();
  } 

  public function getDetail($slug)
  {
    return $this->db->table('berita')
    ->join('users', 'users.id = berita.id_user', 'left')
    ->where('berita.slug',  $slug)
    ->get()
    ->getRowArray();
  } 

  public function getLimit()
  {
    return $this->db->table('berita')
    ->join('users', 'users.id = berita.id_user', 'left')
    ->orderBy('berita.id_berita', 'DESC')
    ->limit(5)
    ->get()
    ->getResultArray();
  } 

  public function getPopuler()
  {
    return $this->db->table('berita')
    ->join('users', 'users.id = berita.id_user', 'left')
    ->orderBy('berita.views', 'DESC')
    ->limit(5)
    ->get()
    ->getResultArray();
  } 

  function update_counter($slug)
    {
        $this->db->table('berita')
        ->where('slug', $slug)
        ->select('views'); 
        $count = $this->db->table('berita')->get()->getRow();

        $this->db->table('berita')->where('slug', $slug)
        ->set('views', ($count->views + 1))
        ->update();
    }

}