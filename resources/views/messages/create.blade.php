@extends('layouts.app')

@section('content')

    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <section class="content-header">
        <h1>
            Broadcast Pesan
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('pesan') }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'messages.store']) !!}

                        @include('messages.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
