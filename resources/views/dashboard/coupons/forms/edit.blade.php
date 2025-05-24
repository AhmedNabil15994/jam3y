<div class="tab-pane fade active in" id="global_setting">
    <h3 class="page-title">{{__('dashboard.coupons.create.code')}}</h3>
    <div class="col-md-10">
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.coupons.create.code')}}
            </label>
            <div class="col-md-9">
                <input type="text" name="code" class="form-control" data-name="code" value="{{$coupon->code}}">
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.coupons.create.is_fixed_price')}}
            </label>
            <div class="col-md-9">
                <input type="checkbox" class="ischecked" name="is_fixed_price" value="1" onclick="fixedPrice()" {{($coupon->is_fixed_price == 1) ? 'checked' : ''}}>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.coupons.create.price')}}
            </label>
            <div class="col-md-9">
                <input type="text" name="price" class="form-control" data-name="price" disabled {{($coupon->is_fixed_price == 1) ? 'value='.$coupon->price.'' : 'disabled'}}>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.coupons.create.percent')}}
            </label>
            <div class="col-md-9">
                <input type="text" name="percent" class="form-control" data-name="percent" {{($coupon->is_fixed_price == 1) ? 'disabled' : 'value='.$coupon->percent.''}}>
                <div class="help-block"></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2">
                {{__('dashboard.coupons.create.expire_date')}}
            </label>
            <div class="col-md-9">
                <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                    <input type="text" class="form-control" name="expire_date"  value="{{$coupon->expire_date}}">
                    <span class="input-group-btn">
                        <button class="btn default" type="button">
                            <i class="fa fa-calendar"></i>
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
