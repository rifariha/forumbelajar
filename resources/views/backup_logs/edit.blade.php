@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Backup Log
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($backupLog, ['route' => ['backupLogs.update', $backupLog->id], 'method' => 'patch']) !!}

                        @include('backup_logs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection