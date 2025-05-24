<?php
namespace App\Modules\Sliders\Models;

use App\Modules\Categories\Models\Category;
use App\Modules\Courses\Models\Course;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use SoftDeletes;

    protected $table = 'sliders';
    protected $dates = ['start_date', 'end_date'];
    protected $fillable = [
        'image',
        'type',
        'order',
        'start_date',
        'end_date',
        'link',
        'category_id',
        'course_id',
        'is_active',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTargetUrlAttribute()
    {
        switch ($this->type) {
            case 'link' :
                return $this->link;
                break;
            case 'category' :
                return url(route('front.categories.show',$this->category ? $this->category->slug : 'not-found'));
                break;
            case 'course' :
                return url(route('front.courses.show',$this->course ? $this->course->slug : 'not-found'));
                break;
            default:
                return url('/');
                break;
        }
    }

    public function scopeActive($query)
    {

        return $query->where('is_active', 1);
    }

    public function scopePublished($query)
    {

        return $query->where(function ($q) {
            $q->where(function ($q) {

                $q->whereDate('start_date', '<=', Carbon::now())
                    ->orWhereNull('start_date');
            })->where(function ($q) {

                $q->whereDate('end_date', '>=', Carbon::now())
                    ->orWhereNull('end_date');
            });
        });
    }
}
