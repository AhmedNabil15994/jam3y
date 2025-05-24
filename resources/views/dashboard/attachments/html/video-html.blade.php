<div class="html-copy-edit" style="display:none;">
		<div class="col-md-12">
				<h3 class="page-title">{{__('dashboard.attachments.create.name')}}</h3>
				@foreach (config('setting.locales') as $code)
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.attachments.create.name')}} - {{ $code }}
						</label>
						<div class="col-md-9">
								<input type="text" name="title_link_{{$code}}[]" class="form-control" data-name="title_video_{{$code}}">
								<div class="help-block"></div>
						</div>
				</div>
				@endforeach
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.attachments.create.link')}}
						</label>
						<div class="col-md-9">
								<input type="text" class="form-control" name="link[]">
								<div class="help-block"></div>
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.attachments.create.is_free')}}
						</label>
						<div class="col-md-9">
								<input type="checkbox" class="ischecked" name="is_free[]" value="1" onclick="checkFunction()">
								<input type="hidden" class="isUnchecked" name="is_free[]" value="0" checked>
						</div>
				</div>
				<div class="form-group">
						<a href="javascript:;" class="remove_html btn red">
								<i class="fa fa-times"></i>
						</a>
				</div>
		</div>
</div>
