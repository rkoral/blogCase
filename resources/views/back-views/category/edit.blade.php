@extends('back-views.layouts.masterPage')
@section('title', 'Panel')
@section('content')

    <div class="container-fluid">
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category_name">Kategori İsmi</label>
                <input type="text" class="form-control" id="category_name"  placeholder="Kategori ismi giriniz" name="category_name" value="{{ $category->category_name }}">
            </div>
            {{-- <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="active" name="active" checked>
                    <label class="form-check-label" for="active">
                    Aktif
                    </label>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-primary">Güncelle</button>
        </form>

    </div>

@endsection