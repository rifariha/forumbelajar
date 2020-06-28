
<!-- Short Description Field -->
<div class="form-group">
    {!! Form::label('short_description', 'Judul:') !!}
    <p>{{ $gallery->short_description }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Deksripsi:') !!}
    <p>{{ $gallery->description }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <img src="{{ url('storage/'.$gallery->image) }}" width="20%">
</div>

