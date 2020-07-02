<div class="pull-right">
    <form action="{{ route('forums.destroy',[$topic->chapter_id,$topic->id,$comment->id]) }}" method="POST">
        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"> </i></button>
    </form>
</div>  