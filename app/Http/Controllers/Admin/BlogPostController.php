<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\Category;
use App\Models\Tag;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::latest()->paginate(10);
        return view('admin.blog_posts.index', compact('blogPosts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog_posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_tags' => 'nullable|max:255',
            'slug' => 'required|string|unique:blog_posts',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|array',
        ]);

        $blogPost = BlogPost::create($validatedData);
        $blogPost->tags()->sync($request->tags);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $blogPost->update(['featured_image' => $imagePath]);
        }

        return redirect()->route('admin.blog_posts.index')->with('success', 'Blog post created successfully!');
    }

    public function show(BlogPost $blogPost)
    {
        return view('admin.blog_posts.show', compact('blogPost'));
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.blog_posts.edit', compact('blogPost', 'categories', 'tags'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:255',
            'meta_tags' => 'nullable|max:255',
            'slug' => 'required|string|unique:blog_posts,slug,' . $blogPost->id,
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|array',
        ]);

        $blogPost->update($validatedData);
        $blogPost->tags()->sync($request->tags);

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('uploads', 'public');
            $blogPost->update(['featured_image' => $imagePath]);
        }

        return redirect()->route('admin.blog_posts.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect()->route('admin.blog_posts.index')->with('success', 'Blog post deleted successfully!');
    }
}
