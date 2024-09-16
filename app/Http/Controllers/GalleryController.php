<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryController extends Controller
{
    public function index(){
        return view('gallerys.index',[
            'galleries'=>Gallery::latest()->get()
        ]);
    }

    public function create(){
        return view('gallerys.GalleryForm');
    }
    public function store(Request $request){
        $formField = $request->validate([
            'name'=>['required',Rule::unique('galleries','name')],
            'gallery_description'=>'required',
            'gallery_comment'=>'required',
        ]);

        if($request->hasFile('thumbnail')){
            $formField['thumbnail']= $request->file('thumbnail')->store('thumbnail','public');
        }

        Gallery::create($formField);

        return redirect('/')->with('message','gallery created successufully');
    }
}
