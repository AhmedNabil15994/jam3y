<?php

namespace App\Modules\Users\ViewComposers;

use App\Modules\Users\Repository\UserRepository;
use Illuminate\View\View;

class StatisticsUsersComposer
{
    public function __construct(UserRepository $user)
    {
        $this->users         =  $user->countUsers();
        $this->userCreated   =  $user->userCreatedStatistics();
        $this->teachersCount =  $user->countTeachers();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countUsers'    , $this->users);
        $view->with('userCreated'   , $this->userCreated);
        $view->with('teachersCount' , $this->teachersCount);
    }
}
