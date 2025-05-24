<?php

namespace App\Http\Controllers\Front;

use App\Modules\Categories\Repository\CategoryRepository as Category;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends HomeController
{
    /**
     * Create a new controller instance.
     */
    public function __construct(Category $category , Course $course)
    {
        $this->course   = $course;
        $this->category = $category;
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        return view('front.home');
    }

    /**
     * Show the application dashboard.
     */
    public function show($slug)
    {
        $category = $this->category->findBySlug($slug);

        if(!$category)
          abort(404);

        $courses  = $this->course->getAllByCategory($category);

        return view('front.categories.show',compact('category','courses'));
    }
}
