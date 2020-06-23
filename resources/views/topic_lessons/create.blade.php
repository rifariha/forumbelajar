@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Topic Lesson
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'topicLessons.store']) !!}

                        @include('topic_lessons.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
