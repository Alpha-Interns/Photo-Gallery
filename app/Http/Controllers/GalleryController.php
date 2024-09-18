<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
Use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    // Apply auth middleware only for actions requiring login
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('galleries.index', [
            'galleries' => Gallery::latest()->get()
        ]);
    }

    public function create()
    {
        return view('galleries.GalleryForm');
    }

    public function store(Request $request)
    {
        $formField = $request->validate([
            'name' => ['required', Rule::unique('galleries', 'name')],
            'gallery_description' => 'required',
            'gallery_comments' => 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
        ]);

        if ($request->hasFile('thumbnail')) {
            $formField['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $formField['user_id'] = Auth::id();

        Gallery::create($formField);

        return redirect('/')->with('message', 'Gallery created successfully');
    }

    public function edit(Gallery $gallery)
    {
        // Ensure only the owner can edit
        if (Auth::id() !== $gallery->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('galleries.editGallery', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        // Ensure only the owner can update
        if (Auth::id() !== $gallery->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $formField = $request->validate([
            'name' => 'required',
            'gallery_description' => 'required',
            'gallery_comments' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $formField['thumbnail'] = $request->file('thumbnail')->store('thumbnail', 'public');
        }

        $gallery->update($formField);

        return redirect('/')->with('message', 'Gallery updated successfully');
    }

    public function delete(Gallery $gallery)
    {
        // Ensure only the owner can delete
        if (Auth::id() !== $gallery->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $gallery->delete();
        return redirect('/')->with('message', 'Gallery deleted successfully');
    }
}
