@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tambah Cms
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('cms') }}
        </div>
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'cms.store','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('cms.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
