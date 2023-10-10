<?php

namespace App\Models;

use CodeIgniter\Model;

class DataStakeout extends Model
{
    public function AllData()
    {
        return $this->db->table('STAKEOUT')
        ->get()->getResultArray();
    }
}
