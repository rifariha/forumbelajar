<!-- Slider Name Field -->
<div class="form-group">
    {!! Form::label('slider_name', 'Judul Slider:') !!}
    <p>{{ $slider->slider_name }}</p>
</div>


<!-- Desription Field -->
<div class="form-group">
    {!! Form::label('desription', 'Deskripsi:') !!}
    <p>{{ $slider->desription }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Foto:') !!}
   <img src="{{ url('storage/'.$slider->image) }}" width="20%">
</div>


