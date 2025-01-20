<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\News;

class BranchController extends Controller
{
    public function show($id)
    {
        $branch = Branch::findOrFail($id); // Fetch the branch by ID
        $newsList = News::where('branch_id', $id)
                        ->where('is_published', true)
                        ->orderBy('created_at', 'desc')
                        ->paginate(6); // Fetch branch-specific published news
        $latestNews = News::where('is_published', true)->orderBy('created_at', 'desc')->take(5)->get();
        $gallery = News::where('branch_id',$id)->where('is_published', true)->orderBy('created_at', 'desc')->paginate(10);


        return view('branches.show', compact('branch', 'newsList', 'latestNews','gallery'));
    }

    public function about($id)
    {
        $branch = Branch::findOrFail($id); // Fetch branch details
        return view('branches.about', compact('branch'));
    }

}
