<!-- Topic Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('topic_id', 'Topic Id:') !!}
    {!! Form::number('topic_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Lesson Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lesson', 'Lesson:') !!}
    {!! Form::text('lesson', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('topicLessons.index') }}" class="btn btn-default">Cancel</a>
</div>
