<?php

namespace App\Modules\Courses\Services;

class CourseHandelService
{
    public function handle($course,$package,$request)
    {
        $data = array_merge($request,[
					'id' 						=> $course['id'],
					'name' 					=> $course['title'],
					'price' 				=> $package['price'],
					'package_id' 		=> $package['id'],
					'slug'        	=> $course->slug,
					'image'       	=> $course->image,
					'translations' 	=> $course->translations,
        ]);

        return $data;
    }
}
