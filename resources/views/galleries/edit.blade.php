@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit dokumentasi
        </h1>
   </section>
   <div class="content">
       <div>
            {{ Breadcrumbs::render('gallery') }}
        </div>
        @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($gallery, ['route' => ['galleries.update', $gallery->id], 'method' => 'patch','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('galleries.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection