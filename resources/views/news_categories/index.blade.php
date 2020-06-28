@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Kategori Berita</h1><br><br>
        <div>
            {{ Breadcrumbs::render('kategori_berita') }}
        </div>
        <h1 class="pull-right">
            @can('tambah-kategori-berita')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('newsCategories.create') }}">Tambah Baru</a>
           @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('news_categories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

