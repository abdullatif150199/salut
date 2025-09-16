@extends('backend.layouts.main')


@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <!-- Total Artikel -->
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-primary overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title text-white">Total Artikel</h3>
                            <h5 class="text-white mb-0">{{ $articlesCount }}</h5>
                        </div>
                        <div class="card-body text-center mt-3">
                            <div class="ico-sparkline text-white">
                                <i class="ti-book" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Program -->
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-success overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title text-white">Total Gallery</h3>
                            <h5 class="text-white mb-0">{{ $galleriesCount }}</h5>
                        </div>
                        <div class="card-body text-center mt-3">
                            <div class="ico-sparkline text-white">
                                <i class="ti-bookmark" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Videos -->
                <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-secondary overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title text-white">Total Videos</h3>
                            <h5 class="text-white mb-0">{{ $videosCount }}</h5>
                        </div>
                        <div class="card-body text-center mt-3">
                            <div class="ico-sparkline text-white">
                                <i class="ti-youtube" style="font-size: 80px;"></i>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <!-- Total Galeri -->
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Total Jabatan</h3>
                        <h5 class="text-white mb-0">{{ $positionsCount }}</h5>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="ico-sparkline text-white">
                            <i class="ti-calendar" style="font-size: 80px;"></i>
                        </div>
                    </div>
                </div>
            </div> --}}
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">Kunjungan Bulanan</div>
                        <div class="card-body">
                            <div id="chart-monthly" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-6 col-lg-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">Kunjungan Harian</div>
                        <div class="card-body">
                            <div id="chart-weekly" style="height: 300px;"></div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">New Visitors List</h4>

                            <button class="btn btn-primary mb-3 text-white" data-bs-toggle="modal"
                                data-bs-target="#exportModal">
                                Export Excel
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Program</th>
                                            <th>Nama</th>
                                            <th>Wa</th>
                                            <th>Email</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($visitors as $visitor)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($visitor->created_at)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ $visitor->program ?? ' ' }}</td>
                                                <td>{{ $visitor->name }}</td>
                                                <td>{{ $visitor->wa }}</td>
                                                <td>{{ $visitor->email }}</td>
                                                <td>{{ $visitor->message }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Tidak ada data tersedia.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--**********************************
                                                Content body end
                                            ***********************************-->
    {{-- export modal --}}
    <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('visitors.export') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exportModalLabel">Filter Data Export</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
                    </div>
                    <div class="modal-body">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="start_date" class="form-control mb-2">

                        <label>Tanggal Selesai</label>
                        <input type="date" name="end_date" class="form-control mb-2">

                        {{-- <label>Paket</label>
                        <select name="package_id" class="form-control">
                            <option value="">-- Semua Paket --</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                            @endforeach
                        </select> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-close btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Download</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Export Modal --}}
@endsection

@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Load monthly data
            fetch("/api/visitors/monthly")
                .then(res => res.json())
                .then(data => {
                    let months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov',
                        'Dec'
                    ];
                    let chartData = [];

                    for (let i = 1; i <= 12; i++) {
                        chartData.push({
                            month: months[i - 1],
                            total: data[i] || 0
                        });
                    }

                    Morris.Bar({
                        element: 'chart-monthly',
                        data: chartData,
                        xkey: 'month',
                        ykeys: ['total'],
                        labels: ['Pengunjung'],
                        barColors: ['#6673fd'],
                        hideHover: 'auto',
                        resize: true
                    });
                });

            // Load weekly data
            fetch("/api/visitors/weekly")
                .then(res => res.json())
                .then(data => {
                    const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

                    const formattedData = data.map(item => {
                        const dateObj = new Date(item.date);
                        const dayName = days[dateObj.getDay()];
                        return {
                            day: dayName,
                            total: item.total
                        };
                    });

                    Morris.Bar({
                        element: 'chart-weekly',
                        data: formattedData,
                        xkey: 'day',
                        ykeys: ['total'],
                        labels: ['Pengunjung'],
                        barColors: ['#F1C40F'],
                        hideHover: 'auto',
                        resize: true
                    });
                });

        });
    </script>
@endpush
