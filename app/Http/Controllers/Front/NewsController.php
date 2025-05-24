<?php

namespace App\Http\Controllers\Front;

use App\Modules\News\Repository\NewsRepository as News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends HomeController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $news = $this->news->getAllActive();
        return view('front.news.index' , compact('news'));
    }

    /**
     * Show the application dashboard.
     */
    public function show($slug)
    {
        $news = $this->news->findBySlug($slug);

        if(!$news)
          abort(404);

        return view('front.news.show',compact('news'));
    }
}
