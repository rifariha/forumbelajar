@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Komentar Diskusi Terbaru</h1><br><br>
        <div>
            {{ Breadcrumbs::render('forum') }}
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('forums.table')
                    <center>
                    {{ $forums->links() }}
                    </center>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

