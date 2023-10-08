<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Models\Blog\BlogComment;
use App\Models\Blog\Tag;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    public function getBlogs()
    {
        $blogs = Blog::withCount('blog_comments')->latest()->paginate(4);
        $blogCategory = BlogCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.blog.blog', compact('blogs', 'blogCategory', 'tags'));
    }
    public function getBlogsByCategory($catId)
    {
        $blogsCat = BlogCategory::where('slug', $catId)->first();
        $blogs = Blog::where('blog_categories_id', $blogsCat->id)->latest()->paginate(4);
        $blogCategory = BlogCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.blog.blog-by-category', compact('blogs', 'blogCategory', 'tags'));
    }

    public function getBlogById($id)
    {
        $blogs = Blog::latest()->paginate(4);
        $blogCategory = BlogCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        $blogDetails = Blog::where('id', $id)->first();
        $commnets = BlogComment::where('blog_id', $id)->get();

        return view('frontend.pages.blog.blog_details', compact('blogDetails', 'blogCategory', 'tags', 'blogs', 'commnets'));
    }

    public function searchBlog(Request $request)
    {
        $query = $request->input('search');

        $blogs = Blog::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(4);
        $blogCategory = BlogCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.blog.blog', compact('blogs', 'blogCategory', 'tags'));
    }


    public function submitBlogCommnet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $query = new BlogComment();
        $query->blog_id = $request->id;
        $query->comment = $request->comment;
        if ($query->save()) {
            return redirect()->back()->with('message', 'Comment successfully create');
        }
    }
}
