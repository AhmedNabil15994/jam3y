<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Categories\Repository\CategoryRepository as Category;
use App\Modules\Courses\Repository\CoursePackageRepository;
use App\Modules\Courses\Repository\CourseRepository as Course;
use App\Modules\Users\Repository\UserRepository as User;
use App\Modules\Courses\Requests\CourseRequest;
use Illuminate\Http\Request;
use DataTable;

class CourseController extends DashboardController
{
    public function __construct(Course $course, Category $category, User $user, CoursePackageRepository $coursePackageRepository)
    {
        $this->user     = $user;
        $this->course   = $course;
        $this->category = $category;
        $this->coursePackageRepository  = $coursePackageRepository;
    }

    public function index()
    {
        return view('dashboard.courses.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->course->QueryTable($request));
    }

    public function create()
    {
        $teachers = $this->user->teachersOnly();
        $mainCats = $this->category->allMainCats();
        $videos = $this->course->getVideos()->getData()->data;
        $packages = $this->coursePackageRepository->getAll();

        return view('dashboard.courses.create', compact('mainCats', 'teachers', 'videos','packages'));
    }

    public function store(CourseRequest $request)
    {
        $create = $this->course->create($request);

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
        $teachers = $this->user->teachersOnly();
        $mainCats = $this->category->allMainCats();
        $course   = $this->course->findById($id);
        $videos = $this->course->getVideos()->getData()->data;

        if (!$course) {
            return abort(404);
        }

        return view('dashboard.courses.edit', compact('course', 'mainCats', 'teachers', 'videos'));
    }

    public function update(CourseRequest $request, $id)
    {
        if ($request->ajax()) {
            $update = $this->course->update($request, $id);

            if ($update) {
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {
            $repose = $this->course->delete($id);

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
            $repose = $this->course->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
