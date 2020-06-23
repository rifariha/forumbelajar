<!-- Slider Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('slider_name', 'Slider Name:') !!}
    {!! Form::text('slider_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Desription Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('desription', 'Desription:') !!}
    {!! Form::textarea('desription', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sliders.index') }}" class="btn btn-default">Cancel</a>
</div>
