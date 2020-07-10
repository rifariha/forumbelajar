@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Tambah Testimonial
        </h1>
    </section>
    <div class="content">
         <div>
            {{ Breadcrumbs::render('testimonial') }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'testimonials.store','files' => true,'enctype'=>'multipart/form-data']) !!}

                        @include('testimonials.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
