<h2> Backup Diskusi </h2>

<div class="col-md-12">
<hr>
    <!-- Post -->
    @foreach($comments as $comment)
    <div class="post clearfix">
        <div class="user-block">
            <span class="username">
                <a href="#"><?=ucwords($comment->user->name)?></a>
            </span>
        <span class="description">
            {{ $comment->created_at }}
        </span>
        </div>
      
        <!-- /.user-block -->
        <p> <?= $comment->comment ?></p>
        @foreach($comment->descendant as $reply)
        	<div class="user-block" style="margin-left: 4rem">
                    <span class="username">
                        <a href="#"><?=ucwords($reply->user->name)?></a>
                    </span>
                <span class="description">
                    {{ $reply->created_at }}
                </span>
                <p style="padding-top:5pt"><?=$reply->comment?></p>
                
                </div>
        @endforeach

    
   
    @endforeach
    <hr>
</div>

<div class="col-md-12"><br></div>