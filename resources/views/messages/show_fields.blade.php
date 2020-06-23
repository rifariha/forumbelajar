<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{{ $message->subject }}</p>
</div>

<!-- Sender Name Field -->
<div class="form-group">
    {!! Form::label('sender_name', 'Sender Name:') !!}
    <p>{{ $message->sender_name }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{{ $message->message }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $message->user_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $message->status }}</p>
</div>

