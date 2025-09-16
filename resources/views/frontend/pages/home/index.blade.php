@extends('frontend.layouts.main')

@section('content')
    @include('frontend.sections.hero')
    @include('frontend.sections.about_salut')
    @include('frontend.sections.about_ut')
    @include('frontend.sections.why_choose_ut')
    @include('frontend.sections.program_studi')
    @include('frontend.sections.program_detail_modal')
    @include('frontend.sections.requirement')
    @if ($galleries->count() > 0)
        @include('frontend.sections.gallery')
    @endif

    @include('frontend.sections.service')
    @include('frontend.sections.article')
    @if ($videos->count() > 0)
        @include('frontend.sections.youtube_section')
    @endif
    @include('frontend.sections.registration_form')
    {{-- @include('frontend.home.sections.contact') --}}
@endsection
