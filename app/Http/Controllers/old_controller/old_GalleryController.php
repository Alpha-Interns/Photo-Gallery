<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // Middleware to ensure the user is authenticated for all actions
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Display a list of galleries owned by the authenticated user
    public function index()
    {
        $galleries = Gallery::where('user_id', Auth::id())->paginate(10);
        return view('galleries.index', compact('galleries'));
    }

    // Show the form for creating a new gallery
    public function create()
    {
        return view('galleries.create');
    }

    // Store a newly created gallery in the database
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|max:100',
            'gallery_description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        // Handle file upload for thumbnail
        $path = $request->hasFile('thumbnail') ? $request->file('thumbnail')->store('thumbnails', 'public') : null;

        // Create a new gallery entry
        Gallery::create([
            'name' => $request->name,
            'gallery_description' => $request->gallery_description,
            'user_id' => Auth::id(),
            'thumbnail' => $path,
        ]);

        // Redirect to the gallery index page with a success message
        return redirect()->route('galleries.index')->with('success', 'Gallery created successfully.');
    }

    // Display the specified gallery and its photos
    public function show(Gallery $gallery)
    {
        $photos = $gallery->photos()->paginate(20);
        return view('galleries.show', compact('gallery', 'photos'));
    }

    // Update the specified gallery in the database
    public function update(Request $request, Gallery $gallery)
    {
        // Validate incoming request data
        $request->validate([
            'name' => 'required|max:100',
            'gallery_description' => 'nullable|string',
            'thumbnail' => 'nullable|image|max:2048',
        ]);

        // Handle file upload for thumbnail, if provided
        if ($request->hasFile('thumbnail')) {
            // Delete the old thumbnail if it exists
            if ($gallery->thumbnail) {
                Storage::disk('public')->delete($gallery->thumbnail);
            }
            // Store the new thumbnail
            $gallery->thumbnail = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        // Update the gallery details
        $gallery->update($request->only('name', 'gallery_description'));

        // Redirect to the gallery's show page with a success message
        return redirect()->route('galleries.show', $gallery)->with('success', 'Gallery updated successfully.');
    }

    // Delete the specified gallery from the database
    public function destroy(Gallery $gallery)
    {
        // Delete the gallery's thumbnail if it exists
        if ($gallery->thumbnail) {
            Storage::disk('public')->delete($gallery->thumbnail);
        }

        // Delete the gallery
        $gallery->delete();

        // Redirect to the gallery index page with a success message
        return redirect()->route('galleries.index')->with('success', 'Gallery deleted successfully.');
    }

    // Show the form for adding photos to a gallery
    public function addPhotos(Gallery $gallery)
    {
        return view('galleries.add-photos', compact('gallery'));
    }

    // Store a newly uploaded photo in the database
    public function storePhotos(Request $request, Gallery $gallery)
    {
        // Validate incoming request data
        $request->validate([
            'photo_description' => 'nullable|string',
            'photo_comment' => 'nullable|string',
            'photo_path' => 'required|image|max:2048',
        ]);

        // Handle file upload for the photo
        $photoPath = $request->file('photo_path')->store('photos', 'public');

        // Create a new photo entry
        Photo::create([
            'photo_description' => $request->input('photo_description', $gallery->name),
            'photo_comment' => $request->input('photo_comment', 'No comment'),
            'Upload_time' => now(),
            'gallery_id' => $gallery->id,
            'photo_path' => $photoPath,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Photo uploaded successfully!');
    }

    // Delete a specified photo from the gallery
    public function deletePhoto(Photo $photo)
    {
        // Delete the photo file from storage
        Storage::disk('public')->delete($photo->photo_path);
        // Delete the photo record from the database
        $photo->delete();

        // Redirect back with a success message
        return back()->with('success', 'Photo deleted successfully!');
    }
}
