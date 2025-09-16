<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>@yield('title', 'Admin Dashboard') | UT SALUT</title>
    <meta name="description" content="@yield('meta_description', 'UT SALUT (Sentra Layanan Universitas Terbuka): Mendukung pembelajaran jarak jauh dengan layanan akademik, administrasi, dan informasi untuk mahasiswa Universitas Terbuka.')">
    <meta name="keywords" content="@yield('meta_keywords', 'UT SALUT, Universitas Terbuka, pendidikan jarak jauh, layanan akademik, layanan mahasiswa, kuliah online, e-learning, studi fleksibel')">
    <meta name="author" content="UT SALUT">


    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/logo.svg') }}" type="image/svg+xml">
    <link rel="shortcut icon" href="{{ asset('assets/img/logo.svg') }}" type="image/svg+xml">




    <!-- Favicon icon -->
    {{-- <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend-assets/images/favicon.png') }}"> --}}
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/jqvmap/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend-assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/skin-2.css') }}">

    {{-- toastr --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />

    <!-- Datatable -->
    <link rel="stylesheet" href="{{ asset('backend-assets/vendor/datatables/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend-assets/css/style.css') }}">

    {{-- trix editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">

    {{-- font awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

    <style>
        .trix-lg {
            min-height: 300px;
        }

        trix-editor.trix-content {
            min-height: 300px;
        }
    </style>

</head>

<body>

    {{-- @include('sweetalert::alert') --}}

    @yield('container')

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- Required vendors -->
    <script src="{{ asset('backend-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/dlabnav-init.js') }}"></script>

    <!-- Chart ChartJS plugin files -->
    <script src="{{ asset('backend-assets/vendor/chart.js/Chart.bundle.min.js') }}"></script>

    <!-- Chart piety plugin files -->
    <script src="{{ asset('backend-assets/vendor/peity/jquery.peity.min.js') }}"></script>

    <!-- Chart sparkline plugin files -->
    <script src="{{ asset('backend-assets/vendor/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- Demo scripts -->
    <script src="{{ asset('backend-assets/js/dashboard/dashboard-3.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ asset('backend-assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend-assets/js/plugins-init/datatables.init.js') }}"></script>

    <!-- JS Toastify -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Svganimation scripts -->
    <script src="{{ asset('backend-assets/vendor/svganimation/vivus.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/svganimation/svg.animation.js') }}"></script>

    {{-- chart morris --}}
    <script src="{{ asset('backend-assets/vendor/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('backend-assets/vendor/morris/morris.min.js') }}"></script>

    {{-- trix editor --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.delete-form');
                    Swal.fire({
                        title: 'Delete Item!',
                        text: "Yakin ingin menghapus item ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

    @stack('script')

</body>

</html>
