@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit User
        </h1>
   </section>
   <div class="content">
       <div>
            {{ Breadcrumbs::render('users') }}
        </div>
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection