<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $recentDocuments = Document::viewableBy($user)->active()
            ->latest()
            ->limit(5)
            ->get();

        $categories = Category::withCount('documents')->get();

        return view('dashboard.index', [
            'recentDocuments' => $recentDocuments,
            'categories' => $categories,
        ]);
    }
}
