@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Backup Logs</h1><br><br>
        <div>
            {{ Breadcrumbs::render('log') }}
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('backup_logs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

