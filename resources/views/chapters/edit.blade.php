@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Bab
        </h1>
   </section>
   <div class="content">
       <div>
            {{ Breadcrumbs::render('bab') }}
        </div>
       @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chapter, ['route' => ['chapters.update', $chapter->id], 'method' => 'patch','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('chapters.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection