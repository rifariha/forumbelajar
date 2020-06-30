@extends('layouts.app')

@section('content')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <section class="content-header">
        <h1>
            Tambah Pelajaran
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('lesson',$topic) }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => ['topicLessons.store',$topic->chapter_id,$topic->id]]) !!}

                        @include('chapters.topics.topic_lessons.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
