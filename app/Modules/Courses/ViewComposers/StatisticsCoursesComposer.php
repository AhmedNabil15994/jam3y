<?php

namespace App\Modules\Courses\ViewComposers;

use App\Modules\Courses\Repository\CourseRepository;
use Illuminate\View\View;

class StatisticsCoursesComposer
{
    public function __construct(CourseRepository $courses)
    {
        $this->countCourses         =  $courses->countCourses();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countCourses'    , $this->countCourses);
    }
}
