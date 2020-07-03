
<div class="pull-right">
    <form action="{{ route('forums.destroy',[$topic->chapter_id,$topic->id,$reply->id]) }}" method="POST">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <button onclick="return confirm('Hapus Komentar ?')" class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"> </i></button>
    </form>
</div>