@extends('layouts.app')

@section('content')
<style>
    .textbold{
        font-weight: bold;
    }
</style>
    <section class="content-header">
        <h1 class="pull-left">Kelola Pesan</h1><br><br>
        <div>
            {{ Breadcrumbs::render('pesan') }}
        </div>
        {{-- <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('messages.create') }}">Add New</a>
        </h1> --}}
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-envelope"> Kotak Masuk </i></h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Cari Pesan">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                  
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                   @foreach($messages as $message)   
                  <tr>
                    <td></td>
                  <td class="mailbox-name"><a href="{{ route('messages.show', [$message->id]) }}">From : {{ $message->sender_name}}</a></td>
                    <td class="mailbox-subject <?php if($message->status == 0) { echo 'textbold'; }?>">{{ $message->subject}} - {{limit_word($message->message,5)}} ..
                    </td>
                <td class="mailbox-date">{{time_since($message->created_at)}}</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls"  style="display: flex; justify-content: flex-end">
                <!-- Check all button -->
                {{ $messages->links() }}
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

