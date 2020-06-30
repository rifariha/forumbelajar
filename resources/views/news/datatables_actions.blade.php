{!! Form::open(['route' => ['news.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('news.show', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('edit-berita')
    <a href="{{ route('news.edit', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('hapus-berita')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
