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
                    <div class="col-md-12">
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                        <div class="mailbox-read-info">
                            <h3>{{ $sent->subject }}</h3>
                            <h5>From: {{ $sent->sender_name }}
                            <span class="mailbox-read-time pull-right"> {{ time_since($sent->created_at) }}</span></h5>
                        </div>
                    
                        <!-- /.mailbox-controls -->
                        <div class="mailbox-read-message">
                            <?= $sent->message ?>
                        </div>
                        <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.box-body -->
                        <!-- /.box-footer -->
                        <div class="box-footer">
                        <div class="pull-right">
                        </div>
                        {!! Form::open(['route' => ['messages.resend', $sent->batch], 'method' => 'post']) !!}

                        {!! Form::button('<i class="fa fa-send"></i> Kirim Ulang', [
                            'type' => 'submit',
                            'class' => 'btn btn-success',
                            'onclick' => "return confirm('Anda yakin mengirim ulang pesan ini ke seluruh user ?')"
                        ]) !!}
                        
                    </div>


                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
