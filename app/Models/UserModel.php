<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class UserModel extends Model{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
    protected $allowedFields = ['nama','username','password', 'level', 'foto', 'updated'];


    public function getData($id = false){
        if($id == false){
        return $this->findAll();
        } else{
        return $this->where([ 'id' => $id])->first();
        }
      }
      
      public function edit($data){
        return $this->db->table('users')
        ->where('id', $data['id'])
        ->update($data);
      }
}