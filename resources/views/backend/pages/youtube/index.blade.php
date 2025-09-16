{{-- resources/views/backend/youtube/index.blade.php --}}
@extends('backend.layouts.main')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <div class="welcome-text">
                    <h4>All YouTube Videos</h4>
                </div>
            </div>
            <div class="col-sm-6 justify-content-sm-end d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">YouTube</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">YouTube List</h4>
                        <a href="{{ route('youtube.create') }}" class="btn btn-primary">+ Add New</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>URL</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($videos as $video)
                                        <tr class="mb-1">
                                            <td>{{ $video->title }}</td>
                                            <td>
                                                <a href="{{ $video->url }}" target="_blank">{{ Str::limit($video->url, 50) }}</a>
                                            </td>
                                            <td>{{ Str::limit($video->description, 50) }}</td>
                                            <td>
                                                <a href="{{ route('youtube.edit', $video->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="la la-pencil"></i>
                                                </a>
                                                <form action="{{ route('youtube.destroy', $video->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                        <i class="la la-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Tidak ada video tersedia.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- <div class="mt-3">
                                {{ $videos->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
