<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Repository\CategoryRepository;
use App\Modules\Sliders\Repository\SliderRepository as Slider;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;

class HomeController extends Controller
{
    private $slider;
    private $categoryRepository;

    /**
     * HomeController constructor.
     * @param Slider $slider
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(Slider $slider, CategoryRepository $categoryRepository)
    {
        $this->slider = $slider;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $sliders = $this->slider->getForHome();
        return view('front.home' , compact('sliders'));
    }
}
