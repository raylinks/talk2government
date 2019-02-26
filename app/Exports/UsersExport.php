<?php
namespace App\Exports;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\User;

/**
 * Description of UsersExport
 *
 * @author user
 */
class UsersExport implements FromCollection{
    //put your code here
    use Exportable;
     
    public function collection()
    {
        return User::all();
    }
}
