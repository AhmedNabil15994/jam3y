<?php

namespace App\Modules\Courses\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules= [
                    'title.*'	         => 'required',
                    'course_id'	         => 'required|exists:courses,id',
                    'price'	             => 'required',
                    'course_end_at'	     => 'required_with:fixed_date',
                    'days'	             => 'required_without:fixed_date',
                ];


        return $rules;
    }
}
