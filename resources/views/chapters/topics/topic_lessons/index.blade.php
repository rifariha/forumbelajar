@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1 class="pull-left">Materi Pelajaran {{$topic->topic_name}}</h1><br><br>
     <p align="justify"> {{$topic->short_description}} </p>
    <br>
        <div>
            {{ Breadcrumbs::render('lesson',$topic) }}
        </div>
        @can('tambah-pelajaran')
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('topicLessons.create',[$topic->chapter->id,$topic->id]) }}">Tambah Baru</a>
           <a  data-toggle="modal" data-target="#backup" class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px;margin-right:10px" href="{{ route('forums.backup') }}">Backup Diskusi</a>
        </h1>
        @endcan
        
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('chapters.topics.topic_lessons.accordion')
            </div>

            <div class="box-body">
               @include('chapters.topics.topic_lessons.discussion')
            </div>
        </div>
    </div>
        <div class="text-center">
        
        </div>
    </div>

       <div class="modal fade" id="backup">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Masukkan Rentang Tanggal</h4>
            </div>
            <div class="modal-body">
                 {!! Form::open(['route' => ['forums.backup'], 'method' => 'post' ]) !!}

                 {{ Form::hidden('topic_id', $topic->id) }}
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('start_date', 'Mulai dari:', ['class' => 'required']) !!}
                        {!! Form::date('start_date', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('end_daet', 'Sampai:', ['class' => 'required']) !!}
                        {!! Form::date('end_date', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                    {{-- 
                   <button type="button" class="btn btn-default"  id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Pilih Tanggal
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button> --}}
                  
            </div>
            <div class="modal-footer">
                
                <div class="form-group col-sm-12">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary', 'onclick' => "return confirm('Tindakan ini akan menghapus isi diskusi pada materi pelajaran ini sesuai rentang tanggal yang anda masukan, lanjutkan?')"]) !!}
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
                
            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


@endsection

