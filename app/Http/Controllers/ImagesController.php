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
            //dd('Ferro');
            return redirect()->route('image');
        }

        $nome = uniqid('img_');
        $destinationPathG = public_path('img/' . $nome . '.jpg');
        $destinationPath = public_path('img/thumbnails/' . $nome . '.jpg');

        $img = Image::make($file);
        $img->crop(floor($request->input('photo-width')), floor($request->input('photo-height')), floor($request->input('photo-x')), floor($request->input('photo-y')));
        
        $width = $img->width();
        $height = $img->height();

        if($width == $height) // square images
        {
            if($width < 500 && $height < 500 && !$request->input('permitirEsticar'))
            {
                $adjustSize = [
                    (500 - $width),
                    (500 - $height),
                ];
            }
            else{
                $adjustSize = [0, 0];
            }

           // $img->resizeCanvas($adjustSize[0], $adjustSize[1], 'center', true, '#ffffff');
        }
        else // wide images
        {
            $adjustSize = ($width > $height ? [0, $width - $height] : [$width - $height, 0]);            
        }

        // less than 500px
        if($width < 500 && $height < 500 && !$request->input('permitirEsticar'))
        {
            $adjustSize = [
                (500 - $width),
                (500 - $height),
            ];

            $adjustSize[0] = $adjustSize[0] > 0 ? $adjustSize[0] : 0;
            $adjustSize[1] = $adjustSize[1] > 0 ? $adjustSize[1] : 0;
        }
        else{
        }
        
        // resize to square
        $img->resizeCanvas($adjustSize[0], $adjustSize[1], 'center', true, '#ffffff');

        $img->fit(500);
        $img->save($destinationPathG, 100);
        $img->fit(200);
        $img->save($destinationPath, 100);

        $request->session()->flash('img', url('/img/' . $nome . '.jpg'));

        return redirect()->route('image');
    }
}
