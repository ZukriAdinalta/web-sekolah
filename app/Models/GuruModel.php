<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class GuruModel extends Model{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip','nama','tempat_lahir', 'tgl_lahir', 'pendidikan' ,'foto', 'id_mapel'];


  public function getGuru(){
    return $this->db->table('guru')
      ->join('mapel', 'mapel.id = guru.id_mapel', 'left' )
      ->orderBy('id_guru', 'DESC')
      ->get()
      ->getResultArray();
  }

  public function EditGuru($id_guru){
    return $this->db->table('guru')
    ->join('mapel', 'mapel.id = guru.id_mapel', 'left' )
    ->where('guru.id_guru', $id_guru)
    ->get()
    ->getRowArray();
  }

  public function getLimit()
  {
    return $this->db->table('guru')
    ->join('mapel', 'mapel.id = guru.id_mapel', 'left' )
    ->orderBy('guru.id_guru', 'DESC')
    ->limit(4)
    ->get()
    ->getResultArray();
  } 

}