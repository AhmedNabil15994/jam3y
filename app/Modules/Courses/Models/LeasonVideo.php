<?php

namespace App\Modules\Courses\Models;

use App\Modules\Courses\Traits\VdocipherIntegration;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class LeasonVideo extends Model
{
    use Translatable,VdocipherIntegration;

    protected $fillable = ['link', 'leason_id', 'is_free', 'sorting', 'video_id'];
    public $translationModel = 'App\Modules\Courses\Models\LeasonVideoTranslation';
    public $translatedAttributes = ['title'];

    public function leason()
    {
        return $this->belongsTo(Leason::class, 'leason_id');
    }

    public function details()
    {
        return $this->hasOne(VideoDetails::class, 'leason_video_id');
    }

    public function getVideoDataAttribute()
    {
        $data = $this->getVideos($this->demo_video)->getData()->data;
        return count($data) ? $this->getVideos($this->demo_video)->getData()->data[0] : (object)[
            'poster' => null,
            'id' => null,
            'title' => null,
            'upload_time' => null,
        ];
    }
}
