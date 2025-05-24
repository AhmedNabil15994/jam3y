<?php

namespace App\Modules\Courses\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
        switch ($this->getMethod())
        {
            // handle creates
            case 'post':
            case 'POST':

                return [
                  // 'title.*'      => 'required|unique:page_translations,title',
                  'title.*'         => 'required',
                  'description.*'   => 'required',
                  'top_description.*'=> 'required',
                  'category_id'     => 'required',
                  'user_id'         => 'required',
                  'demo_video'      => 'required',
                  'image'           => 'required|array|min:1|max:1',
                ];

            //handle updates
            case 'put':
            case 'PUT':
                return [
                    'title.*'          => 'required',
                    'description.*'    => 'required',
                    'top_description.*'=> 'required',
                    'user_id'          => 'required',
                    'demo_video'       => 'required',
                    'image'            => 'array|min:1|max:1',
                ];
        }
    }

    public function messages()
    {

        $v = [
            "user_id.required"      => __('dashboard.courses.validation.user_id.required'),
            "demo_video.required"   => __('dashboard.courses.validation.demo_video.required'),
            "category_id.required"  => __('dashboard.courses.validation.category_id.required'),
            "image.required"        => __('dashboard.courses.validation.image.required'),
            "image.max"             => __('dashboard.courses.validation.image.max'),
        ];

        foreach ($this->get('title') as $key => $value){
          $v["title.".$key.".required"] = __('dashboard.courses.validation.title.required').' - '.$key.'';
        }

        foreach ($this->get('description') as $key => $value){
          $v["description.".$key.".required"] = __('dashboard.courses.validation.description.required').' - '.$key.'';
        }

        foreach ($this->get('top_description') as $key => $value){
          $v["top_description.".$key.".required"] = __('dashboard.courses.validation.top_description.required').' - '.$key.'';
        }

        return $v;
    }
}
