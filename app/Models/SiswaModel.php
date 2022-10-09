<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SiswaModel extends Model{
    protected $table = 'siswa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis','nama','tempat_lahir', 'tgl_lahir','foto', 'id_kelas'];


  public function getSiswa($id = false){
    if($id == false){
    return $this->findAll();
    } else{
    return $this->where([ 'id' => $id])->first();
    }
  }

  public function getData(){
    return $this->db->table('siswa')
      ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left' )->orderBy('id', 'Desc')
      ->get()
      ->getResultArray();
  }

  public function getEdit($id){
    return $this->db->table('siswa')
    ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left' )
    ->where('siswa.id', $id)
    ->get()
    ->getRowArray();
  }


}