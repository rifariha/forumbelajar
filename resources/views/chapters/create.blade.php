@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tambah Bab
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('bab') }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'chapters.store','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('chapters.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
