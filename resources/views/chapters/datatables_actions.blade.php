{!! Form::open(['route' => ['chapters.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('chapters.show', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('edit-bab')
    <a href="{{ route('chapters.edit', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan

    @can('hapus-bab')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
