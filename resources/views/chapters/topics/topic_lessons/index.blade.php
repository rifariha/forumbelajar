@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1 class="pull-left">Materi Pelajaran {{$topic->topic_name}}</h1><br><br>
     <p align="justify"> {{$topic->short_description}} </p>
    <br>
        <div>
            {{ Breadcrumbs::render('lesson',$topic) }}
        </div>
        @can('tambah-pelajaran')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('topicLessons.create',[$topic->chapter->id,$topic->id]) }}">Tambah Baru</a>
           <a class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right:10px" href="{{ route('topicLessons.create',[$topic->chapter->id,$topic->id]) }}">Backup Diskusi</a>
        </h1>
        @endcan
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('chapters.topics.topic_lessons.accordion')
            </div>

            <div class="box-body">
               @include('chapters.topics.topic_lessons.discussion')
            </div>
        </div>
    </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

