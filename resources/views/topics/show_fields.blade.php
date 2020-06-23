<!-- Chapter Id Field -->
<div class="form-group">
    {!! Form::label('chapter_id', 'Chapter Id:') !!}
    <p>{{ $topic->chapter_id }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $topic->image }}</p>
</div>

<!-- Topic Name Field -->
<div class="form-group">
    {!! Form::label('topic_name', 'Topic Name:') !!}
    <p>{{ $topic->topic_name }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $topic->created_by }}</p>
</div>

<!-- Short Description Field -->
<div class="form-group">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $topic->short_description }}</p>
</div>

