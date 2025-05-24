<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Courses\Repository\LeasonRepository as Leason;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Courses\Requests\CourseRequest;
use Illuminate\Http\Request;
use DataTable;

class LeasonController extends DashboardController
{
    public function __construct(Course $course , Leason $leason)
    {
        $this->leason   = $leason;
        $this->course       = $course;
    }

    public function index()
    {
        return view('dashboard.leasons.home');
    }

    public function saveSorting(Request $request)
    {
        $create = $this->leason->sorting($request);

        if ($create) {
            return Response()->json([true , __('dashboard.general.msg_create_success')]);
        }

        return Response()->json([false  , __('dashboard.general.msg_error')]);
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->leason->QueryTable($request));
    }

    public function create()
    {
        $courses = $this->course->getAll();
        $videos = $this->leason->getVideos()->getData()->data;
        return view('dashboard.leasons.create',compact('courses','videos'));
    }

    public function showVideo($id)
    {
        $response = $this->leason->getOtp($id)->getData()->data;
        if(!empty($response->otp)) {
            $otp = $response->otp;
            $playbackInfo = $response->playbackInfo;
        }else {

            abort(404);
        }
        return view('dashboard.leasons.show-video' , compact('otp','playbackInfo'));
    }

    public function store(Request $request)
    {
        $create = $this->leason->create($request);

        if ($create) {
            return Response()->json([true , __('dashboard.general.create_success_alert')]);
        }

        return Response()->json([false  , __('dashboard.general.ops_alert')]);
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $leason  = $this->leason->findById($id);
        $courses = $this->course->getAll();
        $videos = $this->leason->getVideos()->getData()->data;

        if (!$leason)
            return abort(404);

        return view('dashboard.leasons.edit' , compact('leason','courses','videos'));
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){

            $update = $this->leason->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {

            $repose = $this->leason->delete($id);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }

    public function deletes(Request $request)
    {
        try {

            $repose = $this->leason->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {

            return Response()->json([false, $e->errorInfo[2]]);

        }
    }
}
