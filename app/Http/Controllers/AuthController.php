<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function me(){

        return nl2br("nis : 3103118092 \n
            nama : Mugi Sekar Rahayu \n
            gender : Female \n
            phone : 082136571083 \n
            class : XII RPL 3"); 
    }
}
