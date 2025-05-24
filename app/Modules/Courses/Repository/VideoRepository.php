<?php

namespace App\Modules\Courses\Repository;

use App\Modules\Courses\Models\LeasonVideo;
use App\Modules\Courses\Traits\VdocipherIntegration;
use App\Modules\Subscription\Repository\SubscriptionRepository as Subscription;
use DB;

class VideoRepository
{
    use VdocipherIntegration;

    private $video;
    private $subscription;

    function __construct(LeasonVideo $video , Subscription $subscription)
    {
        $this->video = $video;
        $this->subscription = $subscription;
    }

    /**
     * @param $id
     * @param bool $free
     * @return mixed
     */
    public function findById($id, $free = false)
    {
        return $this->video->where(function ($q) use ($free) {
            if ($free)
                $q->where('is_free', 1);
        })->find($id);
    }

    /**
     * @param $video
     * @return mixed
     */
    public function checkPaidByVideo($video)
    {
        $course = $video->leason->course;
        $subscription = $this->subscription->checkSubscribedCourse($course);
        return $subscription;
    }
}
