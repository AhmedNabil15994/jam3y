<?php

namespace App\Http\Controllers\Dashboard;

use App\Modules\Subscription\Repository\CouponRepository as Coupon;
use App\Modules\Subscription\Requests\CouponRequest;
use Illuminate\Http\Request;
use DataTable;

class CouponController extends DashboardController
{
    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }

    public function index()
    {
        return view('dashboard.coupons.home');
    }

    public function dataTable(Request $request)
    {
        return DataTable::GenerateTable($request, $this->coupon->QueryTable($request));
    }

    public function create()
    {
        return view('dashboard.coupons.create');
    }

    public function store(Request $request)
    {
        $create = $this->coupon->create($request);

        if ($create) {
            return Response()->json([true , __('dashboard.general.create_success_alert')]);
        }

        return Response()->json([false  , __('dashboard.general.ops_alert')]);
    }

    public function show($id)
    {
        $coupon  = $this->coupon->findById($id);

        if (!$coupon)
            return abort(404);

        return view('dashboard.coupons.show' , compact('coupon'));
    }

    public function edit($id)
    {
        $coupon  = $this->coupon->findById($id);

        if (!$coupon)
            return abort(404);

        return view('dashboard.coupons.edit' , compact('coupon'));
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()){

            $update = $this->coupon->update($request , $id);

            if($update){
                return Response()->json([true , __('dashboard.general.update_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        }
    }

    public function destroy($id)
    {
        try {
            $repose = $this->coupon->delete($id);

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
            $repose = $this->coupon->deleteAll($request);

            if ($repose) {
                return Response()->json([true, __('dashboard.general.delete_success_alert')]);
            }

            return Response()->json([false  , __('dashboard.general.ops_alert')]);
        } catch (\PDOException $e) {
            return Response()->json([false, $e->errorInfo[2]]);
        }
    }
}
