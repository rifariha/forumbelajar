<!-- Topic Id Field -->
<div class="form-group">
    {!! Form::label('topic_id', 'Topic Id:') !!}
    <p>{{ $forum->topic_id }}</p>
</div>

<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', 'Parent Id:') !!}
    <p>{{ $forum->parent_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $forum->user_id }}</p>
</div>

<!-- Comment Field -->
<div class="form-group">
    {!! Form::label('comment', 'Comment:') !!}
    <p>{{ $forum->comment }}</p>
</div>

