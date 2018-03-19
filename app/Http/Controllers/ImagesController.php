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
            return redirect()->route('image');
        }

        $nome = uniqid('img_');
        $destinationPathG = public_path('img/' . $nome . '.jpg');
        $destinationPath = public_path('img/thumbnails/' . $nome . '.jpg');

        $img = Image::make($file);
        $img->crop(floor($request->input('photo-width')), floor($request->input('photo-height')), floor($request->input('photo-x')), floor($request->input('photo-y')));
        
        $width = $img->width();
        $height = $img->height();

        // less than 500px
        if($width < 500 && $height < 500 && !$request->input('permitirEsticar'))
        {
            $adjustSize = [
                (500 - $width),
                (500 - $height),
            ];
        }
        else if($width < 500 && $height < 500 && $request->input('permitirEsticar'))
        {
            $adjustSize = ($width >= $height ? [0, (500 - $width - $height)] : [(500 - $height - $width), 0]);
        }
        else{
            $adjustSize = ($width >= $height ? [0, $width - $height] : [$height - $width, 0]);
        }
        
        // resize to square if needed
        if($width != $height || ($width < 500 && $height < 500))
        {
            $img->resizeCanvas($adjustSize[0], $adjustSize[1], 'center', true, '#ffffff');
        }

        $img->fit(500);
        $img->save($destinationPathG, 100);
        $img->fit(200);
        $img->save($destinationPath, 100);

        $request->session()->flash('img', url('/img/' . $nome . '.jpg'));

        return redirect()->route('image');
    }
}
