<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function index (Request $request)
    {
        return view('docs.word-doc')->with([
            'info' => 'Office Word Document PHP Lib',
        ]);
    }

    function save (Request $request) 
    {
        return redirect()->route('docGet');
    }
}
