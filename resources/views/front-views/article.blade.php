@extends('front-views.layouts.masterPage')
@section('title', 'Anasayfa')
@section('content')

@foreach ($articles as $article)
<section class="page-section about-heading">
    <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('front/')}}/assets/img/about.jpg" alt="..." />
        <div class="about-heading-content">
            <div class="row">
                <div class="col-xl-9 col-lg-10 mx-auto">
                    <div class="bg-faded rounded p-5">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-lower">{{ $article->article_title }}</span>
                        </h2>
                        <p>{{ $article->article_content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection

