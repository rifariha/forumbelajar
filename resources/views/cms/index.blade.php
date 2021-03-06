@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cms</h1><br><br>
        <div>
            {{ Breadcrumbs::render('cms') }}
        </div>
        <h1 class="pull-right">
            @can('tambah-cms')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('cms.create') }}">Tambah CMS</a>
            @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('cms.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

