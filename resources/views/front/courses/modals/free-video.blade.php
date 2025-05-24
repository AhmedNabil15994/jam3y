<div class="modal-header">
    <h5 class="modal-title">{{$video->title}}</h5>
    <button type="button" class="close" data-dismiss="modal" onclick="pausePreview()">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="course-preview-video-wrap">
        <div class="embed-responsive embed-responsive-16by9">
            <div class="plyr__video-embed player">
                {!! $video_script !!}
            </div>
        </div>
    </div>
</div>