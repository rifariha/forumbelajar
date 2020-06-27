@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Topic
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   <?php $chapter_id = request()->segment(2); ?>
                   {!! Form::model($topic, ['route' => ['topics.update', $chapter_id,$topic->id], 'method' => 'patch']) !!}

                        @include('chapters.topics.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection