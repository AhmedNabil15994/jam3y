<div class="html-copy-edit" style="display:none;">
		<div class="col-md-12">
				<h3 class="page-title">{{__('dashboard.course_groups.create.name')}}</h3>
				@foreach (config('setting.locales') as $code)
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.course_groups.create.name')}} - {{ $code }}
						</label>
						<div class="col-md-9">
								<input type="text" name="title_video_{{$code}}[]" class="form-control" data-name="title_video_{{$code}}">
								<div class="help-block"></div>
						</div>
				</div>
				@endforeach
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.course_groups.create.vide_link')}}
						</label>
						<div class="col-md-9">
								<input type="text" class="form-control" name="video_link[]">
								<div class="help-block"></div>
						</div>
				</div>
				<div class="form-group">
						<label class="col-md-2">
								{{__('dashboard.course_groups.create.is_free')}}
						</label>
						<div class="col-md-2">
								<input type="text" class="form-control" name="is_free[]" placeholder="on is free">
								<div class="help-block"></div>
						</div>
				</div>
				<div class="form-group">
						<a href="javascript:;" class="remove_html btn red">
								<i class="fa fa-times"></i>
						</a>
				</div>
		</div>
</div>
