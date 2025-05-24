<?php

namespace App\Http\Controllers\Front;

use App\Modules\Subscription\Repository\SubscriptionRepository as Subscription;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Courses\Repository\VideoRepository as Video;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends HomeController
{
    private $course;
    private $subscription;
    private $video;

    /**
     * CourseController constructor.
     * @param Course $course
     * @param Subscription $subscription
     * @param Video $video
     */
    public function __construct(Course $course , Subscription $subscription, Video $video)
    {
        $this->course         = $course;
        $this->subscription   = $subscription;
        $this->video   = $video;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getVideoModal($id)
    {
        $video = $this->video->findById($id , true);
        if(!$video)
          abort(404);

        $video_script = $this->video->buildVideo($video->video_id);

        return response()->json(['status' => 1 , 'data' => [
            'title' => $video->title,
            'video_player' => $video_script,
        ]]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPaidVideoModal($id)
    {
        $video = $this->video->findById($id);

        if(!$video || !$this->video->checkPaidByVideo($video))
          abort(404);

        $video_script = $this->video->buildVideo($video->video_id);

        return response()->json(['status' => 1 , 'data' => [
            'title' => $video->title,
            'video_player' => $video_script,
        ]]);
    }

    /**
     * Show the application dashboard.
     */
    public function show($slug)
    {
        $course = $this->course->findBySlug($slug);

        if(!$course)
          abort(404);

        return $this->viewCoursePage($course);
    }

    public function viewCoursePage($course)
    {
        $subscription = $this->subscription->checkSubscribedCourse($course);
        $demo_video = $this->course->buildVideo($course->demo_video);

        if (!$subscription)
            return view('front.courses.show',compact('course','demo_video'));
        return view('front.courses.subscribed_course',compact('course','subscription','demo_video'));
    }
}
