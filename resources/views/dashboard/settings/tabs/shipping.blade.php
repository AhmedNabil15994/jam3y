<div class="tab-pane fade" id="shipping">
    <h3 class="page-title">{{ __('dashboard.settings.shipping_label') }}</h3>
    <div class="col-md-10">
        <div class="form-group">
            <label class="col-md-2">
                {{ __('dashboard.settings.default_shipping') }}
            </label>
            <div class="col-md-9">
                <input type="number" class="form-control" name="default_shipping" value="{{ config('setting.default_shipping') }}" />
            </div>
        </div>
    </div>
</div>
