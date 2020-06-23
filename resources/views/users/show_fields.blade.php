<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Username Field -->
<div class="form-group">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $user->username }}</p>
</div>

<!-- Email Verified At Field -->
<div class="form-group">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $user->email_verified_at }}</p>
</div>

<!-- Password Field -->
<div class="form-group">
    {!! Form::label('password', 'Password:') !!}
    <p>{{ $user->password }}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{{ $user->phone }}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $user->image }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $user->status }}</p>
</div>

<!-- Bmkz Origin Field -->
<div class="form-group">
    {!! Form::label('bmkz_origin', 'Bmkz Origin:') !!}
    <p>{{ $user->bmkz_origin }}</p>
</div>

<!-- Mz Origin Field -->
<div class="form-group">
    {!! Form::label('mz_origin', 'Mz Origin:') !!}
    <p>{{ $user->mz_origin }}</p>
</div>

<!-- Suluk Field -->
<div class="form-group">
    {!! Form::label('suluk', 'Suluk:') !!}
    <p>{{ $user->suluk }}</p>
</div>

<!-- Alumni Field -->
<div class="form-group">
    {!! Form::label('alumni', 'Alumni:') !!}
    <p>{{ $user->alumni }}</p>
</div>

<!-- Remember Token Field -->
<div class="form-group">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    <p>{{ $user->remember_token }}</p>
</div>

