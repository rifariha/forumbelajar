{!! Form::open(['route' => ['topics.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('topics.show', $id) }}" class='btn btn-primary btn-md'>
        Lihat Materi
    </a>
    @can('edit-materi')
    <a href="{{ route('topics.edit', $id) }}" class='btn btn-default btn-md'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('hapus-materi')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-md',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
