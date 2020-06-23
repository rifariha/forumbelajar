<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $gallery->image }}</p>
</div>

<!-- Short Description Field -->
<div class="form-group">
    {!! Form::label('short_description', 'Short Description:') !!}
    <p>{{ $gallery->short_description }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $gallery->description }}</p>
</div>

