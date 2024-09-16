<?php

namespace App\Http\Controllers;

use App\Models\Photo;
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

    public function edit(Gallery $gallery)
    {

       return view('gallerys.editGallery',['gallery'=>$gallery]);
    }

    public function update(Request $request, Gallery $gallery){
        $formField = $request->validate([
            'name'=>'required',
            'gallery_description'=>'required',
            'gallery_comments'=>'required',
        ]);

        if($request->hasFile('thumbnail')){
            $formField['thumbnail']= $request->file('thumbnail')->store('thumbnail','public');
        }

        $gallery->update($formField);

        return redirect('/')->with('message','gellery updated successufully');
    }

    public function delete(Gallery $gallery){
        $gallery->delete();
        return redirect('/')->with('message','gellery deleted successufully');
    }
}
