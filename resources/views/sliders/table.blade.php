<div class="table-responsive">
    <table class="table" id="sliders-table">
        <thead>
            <tr>
                <th>Slider Name</th>
        <th>Image</th>
        <th>Desription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->slider_name }}</td>
            <td>{{ $slider->image }}</td>
            <td>{{ $slider->desription }}</td>
                <td>
                    {!! Form::open(['route' => ['sliders.destroy', $slider->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('sliders.show', [$slider->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('sliders.edit', [$slider->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
