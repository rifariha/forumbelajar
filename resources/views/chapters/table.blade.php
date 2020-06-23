<div class="table-responsive">
    <table class="table" id="chapters-table">
        <thead>
            <tr>
                <th>Chapter Name</th>
        <th>Short Description</th>
        <th>Description</th>
        <th>Image</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($chapters as $chapter)
            <tr>
                <td>{{ $chapter->chapter_name }}</td>
            <td>{{ $chapter->short_description }}</td>
            <td>{{ $chapter->description }}</td>
            <td>{{ $chapter->image }}</td>
                <td>
                    {!! Form::open(['route' => ['chapters.destroy', $chapter->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('chapters.show', [$chapter->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        @can('Edit Bab')
                        <a href="{{ route('chapters.edit', [$chapter->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        @endcan
                        @can('Hapus Bab')
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endcan
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
