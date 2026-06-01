<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MetaTagController extends Controller
{
    public function index()
    {
        $metaTags = MetaTag::latest()->get();

        return view('meta.index', compact('metaTags'));
    }

    public function create()
    {
        return view('meta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required|max:255',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:500',
        ]);

        $keywordCount = str_word_count($request->meta_keywords);

        if ($keywordCount < 3) {
            return back()
                ->withInput()
                ->with('warning', 'Use at least 3 SEO keywords.');
        }

        MetaTag::create([
            'page_name' => $request->page_name,
            'slug' => Str::slug($request->page_name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status ?? 1
        ]);

        return redirect('/meta-tags')
            ->with('success', 'Meta Tag Created Successfully');
    }

    public function dashboard()
    {
        $totalPages = MetaTag::count();

        $missingTitle = MetaTag::whereNull('meta_title')
            ->orWhere('meta_title', '')
            ->count();

        $missingDescription = MetaTag::whereNull('meta_description')
            ->orWhere('meta_description', '')
            ->count();

        $completedPages = MetaTag::whereNotNull('meta_title')
            ->where('meta_title', '!=', '')
            ->whereNotNull('meta_description')
            ->where('meta_description', '!=', '')
            ->count();

        $seoScore = $totalPages > 0
            ? round(($completedPages / $totalPages) * 100)
            : 0;

        return view('dashboard', compact(
            'totalPages',
            'missingTitle',
            'missingDescription',
            'seoScore'
        ));
    }
}