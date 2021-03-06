@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Isi Pesan
        </h1>
    </section>
    <div class="content">
        <div>
            {{ Breadcrumbs::render('pesan') }}
        </div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <a href="{{ route('messages.index') }}" class="btn btn-default">Back</a><br>
                    @include('messages.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
