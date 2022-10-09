<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class FotoModel extends Model{
    protected $table = 'foto';
    protected $primaryKey = 'id_foto';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_gallery' , 'ket_foto', 'foto'];

    public function getData($id = false){
      if($id == false){
      return $this->findAll();
      } else{
      return $this->where([ 'id_gallery' => $id])->findAll();
      }
    }

    public function getFoto($id_gallery)
    {
     return $this->db->table('foto')
      ->join('gallery', 'gallery.id_gallery = foto.id_gallery', 'left' )
      ->where('foto.id_gallery', $id_gallery)
      ->get()
      ->getResultArray();
    }

    // public function add($data){
    //   return $this->db->table('foto')->insert($data);
    // }

}