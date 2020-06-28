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
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'cms.store']) !!}

                        @include('cms.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
