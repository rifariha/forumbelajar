<div class="table-responsive">
    <table class="table" id="topicLessons-table">
        <thead>
            <tr>
                <th>Topic Id</th>
        <th>Lesson</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($topicLessons as $topicLesson)
            <tr>
                <td>{{ $topicLesson->topic_id }}</td>
            <td>{{ $topicLesson->lesson }}</td>
                <td>
                    {!! Form::open(['route' => ['topicLessons.destroy', $topicLesson->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('topicLessons.show', [$topicLesson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('topicLessons.edit', [$topicLesson->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
