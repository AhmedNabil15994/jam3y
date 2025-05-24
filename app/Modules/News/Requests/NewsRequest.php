<?php

namespace App\Modules\News\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                  'image'           => 'required|array|min:1|max:1',
                ];

            //handle updates
            case 'put':
            case 'PUT':
                return [
                    'title.*'          => 'required',
                    'description.*'    => 'required',
                    'image'            => 'array|min:1|max:1',
                ];
        }
    }

    public function messages()
    {

        $v = [
            "image.required"  => __('dashboard.news.validation.image.required'),
            "image.max"       => __('dashboard.news.validation.image.max'),
        ];

        foreach ($this->get('title') as $key => $value){
          $v["title.".$key.".required"] = __('dashboard.news.validation.title.required').' - '.$key.'';
        }

        foreach ($this->get('description') as $key => $value){
          $v["description.".$key.".required"] = __('dashboard.news.validation.description.required').' - '.$key.'';
        }

        return $v;
    }
}
