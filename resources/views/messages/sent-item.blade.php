
<!-- /.box-header -->
<div class="box-body no-padding">
    <div class="table-responsive mailbox-messages">
        
    <table class="table table-hover table-striped">
        <tbody>
        @foreach($sents as $sent)   
        <tr>
        <td></td>
        <td class="mailbox-name"><a href="{{ route('sentitem.show', [$sent->batch]) }}">Kepada : Semua user</a></td>
        <td class="mailbox-subject">{{ $sent->subject}} - <?=limit_word($sent->message,5)?> ..
        </td>
    <td class="mailbox-date">{{time_since($sent->created_at)}}</td>
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
    {{ $sents->links() }}
    </div>
</div>