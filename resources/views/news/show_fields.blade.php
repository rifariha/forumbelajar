<!-- Headline Field -->
<div class="form-group">
    {!! Form::label('headline', 'Judul Berita:') !!}
    <p>{{ $news->headline }}</p>
</div>

<!-- Created By Field -->
<div class="form-group">
    {!! Form::label('created_by', 'Dibuat Oleh:') !!}
    <p>{{ $news->created_by }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Kategori:') !!}
    <p>{{ $news->category->category_name }}</p>
</div>

<!-- Content Field -->
<div class="form-group">
    {!! Form::label('content', 'Isi Berita:') !!}
    <p><?=$news->content ?></p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Gambar:') !!}<br>
    <img src="{{ url('storage/'.$news->image) }}" width="20%">
</div>


