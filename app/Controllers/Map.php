<?php

namespace App\Controllers;
class Map extends BaseController
{
    public function viewMapAktual(): string
    {
        $data = [
            'judul' =>'Aktual Bor',
            'page' =>'v_viewmap_aktual'
        ];
        return view('v_template', $data);
    }

    public function viewMapStakeout(): string
    {
        $data = [
            'judul' =>'Stakeout Bor',
            'page' =>'v_viewmap_stakeout'
        ];
        return view('v_template', $data);
    }
}