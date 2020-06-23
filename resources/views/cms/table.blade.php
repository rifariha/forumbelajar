<div class="table-responsive">
    <table class="table" id="cms-table">
        <thead>
            <tr>
                <th>Cms Name</th>
        <th>Content</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cms as $cms)
            <tr>
                <td>{{ $cms->cms_name }}</td>
            <td>{{ $cms->content }}</td>
                <td>
                    {!! Form::open(['route' => ['cms.destroy', $cms->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cms.show', [$cms->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('cms.edit', [$cms->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
