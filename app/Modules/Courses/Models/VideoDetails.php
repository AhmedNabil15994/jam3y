<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;

class VideoDetails extends Model
{
			protected $fillable = [
				'name' , 'link' , 'duration', 'width' , 'height' , 'html' , 'leason_video_id'
			];

}
