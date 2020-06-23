<div class="table-responsive">
    <table class="table" id="topics-table">
        <thead>
            <tr>
                <th>Chapter Id</th>
        <th>Image</th>
        <th>Topic Name</th>
        <th>Created By</th>
        <th>Short Description</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($topics as $topic)
            <tr>
                <td>{{ $topic->chapter_id }}</td>
            <td>{{ $topic->image }}</td>
            <td>{{ $topic->topic_name }}</td>
            <td>{{ $topic->created_by }}</td>
            <td>{{ $topic->short_description }}</td>
                <td>
                    {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('topics.show', [$topic->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('topics.edit', [$topic->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
