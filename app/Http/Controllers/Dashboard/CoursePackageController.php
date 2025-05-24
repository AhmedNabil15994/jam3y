<?php

namespace App\Http\Controllers\Dashboard;

use DataTable;
use Illuminate\Http\Request;
use App\Modules\Courses\Requests\CourseRequest;
use App\Modules\Courses\Requests\CoursePackageRequest;
use App\Modules\Courses\Repository\{ CoursePackageRepository as Package , CourseRepository  as Course };

class CoursePackageController extends DashboardController
{
    public $package;
    public function __construct(Course $course ,Package $package)
    {
        $this->package  = $package;
        $this->course   = $course;
    }

    public function index()
    {
        return view('dashboard.course_packages.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->package->QueryTable($request));
    }

    public function create()
    {
        $courses = $this->course->getAll();
        return view('dashboard.course_packages.create',compact('courses'));
    }

    public function store(CoursePackageRequest $request)
    {
        $create = $this->package->create($request);

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
        $package    = $this->package->findById($id);
        $courses    = $this->course->getAll();

        if (!$package)
            return abort(404);

        return view('dashboard.course_packages.edit' , compact('package','courses'));
    }

    public function update(CoursePackageRequest $request, $id)
    {
        if ($request->ajax()){

            $update = $this->package->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {

            $repose = $this->package->delete($id);

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

            $repose = $this->package->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {

            return Response()->json([false, $e->errorInfo[2]]);

        }
    }
}
