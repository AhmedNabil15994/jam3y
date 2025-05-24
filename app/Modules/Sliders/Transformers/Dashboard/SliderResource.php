<?php

namespace App\Modules\Sliders\Transformers\Dashboard;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Company\Transformers\Api\CompanyResource;

class SliderResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'id'            => $this->id,
           'image'         => asset($this->image),
           'status'         => $this->is_active,
           'type'         => $this->type,
           'link'         => $this->link,
           'category_id'         => $this->category_id,
           'course_id'         => $this->course_id,
           'start_date'         => $this->start_date,
           'end_date'         => $this->end_date,
           'deleted_at'    => $this->deleted_at,
           'created_at'    => date('d-m-Y' , strtotime($this->created_at)),
       ];
    }
}
