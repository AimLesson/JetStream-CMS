<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Profile;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first(); // Get the profile data
        $latestNews = News::where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get();
        $newsList = News::where('is_published', true)->orderBy('created_at', 'desc')->paginate(6);

        return view('home', compact('profile', 'latestNews', 'newsList'));
    }
}
