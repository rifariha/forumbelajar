@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Cms
        </h1>
   </section>
   <div class="content">
       <div>
            {{ Breadcrumbs::render('cms') }}
        </div>
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cms, ['route' => ['cms.update', $cms->id], 'method' => 'patch']) !!}

                        @include('cms.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection