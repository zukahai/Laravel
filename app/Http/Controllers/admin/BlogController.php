<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.pages.blog.create');
    }

    public function solveCreate(Request $request)
    {
        dd($request->all());
//        if ($request->hasFile('url_image')) {
//            $file = $request->url_image;
//            $path = $file->store('images');
//            $file->move(public_path('images'), $path);
//        } else {
//            return "Vui long chon file";
//        }
    }

    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        //
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        //
    }

    public function destroy(Blog $blog)
    {
        //
    }
}
