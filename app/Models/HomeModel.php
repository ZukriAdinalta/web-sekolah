<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{

    public function totalGuru(){
      return $this->db->table('guru')->countAll();
    }

    public function totalSiswa(){
      return $this->db->table('siswa')->countAll();
    }

    public function totalBerita(){
      return $this->db->table('berita')->countAll();
    }
    
    public function totalPrestasi(){
      return $this->db->table('prestasi')->countAll();
    }
}