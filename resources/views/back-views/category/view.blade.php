@extends('back-views.layouts.masterPage')
@section('title', 'Panel')
@section('content')

    <div class="container-fluid">

            <div class="form-group">
                <label for="category_name">Kategori İsmi</label>
                <input type="text" class="form-control" id="category_name"  placeholder="Kategori ismi giriniz" name="category_name" value="{{ $category->category_name }}" disabled>
            </div>

    </div>

@endsection