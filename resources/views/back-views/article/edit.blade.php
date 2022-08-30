@extends('back-views.layouts.masterPage')
@section('title', 'Panel')
@section('content')

    <div class="container-fluid">
        <form action="{{ route('admin.article.update',$article->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="article_name">Makale İsmi</label>
                <input type="text" class="form-control" id="article_title"  placeholder="Makale ismi giriniz" name="article_title" value="{{ $article->article_title }}" >
            </div>
            <div class="form-group">
                <label for="article_content">Makale Metni</label>
                <textarea class="form-control" id="article_content"  placeholder="Makale metnini giriniz" name="article_content" >{{ $article->article_content }}</textarea>
            </div>
            <div class="form-group">
                <select class="form-select" aria-label="Kategori Seçiniz" name="category_id" >
                    @foreach ($categories as $category)
					    <option @if($article->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach

                </select>
            </div>
            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>
    </div>

@endsection