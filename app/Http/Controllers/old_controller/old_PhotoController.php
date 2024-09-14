<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Gallery $gallery)
    {
        $this->authorize('view', $gallery);
        $photos = $gallery->photos()->paginate(20);
        return view('photos.index', compact('gallery', 'photos'));
    }

    public function create(Gallery $gallery)
    {
        $this->authorize('update', $gallery);
        return view('photos.create', compact('gallery'));
    }

    public function store(Request $request, Gallery $gallery)
    {
        $this->authorize('update', $gallery);

        $request->validate([
            'photo_description' => 'nullable|string',
            'photo_path' => 'required|image|max:5120',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        $photoPath = $request->file('photo_path')->store('photos', 'public');
        $thumbPath = $request->hasFile('thumbnail') 
            ? $request->file('thumbnail')->store('thumbnails', 'public') 
            : $photoPath;

        Photo::create([
            'photo_description' => $request->photo_description,
            'gallery_id' => $gallery->id,
            'thumbnail' => $thumbPath,
            'path' => $photoPath,
            'upload_date' => now(),
        ]);

        return redirect()->route('galleries.show', $gallery)->with('success', 'Photo uploaded successfully.');
    }

    public function show(Gallery $gallery, Photo $photo)
    {
        if ($photo->gallery_id !== $gallery->id) {
            abort(404);
        }
        return view('photos.show', compact('gallery', 'photo'));
    }

    public function edit(Gallery $gallery, Photo $photo)
    {
        $this->authorize('update', $gallery);
        if ($photo->gallery_id !== $gallery->id) {
            abort(404);
        }
        return view('photos.edit', compact('gallery', 'photo'));
    }

    public function update(Request $request, Gallery $gallery, Photo $photo)
    {
        $this->authorize('update', $gallery);
        if ($photo->gallery_id !== $gallery->id) {
            abort(404);
        }

        $request->validate([
            'photo_description' => 'nullable|string',
            'photo_path' => 'nullable|image|max:5120',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo_path')) {
            if ($photo->path) {
                Storage::disk('public')->delete($photo->path);
            }
            $photo->path = $request->file('photo_path')->store('photos', 'public');
        }

        if ($request->hasFile('thumbnail')) {
            if ($photo->thumbnail) {
                Storage::disk('public')->delete($photo->thumbnail);
            }
            $photo->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $photo->photo_description = $request->photo_description;
        $photo->save();

        return redirect()->route('galleries.photos.show', [$gallery, $photo])->with('success', 'Photo updated successfully.');
    }

    public function destroy(Gallery $gallery, Photo $photo)
    {
        $this->authorize('update', $gallery);
        if ($photo->gallery_id !== $gallery->id) {
            abort(404);
        }

        if ($photo->path) {
            Storage::disk('public')->delete($photo->path);
        }
        if ($photo->thumbnail) {
            Storage::disk('public')->delete($photo->thumbnail);
        }

        $photo->delete();

        return redirect()->route('galleries.show', $gallery)->with('success', 'Photo deleted successfully.');
    }
}
