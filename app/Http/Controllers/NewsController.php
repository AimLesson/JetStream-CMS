<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function show($id)
    {
        // Find the news item by ID, ensuring it's published
        $news = News::where('is_published', true)->findOrFail($id);

        // Return the view for the single news item
        return view('news.show', compact('news'));
    }
}
