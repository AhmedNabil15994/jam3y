<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Subscription\Repository\OrderRepository as Order;
use App\Modules\Subscription\Requests\OrderRequest;
use Illuminate\Http\Request;
use DataTable;

class OrderController extends DashboardController
{
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $couponCounter = $this->order->countCouponsOrders();
        return view('dashboard.orders.home')->with(['couponCounter'=>$couponCounter]);
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->order->QueryTable($request));
    }

    public function create()
    {
        return view('dashboard.orders.create');
    }

    public function store(OrderRequest $request)
    {
        $create = $this->order->create($request);

        if ($create) {
            return Response()->json([true , __('dashboard.general.create_success_alert')]);
        }

        return Response()->json([false  , __('dashboard.general.ops_alert')]);
    }

    public function show($id)
    {
        $order  = $this->order->findById($id);

        if (!$order)
            return abort(404);

        return view('dashboard.orders.show' , compact('order'));
    }

    public function edit($id)
    {
        $order  = $this->order->findById($id);

        if (!$order)
            return abort(404);

        return view('dashboard.orders.edit' , compact('order'));
    }

    public function update(OrderRequest $request, $id)
    {
        if ($request->ajax()){

            $update = $this->order->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {
            $repose = $this->order->delete($id);

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
            $repose = $this->order->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
