<!-- Chapter Name Field -->
<div class="form-group">
    {!! Form::label('chapter_name', 'Chapter Name:') !!}
    <p>{{ $chapter->chapter_name }}</p>
</div>

<!-- Short Description Field -->
<div class="form-group">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $chapter->short_description }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $chapter->description }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $chapter->image }}</p>
</div>

