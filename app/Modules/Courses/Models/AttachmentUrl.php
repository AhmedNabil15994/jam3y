<?php

namespace App\Modules\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class AttachmentUrl extends Model
{
		use Translatable;

		protected $fillable 					= [ 'link' , 'attachment_id' , 'is_free'];
		public $translationModel 			= 'App\Modules\Courses\Models\AttachmentUrlTranslation';
		public $translatedAttributes 	= [ 'title' ];

		public function attachment()
    {
        return $this->belongsTo(Attachment::class, 'attachment_id');
    }

}
