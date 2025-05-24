<?php

namespace App\Http\Controllers\Front;

use App\Modules\Pages\Repository\PageRepository as Page;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends HomeController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    /**
     * Show the application dashboard.
     */
    public function page($slug)
    {
        $page = $this->page->findBySlug($slug);

        if(!$page)
          abort(404);

        return view('front.pages.page',compact('page'));
    }

    public function contactUs()
    {
        return view('front.pages.contact-us');
    }
}
