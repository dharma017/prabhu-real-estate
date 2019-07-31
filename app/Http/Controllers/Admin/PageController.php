<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Toastr;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::latest()->get();

        return view('admin.pages.index', compact('pages'));
    }


    public function create()
    {
        return view('admin.pages.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:pages|max:255',
            'excerpt' => 'max:200',
            'description' => 'required'
        ]);

        $slug = str_slug($request->title);

        $page = new Page();
        $page->title = $request->title;
        $page->slug = $slug;
        $page->excerpt = $request->excerpt;
        $page->description = $request->description;
        $page->save();

        Toastr::success('message', 'Page created successfully.');

        return redirect()->route('admin.pages.index');
    }


    public function edit(Page $page)
    {
        $page = Page::findOrFail($page->id);

        return view('admin.pages.edit', compact('page'));
    }


    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required',
            'excerpt' => 'max:200',
            'description' => 'required'
        ]);

        $slug = str_slug($request->title);

        $page = Page::findOrFail($page->id);
        $page->title = $request->title;
        $page->slug = $slug;
        $page->excerpt = $request->excerpt;
        $page->description = $request->description;
        $page->save();

        Toastr::success('message', 'Page updated successfully.');

        return redirect()->route('admin.pages.index');
    }


    public function destroy(Page $page)
    {
        $page = Page::findOrFail($page->id);
        $page->delete();

        Toastr::success('message', 'Page deleted successfully.');

        return back();
    }
}
