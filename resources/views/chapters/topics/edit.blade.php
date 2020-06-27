@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Edit Materi
        </h1>
   </section>
   <div class="content">
        <div>
            {{ Breadcrumbs::render('materi',$chapter) }}
        </div>
        @include('flash::message')
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <?php $chapter_id = request()->segment(2); ?>
                   {!! Form::model($topic, ['route' => ['topics.update', $chapter_id,$topic->id], 'method' => 'patch', 'files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('chapters.topics.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection