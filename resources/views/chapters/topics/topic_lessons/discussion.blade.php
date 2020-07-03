<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>

<div class="col-md-12">
<h3> Ranah Diskusi </h3>
@include('adminlte-templates::common.errors')
<hr>
    <!-- Post -->
    <?php if($comments->toArray() == []) { echo "Belum ada diskusi di materi pelajaran ini";}?>
    @foreach($comments as $comment)
    <div class="post clearfix">
        <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{ url('storage/'.$comment->user->image) }}" alt="User Image">
            <span class="username">
                <a href="#"><?=ucwords($comment->user->name)?></a>
            </span>
        <span class="description">
            {{ time_since($comment->created_at) }}
        </span>
        </div>
        @if(Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin') || Auth::user()->id == $comment->user_id)
            @include('chapters.topics.topic_lessons.delete_discussion')
        @endif
        <!-- /.user-block -->
        <p> <?= $comment->comment ?></p>
        @foreach($comment->descendant as $reply)
        	<div class="user-block" style="margin-left: 4rem">
                <img class="img-circle img-bordered-sm" src="{{ url('storage/'.$reply->user->image) }}" alt="User Image">
                    <span class="username">
                        <a href="#"><?=ucwords($reply->user->name)?></a>
                    </span>
                <span class="description">
                    {{ time_since($reply->created_at) }}
                </span>
                <p style="padding-top:5pt"><?=$reply->comment?></p>
                @if(Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin') || Auth::user()->id == $reply->user_id)
                     @include('chapters.topics.topic_lessons.delete_comment')
                @endif
                </div>
        @endforeach

    
    <form class="form-horizontal" method="post" action="{{ route('forums.store', [$topic->chapter_id,$topic->id])}}">
        <div class="form-group margin-bottom-none">
            <div class="col-sm-11">
                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                <input name="parent_id" type="hidden" value="{{ $comment->id }}"/>
            <textarea class="form-control input-sm" name="comment" placeholder="Jawab" cols=10 rows=3 style="resize: none;"></textarea>
            </div>
            <div class="col-sm-1">
            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Balas</button>
            </div>
        </div>
        </form>
    </div>
    @endforeach
    <center>
    {{ $comments->links() }}
    </center>
    <hr>
</div>

<div class="col-md-12"><br></div>
<div class="col-md-12">
    <div class="box-body">
        {!! Form::open(['route' => ['forums.store',$topic->chapter_id,$topic->id]]) !!}

       <div class="form-group col-sm-12">
        {!! Form::label('comment', 'Buat Diskusi Baru:') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control ckeditor','rows' => 2, 'cols' => 2]) !!}
        </div>

        <!-- Submit Field -->
        <div class="form-group col-sm-12">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}
    </div>

    	<!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

	
	<script>
	$(document).ready(function(e){
		$showPostFrom = 0;
		$showPostCount = 3;
		$(document).on('click','.show-more',function(){
			$showPostFrom += $showPostCount;
			$('.load-post').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i>Loading...');
			$.ajax({
				type:'POST',
				url:'ajax_more.php',
				data:{ 'action':'showPost', 'showPostFrom':$showPostFrom, 'showPostCount':$showPostCount },
				success:function(data){
					if(data != ''){
						$('.load-post').html('Show More');
						$('.post-data-list').append(data);
					}else{
						$('.show-more').hide();
					}
				}
			});
			
		});

	});
	</script>