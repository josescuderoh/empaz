<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DimensionesController extends Controller
{
    public function create(){
        return view("dimensiones.create");
    }
}
