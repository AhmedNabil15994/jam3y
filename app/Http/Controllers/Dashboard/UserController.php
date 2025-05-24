<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Roles\Repository\RoleRepository as Role;
use App\Modules\Users\Repository\UserRepository as User;
use App\Modules\Users\Requests\UserRequest;
use Illuminate\Http\Request;
use DataTable;

class UserController extends DashboardController
{
    public function __construct(User $user , Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        return view('dashboard.users.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->user->QueryTable($request));
    }

    public function create()
    {
        $roles = $this->role->getAll('id','asc');
        return view('dashboard.users.create',compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $create = $this->user->create($request);

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
        $roles = $this->role->getAll();

        $user  = $this->user->findById($id);

        if (!$user)
            return abort(404);

        return view('dashboard.users.edit' , compact('user','roles'));
    }

    public function update(UserRequest $request, $id)
    {
        if ($request->ajax()){

            $update = $this->user->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {

            $repose = $this->user->delete($id);

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

            $repose = $this->user->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);

        } catch (\PDOException $e) {

            return Response()->json([false, $e->errorInfo[2]]);

        }
    }
}
