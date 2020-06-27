@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1 class="pull-left">Materi {{$chapter->chapter_name}}</h1><br><br>
     <p align="justify"> {{$chapter->description}} </p>
    <br>
        <div>
            {{ Breadcrumbs::render('materi',$chapter) }}
        </div>
        <h1 class="pull-right">
            <?php $chapter_id = request()->segment(2); ?>
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('topics.create',[$chapter_id]) }}">Tambah Materi Bab</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('chapters.topics.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

