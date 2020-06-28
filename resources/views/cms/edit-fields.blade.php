<!-- Cms Name Field -->
@role('Superadmin')
<div class="form-group col-sm-12">
    {!! Form::label('cms_name', 'Nama CMS:', ['class' => 'required']) !!}
    {!! Form::text('cms_name', null, ['class' => 'form-control']) !!}
</div>
@endrole

@role('Admin')
<div class="form-group col-sm-12">
    {!! Form::label('cms_name', 'Nama CMS:', ['class' => 'required']) !!}
    {!! Form::text('cms_name', null, ['class' => 'form-control','readonly']) !!}
</div>
@endrole


<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Content:', ['class' => 'required']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cms.index') }}" class="btn btn-default">Cancel</a>
</div>
