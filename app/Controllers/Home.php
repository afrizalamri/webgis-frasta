<?php

namespace App\Controllers;
use App\Models\DataAktual;
use App\Models\DataStakeout;

class Home extends BaseController
{

    public function __construct() {
        $this->DataAktual = new DataAktual();
        $this->DataStakeout = new DataStakeout();
    }
    
    public function index(): string
    {
        $data = [
            'judul' =>'Dashboard',
            'page' =>'v_dashboard',
            'AKTUAL' => $this->DataAktual->AllData(),
            'STAKEOUT' => $this->DataStakeout->AllData()
        ];
        return view('v_template', $data);
    }

}