<!-- Category Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_name', 'Nama Kategori:') !!}
    {!! Form::text('category_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('newsCategories.index') }}" class="btn btn-default">Cancel</a>
</div>
