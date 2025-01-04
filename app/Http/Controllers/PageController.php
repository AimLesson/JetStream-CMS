<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class PageController extends Controller
{
    public function about()
    {
        $profile = Profile::first(); // Get Yayasan profile data
        return view('about', compact('profile'));
    }
}
