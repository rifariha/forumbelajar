@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit User Profile
        </h1>
   </section>
   <div class="content">
       <div>
            {{ Breadcrumbs::render('profile') }}
        </div>
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
@endsection