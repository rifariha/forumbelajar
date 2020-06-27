<!-- Topic Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic_name', 'Judul Materi:', ['class' => 'required']) !!}
    {!! Form::text('topic_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Deskripsi:', ['class' => 'required']) !!}
    {!! Form::text('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Ganti Cover:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    <i class="red"> Maksimal 1 Mb </i>
     <br>
     <img src="{{ url('storage/'.$topic->image) }}" >
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('chapters.show',[$chapter_id]) }}" class="btn btn-default">Cancel</a>
</div>
