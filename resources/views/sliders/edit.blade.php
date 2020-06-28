@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Edit Slider
        </h1>
   </section>
   <div class="content">
        <div>
            {{ Breadcrumbs::render('slider') }}
        </div>
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($slider, ['route' => ['sliders.update', $slider->id], 'method' => 'patch','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('sliders.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection