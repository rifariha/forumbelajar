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
         <h1 class="pull-right">
            @can('kirim-pesan')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('messages.create') }}"><i class="fa fa-pencil"></i> Broadcast Pesan</a>
            @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              @unlessrole('Superadmin|Admin')
              <li class="<?php if(!Auth::user()->hasRole('Admin')){echo 'active';}?>"><a href="#inbox" data-toggle="tab"><i class="fa fa-inbox"> Kotak Masuk </i></a></li>
              @endrole
              @hasanyrole('Superadmin|Admin')
              <li class="<?php if(Auth::user()->hasRole('Admin')||Auth::user()->hasRole('Superadmin')){echo 'active';}?>"><a href="#sent" data-toggle="tab"><i class="fa fa-envelope"> Pesan Terkirim </i></a></li>
              @endrole
            </ul>
            <div class="tab-content">
              @unlessrole('Superadmin|Admin')
              <div class="tab-pane <?php if(!Auth::user()->hasRole('Admin')){echo 'active';}?>" id="inbox">
                <?php 
                $temps = $messages->toArray();
                if(empty($temps['data'])) { echo "Anda belum mengirim pesan apapun";}?>
                @include('messages.inbox')
              </div>
              @endrole
              @hasanyrole('Superadmin|Admin')
              <div class="tab-pane <?php if(Auth::user()->hasRole('Admin')||Auth::user()->hasRole('Superadmin')){echo 'active';}?>" id="sent">
                <?php 
                $temp = $sents->toArray();
                if(empty($temp['data'])) { echo "Anda belum mengirim pesan apapun";}?>
                 @include('messages.sent-item')
              </div>
             @endrole
            </div>
            <!-- /.tab-content -->
          </div>
  
        
        <div class="text-center">
        
        </div>
    </div>
@endsection

