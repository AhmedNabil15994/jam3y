<?php

namespace App\Modules\Users\Repository;

use App\Modules\Users\Models\User;
use DB;

class UserRepository
{
    function __construct(User $user)
    {
        $this->user = $user;
    }

    /*
    * Get All Objects
    */
    public function getAll($order = 'id', $sort = 'desc')
    {
        $users = $this->user->orderBy($order, $sort)->get();
        return $users;
    }

    /*
    * Get All Objects
    */
    public function teachersOnly($order = 'id', $sort = 'desc')
    {
        $users = $this->user->whereHas('roles.perms', function($query){
                    $query->where('name','teachers_access');
                 })->orderBy($order, $sort)->get();

        return $users;
    }


    public function countUsers($order = 'id', $sort = 'desc')
    {
        $users = $this->user->doesnthave('roles.perms')->count();

        return $users;
    }

    public function countTeachers($order = 'id', $sort = 'desc')
    {
        $teachers = $this->user->whereHas('roles.perms', function($query){
                    $query->where('name','teachers_access');
                 })->count();

        return $teachers;
    }

    public function userCreatedStatistics()
    {
        $data["userDate"] = $this->user
                            ->select(\DB::raw("DATE_FORMAT(created_at,'%Y-%m') as date"))
                            ->groupBy('date')
                            ->pluck('date');

        $userCounter = $this->user
                        ->select( \DB::raw("count(id) as countDate"))
                        ->groupBy(\DB::raw("DATE_FORMAT(created_at, '%Y-%m')"))
                        ->get();

        $data["countDate"] = json_encode(array_pluck($userCounter, 'countDate'));

        return $data;
    }

    /*
    * Find Object By ID
    */
    public function findById($id)
    {
        $user = $this->user->find($id);
        return $user;
    }

    /*
    * Create New Object & Insert to DB
    */
    public function create($request)
    {
        DB::beginTransaction();

        try {

          $user = $this->user->create([
              'name'          => $request['name'],
              'email'         => $request['email'],
              'mobile'        => $request['mobile'],
              'password'      => bcrypt($request['password']),
              'avatar'        => $request['image'] && $request['image'][0] ? get_path($request['image'][0]) : '/uploads/users/user.png',
          ]);

          if($request['roles'] != null)
              $this->saveRoles($user,$request);

          DB::commit();
          return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    public function saveRoles($user,$request)
    {
        foreach ($request['roles'] as $key => $value) {
            $user->attachRole($value);
        }

        return true;
    }
    /*
    * Find Object By ID & Update to DB
    */
    public function update($request,$id)
    {
        DB::beginTransaction();

        $user = $this->findById($id);

        try {

          if ($request['password'] == null)
              $password = $user['password'];
          else
              $password  = bcrypt($request['password']);

            $user->update([
                'name'          => $request['name'],
                'email'         => $request['email'],
                'mobile'        => $request['mobile'],
                'password'      => $password,
                'avatar'        => $request['image'][0] ? get_path($request['image'][0]) : $user->avatar,
            ]);

            if($request['roles'] != null)
            {
                DB::table('role_user')->where('user_id',$id)->delete();

                foreach ($request['roles'] as $key => $value) {
                    $user->attachRole($value);
                }
            }

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Translate all fields with multi languages
    */
    public function translateTable($model,$request)
    {
        foreach ($request['description'] as $locale => $value) {
          $model->translateOrNew($locale)->description = $value;
          $model->translateOrNew($locale)->display_name = $request['display_name'][$locale];
        }

        $model->save();
    }

    /*
    * Find Object By ID & Delete it from DB
    */
    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $model = $this->findById($id);

            $model->delete();

            DB::commit();
            return true;

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
    }

    /*
    * Find all Objects By IDs & Delete it from DB
    */
    public function deleteAll($request)
    {
        return $users = $this->user->destroy($request['ids']);
    }

    /*
    * Generate Datatable
    */
    public function QueryTable($request)
    {
        $query = $this->user
                ->with('roles')
                ->select('*',DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as createdAt'))
                ->where(function($query) use($request) {
                    $query
                    ->where('id'                , 'like' , '%'. $request->input('search.value') .'%')
                    ->orWhere('name'            , 'like' , '%'. $request->input('search.value') .'%');
                });

        $query = self::filterDataTable($query,$request);

        return $query;
    }

    /*
    * Filteration for Datatable
    */
    public static function filterDataTable($query,$request)
    {
        if (isset($request['req']['from']) && $request['req']['from'] != '')
            $query->whereDate('created_at'  , '>=' , $request['req']['from']);

        if (isset($request['req']['to']) && $request['req']['to'] != '')
            $query->whereDate('created_at'  , '<=' , $request['req']['to']);

        return $query;
    }
}
