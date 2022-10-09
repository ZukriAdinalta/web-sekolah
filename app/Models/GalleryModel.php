<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class GalleryModel extends Model{
    protected $table = 'gallery';
    protected $primaryKey = 'id_gallery';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_gallery', 'sampul_gallery'];


  public function getData($id = false){
    if($id == false){
    return $this->findAll();
    } else{
    return $this->where([ 'id_gallery' => $id])->first();
    }
  }

  public function list()
  {
    
    return $this->db->table('gallery')
    ->select('gallery. *, count(foto.id_gallery) as jml_foto')
    ->join('foto', 'foto.id_gallery = gallery.id_gallery', 'left')
    ->groupBy('gallery.id_gallery')
    ->orderBy('gallery.id_gallery', 'DESC')
    ->get()->getResultArray();
  }


}