@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6">
                    <div class="welcome-text">
                        <h4>All Galleries</h4>
                    </div>
                </div>
                <div class="col-sm-6 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Galleries</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Gallery List</h4>

                            <a href="{{ route('galleries.create') }}" class="btn btn-primary">+ Add New</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Jumlah Foto</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($galleries as $gallery)
                                            <tr>
                                                <td>
                                                    @if ($gallery->img_thumb)
                                                        <img width="70"
                                                            src="{{ asset('storage/' . $gallery->img_thumb) }}"
                                                            alt="Thumbnail">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $gallery->title }}</td>
                                                <td>{{ \Illuminate\Support\Str::limit(strip_tags($gallery->description), 50) }}
                                                </td>
                                                <td>{{ $gallery->images->count() }}</td>
                                                <td>

                                                    <a href="{{ route('galleries.edit', $gallery->id) }}"
                                                        class="btn btn-sm btn-primary me-1">
                                                        <i class="la la-pencil"></i>
                                                    </a>

                                                    <form action="{{ route('galleries.destroy', $gallery->id) }}"
                                                        method="POST" style="display:inline;" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-sm btn-danger delete-btn">
                                                            <i class="la la-trash-o"></i>
                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted">Tidak ada galeri tersedia.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {{-- Jika pakai pagination --}}
                            <div class="mt-3">
                                {{ $galleries->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
