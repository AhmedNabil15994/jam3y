<?php

namespace App\Modules\Subscription\ViewComposers;

use App\Modules\Subscription\Repository\OrderRepository;
use Illuminate\View\View;

class StatisticsProfitComposer
{
    public function __construct(OrderRepository $orders)
    {
        $this->monthlyProfite =  $orders->monthlyProfiteOnly();
        $this->totalProfit    =  $orders->totalProfit();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('totalProfit'       , $this->totalProfit);
        $view->with('monthlyProfite'    , $this->monthlyProfite);
    }
}
