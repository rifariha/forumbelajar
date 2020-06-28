{!! Form::open(['route' => ['newsCategories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
   @can('edit-kategori-berita')
    <a href="{{ route('newsCategories.edit', $id) }}" class='btn btn-default btn-sm'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
     @endcan
     @can('hapus-kategori-berita')
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'submit',
        'class' => 'btn btn-danger btn-sm',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
    @endcan
</div>
{!! Form::close() !!}
