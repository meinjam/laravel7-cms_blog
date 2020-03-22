<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        if (count($categories) == 0) {
            return redirect()->route('category.index')->with('error','At Least one category need for creating your first post.');
        }
        return view('admin.posts.create')->with('category', Category::all());
    }

    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|min:8|max:255',
            'image' => 'required|image|max:2000',
            'content' => 'required|min:20|max:5000',
            'category_id' => 'required',
        ];

        $this->validate($request, $rules);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        
        $image = $request->file('image');
        // $imageName = hexdec(uniqid());
        $imageName = 'mi-' . time() . Str::random(40);
        $extension = strtolower($image->getClientOriginalExtension());
        $imageFullName = $imageName. '.' .$extension;
        $uploadPath = 'img/postsimg/';
        $imageURL = $uploadPath . $imageFullName;
        $success = $image->move($uploadPath, $imageFullName);
        $post['image'] = $imageURL;

        $post->slug = Str::slug($request->title);

        $post->save();
        return redirect()->route('all.posts')->with('success','Post added successfully.');
        return redirect()->back();
    }

    public function show($post)
    {
        //
    }

    public function edit($post)
    {
        $post = Post::findOrFail($post);
        return view('admin.posts.edit', compact('post'))->with('category', Category::all());
    }

    public function update(Request $request, $post)
    {
        $takePost = Post::find($post);
        $previousImage = $takePost->image;

        $rules = [
            'title' => 'required|min:8|max:255',
            'image' => 'image|max:2000',
            'content' => 'required|min:20|max:5000',
            'category_id' => 'required',
        ];

        $this->validate($request, $rules);

        $posts = Post::findOrFail($post);
        $posts->title = $request->title;
        $posts->content = $request->content;
        $posts->category_id = $request->category_id;
        $image = $request->file('image');
        if ($image) {

            $imageName = 'ui-' . time() . Str::random(40);
            $extension = strtolower($image->getClientOriginalExtension());
            $imageFullName = $imageName. '.' .$extension;
            $uploadPath = 'img/postsimg/';
            $imageURL = $uploadPath . $imageFullName;
            $success = $image->move($uploadPath, $imageFullName);
            $posts['image'] = $imageURL;
            $posts->save();
            unlink($previousImage);
            return redirect()->route('all.posts')->with('success','Post updated successfully.');
        } else {
            $posts->save();
            return redirect()->route('all.posts')->with('success','Post updated successfully.');
        }
        
    }

    public function destroy($post)
    {
        $post = Post::findOrFail($post);
        $post->delete();
        return redirect()->route('all.posts')->with('success','Post was just trashed.');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed', compact('posts'));
        // return response()->json($posts);
    }

    public function kill($post)
    {
        $post = Post::where('id', $post);
        $post->forceDelete();
        // $image = $post->image;
        // unlink($image);
        return redirect()->route('all.posts')->with('success','Post permanently deleted.');
    }

    public function restore($post)
    {
        $posts = Post::withTrashed()->where('id', $post);
        $posts->restore();
        return redirect()->route('all.posts')->with('success','Post restored successfully.');
    }
}
