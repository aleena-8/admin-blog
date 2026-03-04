<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('status', 'active')->get(); // Only active categories
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        // Generate slug if not provided
        $slug = $request->slug ?? \Str::slug($request->title);

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at ?? null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post added!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
          $categories = Category::where('status', 'active')->get();
        return view('posts.edit', compact('post', 'categories'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        $slug = $request->slug ?? \Str::slug($request->title);

        $post->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'published_at' => $request->published_at ?? null,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated!');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    
    }
}
