<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $modules = ['roles','users','categories','courses','course_packages','attachments','leasons','coupons','orders','news','sliders','pages','settings','translations','logs'];
        $perms = ['show','add','delete','edit'];
        $roles = [
           [
               'name'   => 'super-admin',
               'display_name'   => 'Super Admin',
           ],
            [
                'name'   => 'user',
                'display_name'   => 'User',
            ]
        ];
        \App\Modules\Roles\Models\Role::insert($roles);

        \App\Modules\Users\Models\User::find(1)->attachRole(1);
        $ids = [];
        foreach ($modules as $module) {
            foreach ($perms as $perm){
                $permKey = $perm.'_'.$module;
                $obj = \App\Modules\Permissions\Models\Permission::create([
                    'name' => $permKey,
                    'display_name'  => $module,
                    'ar'    => [
                        'description' => ucwords(str_replace('_',' ',$permKey)),
                        'display_name' => ucwords(str_replace('_',' ',$permKey))
                    ],
                    'en'    => [
                        'description' => ucwords(str_replace('_',' ',$permKey)),
                        'display_name' => ucwords(str_replace('_',' ',$permKey))
                    ],
                ]);
                $ids[]= $obj->id;
            }
        }
        \App\Modules\Roles\Models\Role::find(1)->perms()->sync($ids);


        // $this->call(UsersTableSeeder::class);
    }
}
