<!-- Name Field -->
<div class="form-group col-sm-4">
    {!! Form::label('name', 'Name:', ['class' => 'required']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email', 'Email:', ['class' => 'required']) !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-4">
    {!! Form::label('username', 'Username:', ['class' => 'required']) !!}
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
    {!! Form::label('phone', 'Phone:', ['class' => 'required']) !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('address', 'Address:', ['class' => 'required']) !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-3">
    {!! Form::label('status', 'Status Akun:', ['class' => 'required']) !!}
    {!! Form::select('status', ['0' => 'Tidak aktif', '1' => 'Aktif'], '1', ['class' => 'form-control']) !!}
</div>

<!-- Bmkz Origin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('bmkz_origin', 'Asal BMKZ:', ['class' => 'required']) !!}
    {!! Form::text('bmkz_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Mz Origin Field -->
<div class="form-group col-sm-2">
    {!! Form::label('mz_origin', 'Asal MZ:', ['class' => 'required']) !!}
    {!! Form::text('mz_origin', null, ['class' => 'form-control']) !!}
</div>

<!-- Suluk Field -->
<div class="form-group col-sm-2">
    {!! Form::label('suluk', 'Suluk:', ['class' => 'required']) !!}
    {!! Form::text('suluk', null, ['class' => 'form-control']) !!}
</div>

<!-- Alumni Field -->
<div class="form-group col-sm-3">
    {!! Form::label('alumni', 'Alumni AFAS Dasar Angkatan:', ['class' => 'required']) !!}
    {!! Form::text('alumni', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
