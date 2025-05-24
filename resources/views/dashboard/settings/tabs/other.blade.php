<div class="tab-pane fade" id="other">
    <h3 class="page-title">{{ __('dashboard.settings.other') }}</h3>
    <div class="col-md-10">
        <div class="form-group">
            <label class="col-md-2">
                {{ __('dashboard.settings.privacy_policy') }}
            </label>
            <div class="col-md-9">
                <input type="text" class="form-control" name="other[privacy_policy]" value="{{ config('setting.other')['privacy_policy'] }}" />
            </div>
        </div>
    </div>
</div>
