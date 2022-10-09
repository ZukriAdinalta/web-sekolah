<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class KelasModel extends Model{
    protected $table = 'kelas';
    protected $primaryKey = 'id_kelas';
    protected $allowedFields = ['kelas'];
    
    public function getData($id = false){
      if($id == false){
      return $this->findAll();
      } else{
      return $this->where([ 'id_kelas' => $id])->first();
      }
    }

}