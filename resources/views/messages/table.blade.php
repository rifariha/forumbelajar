<div class="table-responsive">
    <table class="table" id="messages-table">
        <thead>
            <tr>
                <th>Subject</th>
        <th>Sender Name</th>
        <th>Message</th>
        <th>User Id</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messages as $message)
            <tr>
                <td>{{ $message->subject }}</td>
            <td>{{ $message->sender_name }}</td>
            <td>{{ $message->message }}</td>
            <td>{{ $message->user_id }}</td>
            <td>{{ $message->status }}</td>
                <td>
                    {!! Form::open(['route' => ['messages.destroy', $message->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messages.show', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('messages.edit', [$message->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
