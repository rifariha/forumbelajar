<script src="//cdn.ckeditor.com/4.14.1/basic/ckeditor.js"></script>

<div class="col-md-12">
<h3> Ranah Diskusi </h3>
<hr>
    <!-- Post -->
    <div class="post clearfix">
        <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{ url('storage/'.'image/'.Auth::user()->image) }}" alt="User Image">
            <span class="username">
                <a href="#">Sarah Ross</a>
            </span>
        <span class="description">Sent you a message - 3 days ago</span>
        </div>
        <!-- /.user-block -->
        <p>
        Lorem ipsum represents a long-held tradition for designers,
        typographers and the like. Some people hate it and argue for
        its demise, but others ignore the hate as they create awesome
        tools to help create filler text for everyone from bacon lovers
        to Charlie Sheen fans.
        </p>

        <form class="form-horizontal">
        <div class="form-group margin-bottom-none">
            <div class="col-sm-11">
            <textarea class="form-control input-sm" placeholder="Jawab" cols=10 rows=3 style="resize: none;"></textarea>
            </div>
            <div class="col-sm-1">
            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Kirim</button>
            </div>
        </div>
        </form>
    </div>

    <div class="post clearfix">
        <div class="user-block">
        <img class="img-circle img-bordered-sm" src="{{ url('storage/'.'image/'.Auth::user()->image) }}" alt="User Image">
            <span class="username">
                <a href="#">Sarah Ross</a>
            </span>
        <span class="description">Sent you a message - 3 days ago</span>
        </div>
        <!-- /.user-block -->
        <p>
        Lorem ipsum represents a long-held tradition for designers,
        typographers and the like. Some people hate it and argue for
        its demise, but others ignore the hate as they create awesome
        tools to help create filler text for everyone from bacon lovers
        to Charlie Sheen fans.
        </p>

        <form class="form-horizontal">
        <div class="form-group margin-bottom-none">
            <div class="col-sm-11">
            <textarea class="form-control input-sm" placeholder="Jawab" cols=10 rows=3 style="resize: none;"></textarea>
            </div>
            <div class="col-sm-1">
            <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Kirim</button>
            </div>
        </div>
        </form>
    </div>
    
    <hr>
</div>

<div class="col-md-12"><br></div>
<div class="col-md-12">
    <div class="box-body">
        {!! Form::open(['route' => ['topicLessons.store',$topic->chapter_id,$topic->id]]) !!}

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
