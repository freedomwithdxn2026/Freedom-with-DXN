<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Blog;

class SitemapController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $blogs = Blog::where('status', 'published')->get();

        $content = view('sitemap', compact('products', 'blogs'));

        return response($content, 200)
            ->header('Content-Type', 'application/xml');
    }
}
