@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
           Edit Kategori
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
                   {!! Form::model($newsCategory, ['route' => ['newsCategories.update', $newsCategory->id], 'method' => 'patch']) !!}

                        @include('news_categories.edit-fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection