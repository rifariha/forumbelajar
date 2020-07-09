<!-- Cms Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('cms_name', 'Nama CMS:', ['class' => 'required']) !!}
    {!! Form::text('cms_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cms Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('type', 'Tipe input:', ['class' => 'required']) !!}
    {!! Form::select('type', ['text' => 'Text', 'file' => 'File'], 'text', ['id' => 'select-type','class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12" id="inputtext">
    {!! Form::label('content', 'Content:', ['class' => 'required']) !!}
    {!! Form::textarea('content', null, ['id' => 'value' ,'class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12 col-lg-12" id="inputfile" style="display:none">
    {!! Form::label('content', 'Content:', ['class' => 'required']) !!}
    {!! Form::file('content', null, ['id' => 'value2','class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cms.index') }}" class="btn btn-default">Cancel</a>
</div>