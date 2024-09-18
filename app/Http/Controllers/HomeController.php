<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch galleries or set to an empty collection if none exist
        $galleries = Gallery::latest()->get();

        return view('home.index', compact('galleries'));
    }
}
