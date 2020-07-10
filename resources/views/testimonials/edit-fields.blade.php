<!-- Slider Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('slider_name', 'Judul Slider:', ['class' => 'required']) !!}
    {!! Form::text('slider_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Desription Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desription', 'Deskripsi:', ['class' => 'required']) !!}
    {!! Form::textarea('desription', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Foto:', ['class' => 'required']) !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
     <i class="red"> Maksimal 1 Mb </i>
     <br>
     <img src="{{ url('storage/'.$slider->image) }}" >
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('testimonials.index') }}" class="btn btn-default">Cancel</a>
</div>
