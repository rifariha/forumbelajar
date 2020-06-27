@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tambah Materi 
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
                    {!! Form::open(['route' => ['topics.store',$chapter_id], 'files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('chapters.topics.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
