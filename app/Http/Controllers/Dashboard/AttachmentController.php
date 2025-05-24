<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Courses\Repository\AttachmentRepository as Attachment;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Courses\Requests\CourseRequest;
use Illuminate\Http\Request;
use DataTable;

class AttachmentController extends DashboardController
{
    public function __construct(Course $course , Attachment $attachment)
    {
        $this->attachment   = $attachment;
        $this->course       = $course;
    }

    public function index()
    {
        return view('dashboard.attachments.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->attachment->QueryTable($request));
    }

    public function create()
    {
        $courses = $this->course->getAll();
        return view('dashboard.attachments.create',compact('courses'));
    }

    public function store(Request $request)
    {
        $create = $this->attachment->create($request);

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
        $attachment  = $this->attachment->findById($id);
        $courses = $this->course->getAll();

        if (!$attachment)
            return abort(404);

        return view('dashboard.attachments.edit' , compact('attachment','courses'));
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){

            $update = $this->attachment->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {

            $repose = $this->attachment->delete($id);

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

            $repose = $this->attachment->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {

            return Response()->json([false, $e->errorInfo[2]]);

        }
    }
}
