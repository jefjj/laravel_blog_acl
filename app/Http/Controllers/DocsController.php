<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style\Font;
use PhpOffice\PhpWord\IOFactory;

class DocsController extends Controller
{
    public function index (Request $request)
    {
        $doc = $request->session()->get('doc');

        return view('docs.word-doc')->with([
            'info' => 'Preencha os campos para gerar um documento',
            'doc' => $doc,
        ]);
    }

    function save (Request $request) 
    {
        // Creating the new document...
        $phpWord = new PhpWord();
        
        // Creating a title style
        $titleStyle = new Font();
        $titleStyle->setBold(true);
        $titleStyle->setName('Tahoma');
        $titleStyle->setSize(18);
        $titleStyle->setColor('#999999');

        // Adding an empty Section to the document...
        $section = $phpWord->addSection();
        
        // Adding Text element to the Section having font styled by default...
        $section->addText($request->input('titulo'), $titleStyle);
        $section->addText($request->input('texto'));
        $section->getStyle()->setColsNum($request->input('cols'));

        // Saving the document as OOXML file...
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('docs\documento-word.docx');

        $request->session()->flash('doc', url('/docs/documento-word.docx'));      

        return redirect()->back();
    }
}
