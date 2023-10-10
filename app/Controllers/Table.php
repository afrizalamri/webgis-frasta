<?php

namespace App\Controllers;
use App\Models\DataAktual;
use App\Models\DataStakeout;

class table extends BaseController 
{
    public function __construct() {
        $this->DataAktual = new DataAktual();
        $this->DataStakeout = new DataStakeout();
    }
    
    public function tableAktual(): string
    {
        $data = [
            'judul' =>'Table Data Aktual',
            'page' =>'v_tableAktual',
            'AKTUAL' => $this->DataAktual->AllData()
        ];
        return view('v_template', $data);
    }

    public function tableStakeout(): string
    {
        $data = [
            'judul' =>'Table Data Stakeout',
            'page' =>'v_tableStakeout',
            'STAKEOUT' => $this->DataStakeout->AllData()
        ];
        return view('v_template', $data);
    }
}