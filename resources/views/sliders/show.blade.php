@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Slider
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('slider') }}
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('sliders.show_fields')
                    <a href="{{ route('sliders.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
