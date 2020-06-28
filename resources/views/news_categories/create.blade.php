@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tambah Kategori
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('kategori_berita') }}
        </div>
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'newsCategories.store']) !!}

                        @include('news_categories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
