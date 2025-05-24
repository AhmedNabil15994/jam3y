<?php

namespace App\Modules\Sliders\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->getMethod()) {
            // handle creates
            case 'post':
            case 'POST':

                return [
                    'type' => 'required|in:link,category,course',
                    'category_id' => 'required_if:type,category',
                    'course_id' => 'required_if:type,course',
                    'link' => 'required_if:type,link',
                ];

            //handle updates
            case 'put':
            case 'PUT':
                return [
                    'type' => 'required|in:link,category,course',
                    'category_id' => 'required_if:type,category',
                    'course_id' => 'required_if:type,course',
                    'link' => 'required_if:type,link',
                ];
        }
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {

        $v = [
            'type.required' => __('dashboard.sliders.validation.type.required'),
            'type.in' => __('dashboard.sliders.validation.type.in'),
            'category_id.required_if' => __('dashboard.sliders.validation.category.required'),
            'category_id.exists' => __('dashboard.sliders.validation.category.required'),
            'course_id.required_if' => __('dashboard.sliders.validation.course.required'),
            'course_id.exists' => __('dashboard.sliders.validation.course.required'),
            'link.required_if' => __('dashboard.sliders.validation.link.required'),
        ];

        return $v;

    }
}
