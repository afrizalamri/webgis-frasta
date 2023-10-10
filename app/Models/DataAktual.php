<?php

namespace App\Models;

use CodeIgniter\Model;

class DataAktual extends Model
{
    public function AllData()
    {
        return $this->db->table('AKTUAL')
        ->get()->getResultArray();
    }
}
