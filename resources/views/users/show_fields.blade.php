<div class="col-md-12 row">
<!-- Name Field -->
<div class="form-group col-md-6">
    {!! Form::label('name', 'Nama:') !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group col-md-6">
    {!! Form::label('email', 'Email:') !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Username Field -->
<div class="form-group col-md-6">
    {!! Form::label('username', 'Username:') !!}
    <p>{{ $user->username }}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-md-6">
    {!! Form::label('phone', 'No Telepon:') !!}
    <p>{{ $user->phone }}</p>
</div>

<!-- Image Field -->
<div class="form-group col-md-6">
    {!! Form::label('image', 'Foto:') !!}<br>
    <img src="{{ url('storage/'.$user->image) }}" width="20%">
</div>

<!-- Address Field -->
<div class="form-group col-md-6">
    {!! Form::label('address', 'Alamat:') !!}
    <p>{{ $user->address }}</p>
</div>

<!-- Status Field -->
<div class="form-group col-md-6">
    {!! Form::label('status', 'Status:') !!}
    @if($user->status == 1)
    <p>Aktif</p>
    @elseif($user->status == 0)
    <p>Tidak Aktif</p>
    @endif
</div>

<!-- Bmkz Origin Field -->
<div class="form-group col-md-6">
    {!! Form::label('bmkz_origin', 'Asal Bmkz:') !!}
    <p>{{ $user->bmkz_origin }}</p>
</div>

<!-- Mz Origin Field -->
<div class="form-group col-md-6">
    {!! Form::label('mz_origin', 'Asal Mz:') !!}
    <p>{{ $user->mz_origin }}</p>
</div>

<!-- Suluk Field -->
<div class="form-group col-md-6">
    {!! Form::label('suluk', 'Suluk:') !!}
    <p>{{ $user->suluk }}</p>
</div>

<!-- Alumni Field -->
<div class="form-group col-md-6">
    {!! Form::label('alumni', 'Alumni Afas Dasar Angkatan:') !!}
    <p>{{ $user->alumni }}</p>
</div>
</div>
