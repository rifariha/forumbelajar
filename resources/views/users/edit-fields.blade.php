<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-4">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('password', 'New Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-4">
    {!! Form::label('password', 'Confirm New Password:') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
</div>


<!-- Phone Field -->
<div class="form-group col-sm-4">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Status Akun:') !!}
    {!! Form::select('status', ['0' => 'Tidak aktif', '1' => 'Aktif'], '1', ['class' => 'form-control']) !!}
</div>

<!-- Bmkz Origin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('bmkz_origin', 'Asal BMKZ:') !!}
    {!! Form::text('bmkz_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Mz Origin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('mz_origin', 'Asal MZ:') !!}
    {!! Form::text('mz_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Suluk Field -->
<div class="form-group col-sm-2">
    {!! Form::label('suluk', 'Suluk:') !!}
    {!! Form::text('suluk', null, ['class' => 'form-control']) !!}
</div>

<!-- Alumni Field -->
<div class="form-group col-sm-3">
    {!! Form::label('alumni', 'Alumni AFAS Dasar Angkatan:') !!}
    {!! Form::text('alumni', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
