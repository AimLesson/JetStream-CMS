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

        return view('branches.show', compact('branch', 'newsList'));
    }

    public function about($id)
    {
        $branch = Branch::findOrFail($id); // Fetch branch details
        return view('branches.about', compact('branch'));
    }

}
