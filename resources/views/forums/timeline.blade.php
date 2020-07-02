<ul class="timeline">

    <!-- timeline time label -->
    <li class="time-label">
        <span class="bg-info">
           Log Aktivitas
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    @foreach($forums as $forum)
    <li>
        <!-- timeline icon -->
        <i class="fa fa-comments bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?= time_since($forum->created_at) ?></span>

            <h3 class="timeline-header">{{ ucwords($forum->user->name) }}</h3>

            <div class="timeline-body">
                Telah Berkomentar pada materi <b> {{ $forum->topic->topic_name }} </b> : <br>
                <i><?=$forum->comment?></i> 
            </div>

            <div class="timeline-footer">
               <a href="{{ route('topics.show', [$forum->topic->chapter->id,$forum->topic->id]) }}" class='btn btn-primary btn-sm'>Lihat Materi Diskusi</a>
            </div>
        </div>
    </li>
    @endforeach
    <!-- END timeline item -->


</ul>