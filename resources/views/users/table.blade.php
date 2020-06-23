<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Email</th>
        <th>Username</th>
        <th>Email Verified At</th>
        <th>Password</th>
        <th>Phone</th>
        <th>Image</th>
        <th>Status</th>
        <th>Bmkz Origin</th>
        <th>Mz Origin</th>
        <th>Suluk</th>
        <th>Alumni</th>
        <th>Remember Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email_verified_at }}</td>
            <td>{{ $user->password }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->image }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->bmkz_origin }}</td>
            <td>{{ $user->mz_origin }}</td>
            <td>{{ $user->suluk }}</td>
            <td>{{ $user->alumni }}</td>
            <td>{{ $user->remember_token }}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$user->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
