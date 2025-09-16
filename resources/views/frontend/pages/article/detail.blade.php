@extends('frontend.layouts.main')

@section('title', $article->title)

@section('content')
    <!-- Hero / Header -->
    <section
        class="page-header text-center py-5 bg-gradient-to-r from-indigo-900 via-indigo-800 to-indigo-700 text-white mt-5">
        <div class="container">
            <h1 class="fw-bold">{{ $article->title }}</h1>
            <p class="mb-0 mt-3">
                <small>
                    <i class="fas fa-calendar-alt"></i> {{ $article->created_at->format('d F Y') }} &nbsp; | &nbsp;
                    <i class="fas fa-user"></i> Admin SALUT
                </small>
            </p>
        </div>
    </section>

    <section class="article-detail py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">

                    <!-- Thumbnail -->
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded shadow-lg w-100"
                            style="max-height: 500px; object-fit: cover; object-position: center;"
                            alt="{{ $article->title }}">
                    </div>

                    <!-- Konten -->
                    <article class="article-content">
                        <div class="content-text" style="line-height: 1.8; font-size: 1.05rem;">
                            {!! $article->body !!}
                        </div>
                    </article>
                    <div class="mt-4 text-center">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary text-decoration-none neon-text mt-auto fw-semibold">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Home
                        </a>
                    </div>


                    <!-- Divider -->
                    <hr class="my-5">

                    <!-- Share -->
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold">Bagikan artikel ini:</span>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                                target="_blank" class="btn btn-sm btn-outline-primary mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::url()) }}" target="_blank"
                                class="btn btn-sm btn-outline-info mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($article->title . ' ' . Request::url()) }}"
                                target="_blank" class="btn btn-sm btn-outline-success mx-1">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Artikel Terkait -->
    {{-- <div> --}}
    {{-- </div> --}}
    @include('frontend.sections.article')

@endsection
