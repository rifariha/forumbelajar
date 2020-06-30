<!-- Headline Field -->
<div class="form-group col-sm-12">
    {!! Form::label('headline', 'Judul Berita:', ['class' => 'required']) !!}
    {!! Form::text('headline', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('content', 'Isi Berita:', ['class' => 'required']) !!}
    {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('category_id', 'Kategori:', ['class' => 'required']) !!}
    {!! Form::select('category_id', $category , null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('image', 'Gambar:', ['class' => 'required']) !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
    <i class="red"> Maksimal 1 Mb </i>
    <br>
    <img src="{{ url('storage/'.$news->image) }}">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('news.index') }}" class="btn btn-default">Cancel</a>
</div>
