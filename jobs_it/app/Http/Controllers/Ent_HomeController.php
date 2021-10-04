<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ent_HomeController extends Controller
{
    public function ent_home()
    {
        return view('ent.ent_home');
    }
}
