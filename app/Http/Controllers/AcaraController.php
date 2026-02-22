<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function index()
    {
        return view('acara.index');
    }

    public function create(Request $request)
    {

        return view('acara.create');
    }

    public function hadir($slug)
    {
        $acara = \App\Models\Acara::where('slug', $slug)->firstOrFail();
        return view('acara.hadir', compact('acara'));
    }

    public function status($id      )
    {
        $kehadiran = \App\Models\Kehadiran::where('uuid', $id)->firstOrFail();
        return view('acara.status', compact('kehadiran'));
    }

}
