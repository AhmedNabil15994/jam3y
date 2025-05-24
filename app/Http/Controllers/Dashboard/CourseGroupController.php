<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Courses\Requests\CourseRequest;
use Illuminate\Http\Request;
use DataTable;

class CourseGroupController extends DashboardController
{
    public function __construct(Course $course)
    {
        $this->course   = $course;
    }

    public function index()
    {
        return view('dashboard.course_groups.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->course->QueryTable2($request));
    }

    public function create()
    {
        $courses = $this->course->getAll();
        return view('dashboard.course_groups.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $create = $this->course->createAttachments($request);

        if ($create) {
            return Response()->json([true , __('dashboard.general.create_success_alert')]);
        }

        return Response()->json([false  , __('dashboard.general.ops_alert')]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $group  = $this->course->findGroupById($id);
        $courses = $this->course->getAll();

        if (!$group)
            return abort(404);

        return view('dashboard.course_groups.edit' , compact('group','courses'));
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){

            $update = $this->course->updateAttachments($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {

            $repose = $this->course->deleteGroup($id);

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

            $repose = $this->course->deleteAllGroup($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {

            return Response()->json([false, $e->errorInfo[2]]);

        }
    }
}
