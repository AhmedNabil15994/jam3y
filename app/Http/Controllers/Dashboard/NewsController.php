<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\News\Repository\NewsRepository as News;
use App\Modules\News\Requests\NewsRequest;
use Illuminate\Http\Request;
use DataTable;

class NewsController extends DashboardController
{
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index()
    {
        return view('dashboard.news.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->news->QueryTable($request));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(NewsRequest $request)
    {
        $create = $this->news->create($request);

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
        $news  = $this->news->findById($id);

        if (!$news)
            return abort(404);

        return view('dashboard.news.edit' , compact('news'));
    }

    public function update(NewsRequest $request, $id)
    {
        if ($request->ajax()){

            $update = $this->news->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {
            $repose = $this->news->delete($id);

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
            $repose = $this->news->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
