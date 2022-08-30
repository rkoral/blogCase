@php
    $categories = App\Models\Category::where('deleted_at', null)->get('category_name');
@endphp
<nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
        <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('home.dashboard') }}">Anasayfa</a></li>
                @foreach ($categories as $category)
                <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="{{ route('home.index', $category->category_name) }}">{{ $category->category_name }}</a></li>
                @endforeach

            </ul>
        </div>
    </div>
</nav>