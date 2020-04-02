<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use DB;
use App\Tag;

class FrontendController extends Controller
{
    public function index()
    {
        $settings = Setting::first(); // for website address
        $category = Category::take(3)->get(); // for navigation bar

        $post = Post::orderBy('created_at', 'desc')->first();
        $secondpost = Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $thirdpost = Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();

        $cat_bootstrap = Category::find(3);
        $bootstrap = DB::table('categories')
            ->join('posts', 'categories.id', 'posts.category_id')
            ->select('categories.name', 'posts.*')
            ->where('categories.id', 3)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        // return response()->json($bootstrap);

        $cat_laravel = Category::find(4);
        $laravel = DB::table('categories')
            ->join('posts', 'categories.id', 'posts.category_id')
            ->select('categories.name', 'posts.*')
            ->where('categories.id', 4)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        // return response()->json($laravel);

        $cat_wordpress = Category::find(5);
        $wordpress = DB::table('categories')
            ->join('posts', 'categories.id', 'posts.category_id')
            ->select('categories.name', 'posts.*')
            ->where('categories.id', 5)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();
        // return response()->json($wordpress);

        $tailwind = Category::find(6);
        $python = Category::find(7);

        return view('index', 
            compact(
                'settings', 
                'category', 
                'post', 
                'secondpost', 
                'thirdpost', 
                'cat_bootstrap',
                'bootstrap', 
                'cat_laravel',
                'laravel', 
                'cat_wordpress', 
                'wordpress',
                'tailwind', 
                'python',
            )
        );
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $settings = Setting::first(); // for website address
        $category = Category::take(3)->get(); // for navigation bar
        $tags = Tag::all();
        // return response()->json($post);

        $next_post = Post::where('id', '>', $post->id)->min('id');
        $previous_post = Post::where('id', '<', $post->id)->max('id');

        return view('single', compact('post', 'settings', 'category', 'tags'))
        ->with('next', Post::find($next_post))
        ->with('prev', Post::find($previous_post));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
