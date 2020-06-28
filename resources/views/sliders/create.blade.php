@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Tambah Slider
        </h1>
    </section>
    <div class="content">
         <div>
            {{ Breadcrumbs::render('slider') }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'sliders.store','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('sliders.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
