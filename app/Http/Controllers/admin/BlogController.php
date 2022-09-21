<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Http\Services\BlogService;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $data = [];
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $this->data['blogs'] = $this->blogService->getAll();
        return view('admin.pages.blog.index', $this->data);
    }

    public function create()
    {
        return view('admin.pages.blog.create');
    }

    public function solveCreate(Request $request)
    {
//        dd($request->all());
        $blog = new Blog();
        if ($request->hasFile('url_image')) {
            $file = $request->url_image;
            $path = $file->store('images');
            $blog->url_image = $path;
            $file->move(public_path('images'), $path);
        } else {
            return "Vui long chon file";
        }
        $blog->account_id = auth()->user()->account_id;
        $blog->title = $request->title;
        $blog->content = $request->content_blog;
        $this->blogService->create($blog);

        return redirect(route('admin.blog.index'))->with('info', 'Thêm thành công');
    }

    public function delete($id = null)
    {
        if ($id != null) {
            $this->blogService->delete($id);
        }
    }

    public function detail($id = null)
    {
        if ($id != null) {
            $this->data['blog'] = $this->blogService->find($id);
            return view('admin.pages.blog.detail', $this->data);
        }
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
