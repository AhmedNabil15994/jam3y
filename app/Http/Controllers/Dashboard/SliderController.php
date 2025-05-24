<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Modules\Sliders\Requests\SliderRequest;
use App\Modules\Sliders\Transformers\Dashboard\SliderResource;
use App\Modules\Sliders\Repository\SliderRepository as Slider;
use App\Modules\Sliders\Traits\DataTable;

class SliderController extends Controller
{
    private $slider;
    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('dashboard.sliders.index');
    }

    public function datatable(Request $request)
    {
        $datatable = DataTable::drawTable($request, $this->slider->QueryTable($request));
        $datatable['data'] = SliderResource::collection($datatable['data']);
        return Response()->json($datatable);
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(SliderRequest $request)
    {
        try {

            $create = $this->slider->create($request);

            if ($create) {
                return Response()->json([true , __('apps::dashboard.messages.created')]);
            }

            return Response()->json([false  , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function show($id)
    {
        return view('slider::dashboard.sliders.show');
    }

    public function edit($id)
    {
        $slider = $this->slider->findById($id);

        return view('dashboard.sliders.edit',compact('slider'));
    }

    public function update(SliderRequest $request, $id)
    {
        try {
            $update = $this->slider->update($request,$id);

            if ($update) {
                return Response()->json([true , __('apps::dashboard.messages.updated')]);
            }

            return Response()->json([false  , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function destroy($id)
    {
        try {
            $delete = $this->slider->delete($id);

            if ($delete) {
                return Response()->json([true , __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([false  , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function deletes(Request $request)
    {
        try {
            $deleteSelected = $this->slider->deleteSelected($request);

            if ($deleteSelected) {
                return Response()->json([true , __('apps::dashboard.messages.deleted')]);
            }

            return Response()->json([false  , __('apps::dashboard.messages.failed')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
