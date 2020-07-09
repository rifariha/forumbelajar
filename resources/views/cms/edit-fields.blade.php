<!-- Cms Name Field -->
@role('Superadmin')
<div class="form-group col-sm-12">
    {!! Form::label('cms_name', 'Nama CMS:', ['class' => 'required']) !!}
    {!! Form::text('cms_name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('type', 'Tipe Input:') !!}
    {!! Form::select('type', ['text' => 'Text', 'file' => 'File'], null, ['class' => 'form-control']) !!}
</div>

@endrole

@role('Admin')
<div class="form-group col-sm-12">
    {!! Form::label('cms_name', 'Nama CMS:', ['class' => 'required']) !!}
    {!! Form::text('cms_name', null, ['class' => 'form-control','readonly']) !!}
</div>
@endrole

@if($cms->type == 'text')
<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:', ['class' => 'required']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>
@elseif($cms->type == 'file')
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:', ['class' => 'required']) !!}
    {!! Form::file('content', null, ['class' => 'form-control']) !!}
</div>
@endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cms.index') }}" class="btn btn-default">Cancel</a>
</div>
