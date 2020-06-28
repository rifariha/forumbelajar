<!-- Short Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('short_description', 'Ubah Judul:', ['class' => 'required']) !!}
    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Ubah Deskripsi:', ['class' => 'required']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Ganti Foto:', ['class' => 'required']) !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    <i class="red"> Maksimal 1 Mb </i>
     <br>
     <img src="{{ url('storage/'.$gallery->image) }}" >
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('galleries.index') }}" class="btn btn-default">Cancel</a>
</div>
