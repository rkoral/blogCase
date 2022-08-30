@extends('back-views.layouts.masterPage')
@section('title', 'Panel')
@section('content')

    <div class="container-fluid">
        <form action="{{ route('admin.article.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="article_name">Makale İsmi</label>
                <input type="text" class="form-control" id="article_title"  placeholder="Makale ismi giriniz" name="article_title">
            </div>
            <div class="form-group">
                <label for="article_content">Makale Metni</label>
                <textarea class="form-control" id="article_content"  placeholder="Makale metnini giriniz" name="article_content"></textarea>
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Kategori Seçiniz" name="category_id">
                    <option selected>Kategori Seçiniz</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>

    </div>

@endsection