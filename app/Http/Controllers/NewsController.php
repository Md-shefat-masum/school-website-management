<?php

namespace App\Http\Controllers;

use App\Models\Blog\Tag;
use App\Models\News\News;
use App\Models\News\NewsCategory;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function getNews()
    {
        $news = News::latest()->paginate(4);
        $newsCategory = NewsCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.news.news', compact('news', 'newsCategory', 'tags'));
    }
    public function getNewsById($id)
    {
        $news = News::latest()->paginate(4);
        $newsDetails = News::where('id', $id)->first();
        $newsCategory = NewsCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.news.news_details', compact('newsDetails', 'newsCategory', 'news', 'tags'));
    }

    public function getNewsByCategory($catId)
    {
        $newsCat = NewsCategory::where('slug', $catId)->first();
        $news = News::where('news_category_id', $newsCat->id)->latest()->paginate(4);
        $newsCategory = NewsCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.news.news-by-category', compact('news', 'newsCategory', 'tags'));
    }
    public function searchNews(Request $request)
    {
        $query = $request->input('search');

        $news = news::where('title', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(4);
        $newsCategory = newsCategory::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(6)->get();
        return view('frontend.pages.news.news', compact('news', 'newsCategory', 'tags'));
    }


    public function submitnewsCommnet(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $query = new NewsComment();
        $query->news_id = $request->id;
        $query->comment = $request->comment;
        if ($query->save()) {
            return redirect()->back()->with('message', 'Comment successfully create');
        }
    }
}
