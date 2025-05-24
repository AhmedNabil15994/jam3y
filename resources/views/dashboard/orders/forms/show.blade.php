<div class="tab-pane active" id="preview">
    <div class="invoice">
        <div class="row invoice-logo">
            <div class="col-xs-6">
                <p>
                    <img src="{{ url(config('setting.logo')) }}" class="img-responsive" style="width:40%" />
                </p>
            </div>
            <div class="col-xs-6">
                <p> #{{ $order['id'] }} /
                    {{ date('Y-m-d',strtotime($order->created_at)) }}
                </p>
            </div>
        </div>
        <hr />
        <div class="row">
            <h3>{{__('dashboard.order.form.show.user_info')}}</h3>
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.username')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.email')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.mobile')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center sbold">
                                <a href="{{url(route('users.show',$order->user->id))}}">
                                    {{ $order->user->name }}
                                </a>
                            </td>
                            <td class="text-center sbold"> {{ $order->user->email }}</td>
                            <td class="text-center sbold"> {{ $order->user->mobile }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
        <div class="row">
            <h3>{{__('dashboard.order.form.show.subscription_info')}}</h3>
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.subtotal')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.off')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.total')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center sbold"> {{ $order->subtotal }} </td>
                            <td class="text-center sbold"> {{ $order->off }} </td>
                            <td class="text-center sbold"> {{ $order->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <hr />
        <div class="row">
            <h3>{{__('dashboard.order.form.show.courses_info')}}</h3>
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.cours_title')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.cours_start_at')}}
                            </th>
                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.cours_end_at')}}
                            </th>

                            <th class="invoice-title uppercase text-center">
                                {{__('dashboard.order.form.show.course_total')}}
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->subscriptions as $subscribe)
                          <tr>
                              <td class="text-center sbold"> {{ $subscribe->course->title }} </td>
                              <td class="text-center sbold"> {{ $subscribe->start_at }} </td>
                              <td class="text-center sbold"> {{ $subscribe->end_at }} </td>
                              <td class="text-center sbold"> {{ $subscribe->price }} </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{--
<div class="tab-pane" id="edit">
    <form id="updateForm" method="POST" action="{{url(route('orders.update',$order['id']))}}" enctype="multipart/form-data" class="horizontal-form">
        <div class="no-print">
            @csrf
            <input name="_method" type="hidden" value="PUT">
            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption">
                                <i class="icon-bubbles font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">
                                    اسناد فني لخدمة " {{ $order->service->title }} "
                                </span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="mt-comments">
                                    @foreach ($order->service->cars as $car)
                                    <div class="col-md-6">
                                        <div class="mt-comment">
                                            <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                    <span class="mt-comment-author">
                                                        {{ $car->title }}
                                                    </span>
                                                </div>
                                                <div class="mt-comment-details">
                                                    <div class="form-group">
                                                        <div class="mt-radio-inline">
                                                            <label class="mt-radio mt-radio-outline">
                                                                <input type="radio" name="car_id" value="{{ $car->id }}" {{($order->technicalCar->technical_car_id == $car->id) ? 'checked' : ''}}>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                موعد طلب المعاينة
                                <span class="required">*</span>
                            </label>
                            <div class="input-group">
                                <input autocomplete="off" type="text" class="form-control timepicker timepicker-24" name="time" value="{{$order->time}}">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                تاريخ طلب المعاينة
                                <span class="required">*</span>
                            </label>
                            <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                                <input type="text" class="form-control" name="date" value="{{$order->date}}">
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">
                                تغير حالة الطلب
                                <span class="required">*</span>
                            </label>
                            <select name="preview_status_id" id="single" class="form-control select2">
                                @foreach ($statuses as $status)
                                <option value="{{ $status->id }}" @if ($order->preview_status_id == $status->id)
                                selected
                                @endif>
                                    {{ $status->title }}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="user_notifi" value="1">
                                    ارسال اشعار للمستخدم
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="mt-checkbox-list">
                                <label class="mt-checkbox">
                                    <input type="checkbox" name="tech_notifi" value="1">
                                    ارسال اشعار للفني
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="result" style="display: none"></div>

            <div class="progress-info" style="display: none">
                <div class="progress">
                    <span class="progress-bar progress-bar-warning"></span>
                </div>
                <div class="status" id="progress-status"></div>
            </div>
            <div class="form-group">
                <button type="submit" id="submit" class="btn green btn-lg">
                    تعديل
                </button>
            </div>
        </div>
    </form>
</div> --}}
