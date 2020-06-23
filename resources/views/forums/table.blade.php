<div class="table-responsive">
    <table class="table" id="forums-table">
        <thead>
            <tr>
                <th>Topic Id</th>
        <th>Parent Id</th>
        <th>User Id</th>
        <th>Comment</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($forums as $forum)
            <tr>
                <td>{{ $forum->topic_id }}</td>
            <td>{{ $forum->parent_id }}</td>
            <td>{{ $forum->user_id }}</td>
            <td>{{ $forum->comment }}</td>
                <td>
                    {!! Form::open(['route' => ['forums.destroy', $forum->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('forums.show', [$forum->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('forums.edit', [$forum->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
