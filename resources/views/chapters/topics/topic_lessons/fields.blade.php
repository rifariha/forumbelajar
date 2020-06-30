<!-- Lesson Field -->
<div class="form-group col-sm-12">
    {!! Form::label('lesson', 'Isi Pelajaran:') !!}
    {!! Form::textarea('lesson', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('topics.show',[$topic->chapter_id,$topic->id]) }}" class="btn btn-default">Cancel</a>
</div>
