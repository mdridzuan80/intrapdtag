<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        //return view('acara.index');
    }

    public function create(Request $request)
    {

        return view('acara.create');
    }

}
