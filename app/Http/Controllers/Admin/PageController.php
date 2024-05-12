<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published,archived',
            'meta_keywords' => 'nullable|string',
        ]);

        $page = new Page($request->only('title', 'content', 'meta_title', 'meta_description', 'status'));
        $page->meta_keywords = explode(',', $request->meta_keywords); // Convert comma-separated string to array

        if ($request->hasFile('featured_image')) {
            $imagePath = $request->file('featured_image')->store('public/pages');
            $page->featured_image = $imagePath;
        }

        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Page created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\View\View
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable',
            'featured_image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published,archived',
            'meta_keywords' => 'nullable|string',
        ]);

        $page->update($request->only('title', 'content', 'meta_title', 'meta_description', 'status'));
        $page->meta_keywords = explode(',', $request->meta_keywords); // Convert comma-separated string to array

        if ($request->hasFile('featured_image')) {
            if ($page->featured_image) {
                Storage::delete($page->featured_image);
            }
            $imagePath = $request->file('featured_image')->store('public/pages');
            $page->featured_image = $imagePath;
        }

        $page->save();

        return redirect()->route('admin.pages.index')->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Page $page)
    {
        if ($page->featured_image) {
            Storage::delete($page->featured_image);
        }
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Page deleted successfully.');
    }
}
