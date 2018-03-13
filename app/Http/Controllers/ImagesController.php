<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class ImagesController extends Controller
{
    public function index (Request $request)
    {
        $img = $request->session()->get('img');

        return view('imageUpload')->with([
            'img' => $img,
        ]);
    }

    function save (Request $request) 
    {
        if ($request->hasFile('photo'))
        {
            $file = $request->file('photo');
        }
        else
        {
            dd('Ferro');
            return redirect()->route('image');
        }

        $nome = uniqid('img_');
        $destinationPathG = public_path('img/' . $nome . '.jpg');
        $destinationPath = public_path('img/thumbnails/' . $nome . '.jpg');
        $imgOri = Image::make($file);

        //$data = getimagesize($file);
        //$width = $data[0];
        //$height = $data[1];


        $width = $imgOri->width();
        $height = $imgOri->height();

        if($width != $height) 
        {
            $adjustSize = ($width > $height ? [0, $width - $height] : [$width - $height, 0]); 
            $img = Image::make($file)->resizeCanvas($adjustSize[0], $adjustSize[1], 'center', true, '#ffffff');
        }

        $img->fit(500);
        $img->save($destinationPathG, 100);
        $img->fit(200);
        $img->save($destinationPath, 100);

        $request->session()->flash('img', url('/img/' . $nome . '.jpg'));

        //return $img->response('jpg');
        return redirect()->route('image');
    }
}
