<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class SlideModel extends Model{
    protected $table = 'slideshow';
    protected $allowedFields = ['judul', 'foto'];

  public function getSlide($id = false){
    if($id == false){
      return $this->findAll();
      } else{
      return $this->where([ 'id' => $id])->first();
      }
  }

}