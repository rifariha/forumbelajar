<!-- Topic Id Field -->
<div class="form-group">
    {!! Form::label('topic_id', 'Topic Id:') !!}
    <p>{{ $backupLog->topic_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $backupLog->status }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Created By:') !!}
    <p>{{ $backupLog->created_by }}</p>
</div>

