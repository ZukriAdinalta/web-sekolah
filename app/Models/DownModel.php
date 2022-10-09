<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class DownModel extends Model{
    protected $table = 'file';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'file'];

  public function getMapel(){
    return $this->findAll();
  }

}