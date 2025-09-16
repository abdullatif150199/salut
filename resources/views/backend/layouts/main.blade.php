@extends('backend.layouts.base')

@section('container')
    <!--*******************
                Preloader start
            ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
                Preloader end
            ********************-->

    <div id="main-wrapper">
        @include('backend.layouts.sidebar')
        @yield('content')
        @include('backend.layouts.footer')
    </div>
@endsection


@push('script')
    <script src="{{ asset('backend-assets/js/styleSwitcher.js') }}"></script>
@endpush
