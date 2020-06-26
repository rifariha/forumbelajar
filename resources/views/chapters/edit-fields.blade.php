<!-- Chapter Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapter_name', 'Judul Bab:') !!}
    {!! Form::text('chapter_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Deskripsi Singkat:') !!}
    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Deskripsi Lengkap:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Ganti Cover:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
     <i class="red"> Maksimal 1 Mb </i>
     <br>
     <img src="{{ url('storage/'.$chapter->image) }}" >
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chapters.index') }}" class="btn btn-default">Cancel</a>
</div>
