<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class MapelModel extends Model{
    protected $table = 'mapel';
    protected $allowedFields = ['nama_mapel'];
    
    public function getMapel($id = false){
      if($id == false){
        return $this->OrderBy('id', 'DESC')->findAll();
        } else{
        return $this->where([ 'id' => $id])->first();
        }
      }


}