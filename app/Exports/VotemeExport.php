<?php

namespace App\Exports;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\vote_me;

/**
 * Description of VotemeExport
 *
 * @author user
 */
class VotemeExport implements FromCollection{
    //put your code here
    use Exportable;
     
    public function collection()
    {
        return vote_me::all();
    }
}
