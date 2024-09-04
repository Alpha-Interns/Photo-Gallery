<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ShareController extends Controller
{
    // Ensure only authenticated users can share
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Show form to share a gallery or photo
    public function create()
    {
        return view('shares.create');
    }

    // Share a gallery or photo
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'share_type' => 'required|in:gallery,photo',
            'share_id' => 'required|integer',
            'shared_to' => 'required|email', // Assuming sharing via email
        ]);

        $user = Auth::user();
        $shareType = $request->share_type;
        $shareId = $request->share_id;
        $sharedTo = $request->shared_to;

        if ($shareType === 'gallery') {
            $gallery = Gallery::findOrFail($shareId);
            $this->authorize('view', $gallery);
            // Implement sharing logic, e.g., send an email with gallery link
            Mail::to($sharedTo)->send(new \App\Mail\GalleryShared($user, $gallery));
        } elseif ($shareType === 'photo') {
            $photo = Photo::findOrFail($shareId);
            $this->authorize('view', $photo->gallery);
            // Implement sharing logic, e.g., send an email with photo link
            Mail::to($sharedTo)->send(new \App\Mail\PhotoShared($user, $photo));
        }

        // Log the share in the database
        \App\Models\Share::create([
            'user_id' => $user->id,
            'photo_id' => $shareType === 'photo' ? $shareId : null,
            'gallery_id' => $shareType === 'gallery' ? $shareId : null,
            'shared_at' => now(),
            'shared_to' => $sharedTo,
        ]);

        return redirect()->back()->with('success', ucfirst($shareType) . ' shared successfully.');
    }
}
