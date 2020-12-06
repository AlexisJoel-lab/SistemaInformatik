<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use App\Models\categoria;

class SistemaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = categoria::all();
        return view('sistema',compact('categorias'));
    }
}
