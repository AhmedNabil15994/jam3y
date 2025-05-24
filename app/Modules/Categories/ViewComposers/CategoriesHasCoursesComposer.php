<?php

namespace App\Modules\Categories\ViewComposers;

use App\Modules\Categories\Repository\CategoryRepository;
use Illuminate\View\View;

class CategoriesHasCoursesComposer
{
    public $category;

    /**
     * CategoriesHasCoursesComposer constructor.
     * @param CategoryRepository $category
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $categoriesHasCourses = $this->category->categoriesHasCourses();
        $target_cat = null;
        $homeCategories = [];

        if (request('target_main_cat')) {
            session()->put('target_main_cat', request('target_main_cat'));
        }

        if (session('target_main_cat')) {
            $target_cat = $this->category->findBySlug(session('target_main_cat'));
            $homeCategories = $target_cat ? $target_cat->activeChildren : [];
        }

        $mainCategories = request()->route()->getName() == 'home' && !request('target_main_cat') ? $this->category->allActiveMainCats() : $homeCategories;

        $view->with(compact('categoriesHasCourses','homeCategories','target_cat','mainCategories'));
    }
}
