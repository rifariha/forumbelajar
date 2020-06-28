@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Gallery
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('gallery') }}
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('galleries.show_fields')
                    <a href="{{ route('galleries.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
