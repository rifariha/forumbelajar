<div class="box-header with-border">

    <div class="box-tools pull-right">
    <div class="has-feedback">
        {{-- <input type="text" class="form-control input-sm" placeholder="Cari Pesan">
        <span class="glyphicon glyphicon-search form-control-feedback"></span> --}}
        
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
        <td class="mailbox-name"><a href="{{ route('messages.show', [$message->id]) }}">Dari : {{ $message->sender_name}}</a></td>
        <td class="mailbox-subject <?php if($message->status == 0) { echo 'textbold'; }?>">{{ $message->subject}} - <?=limit_word($message->message,5)?> ..
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