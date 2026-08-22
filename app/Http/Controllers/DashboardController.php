<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $productCount = Product::count();
        $galleryCount = Gallery::count();

        return view('dashboard', compact(
            'articleCount',
            'productCount',
            'galleryCount'
        ));
    }
}