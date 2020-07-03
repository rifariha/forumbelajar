@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Edit User Profile</h1><br><br>
        <div>
            {{ Breadcrumbs::render('profile') }}
        </div>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#change-password">Ganti Password</a>
        </h1>
    </section>
    <br>
   <div class="content">
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                  {!! Form::model($user, ['route' => ['profile.update'], 'method' => 'patch', 'files' => true,'enctype'=>'multipart/form-data']) !!}

                        <!-- Name Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('name', 'Nama:', ['class' => 'required']) !!}
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

                        <!-- Address Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('address', 'Alamat:', ['class' => 'required']) !!}
                            {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>2]) !!}
                        </div>

                        <!-- Phone Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('phone', 'No. Telepon:', ['class' => 'required']) !!}
                            {!! Form::number('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <!-- Phone Field -->
                        <div class="form-group col-sm-4">
                            {!! Form::label('image', 'Ganti Foto Profil:', ['class' => 'required']) !!}
                            {!! Form::file('image', null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="col-md-12"><br></div>
                        <div class="form-group col-sm-4">
                            {!! Form::label('password', 'Password:', ['class' => 'required']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
                        </div>


                    {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>

   <div class="modal fade" id="change-password">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Ganti Password</h4>
            </div>
            <div class="modal-body">
                 {!! Form::open(['route' => ['profile.changepassword'], 'method' => 'patch' ]) !!}
                <div class="form-group col-sm-12">
                    {!! Form::label('password', 'Password Lama:', ['class' => 'required']) !!}
                    {!! Form::password('oldpassword', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('password', 'Password Baru:', ['class' => 'required']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-12">
                    {!! Form::label('password', 'Ulangi Password Baru:', ['class' => 'required']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

            </div>
            <div class="modal-footer">
                
                <div class="form-group col-sm-12">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection