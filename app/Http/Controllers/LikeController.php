<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    // Ensure only authenticated users can like/unlike
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Like a photo
    public function store(Request $request, Photo $photo)
    {
        // Prevent users from liking their own photos (optional)
        if ($photo->gallery->user_id === Auth::id()) {
            return redirect()->back()->with('error', 'You cannot like your own photo.');
        }

        // Check if already liked
        $existingLike = Like::where('user_id', Auth::id())
                            ->where('photo_id', $photo->id)
                            ->first();

        if (!$existingLike) {
            Like::create([
                'user_id' => Auth::id(),
                'photo_id' => $photo->id,
                'liked_at' => now(),
            ]);
            return redirect()->back()->with('success', 'Photo liked.');
        }

        return redirect()->back()->with('info', 'You have already liked this photo.');
    }

    // Unlike a photo
    public function destroy(Request $request, Photo $photo)
    {
        $like = Like::where('user_id', Auth::id())
                    ->where('photo_id', $photo->id)
                    ->first();

        if ($like) {
            $like->delete();
            return redirect()->back()->with('success', 'Like removed.');
        }

        return redirect()->back()->with('info', 'You have not liked this photo.');
    }
}
