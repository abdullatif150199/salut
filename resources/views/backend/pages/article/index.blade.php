@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>All Articles</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Articles</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">All Articles</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">All Articles</h4>

                                    <a href="{{ route('articles.create') }}" class="btn btn-primary">+ Add new</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">


                                        <table id="example5" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Judul</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal Publish</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($articles as $article)
                                                    <tr>
                                                        <td>
                                                            <img width="100"
                                                                src="{{ asset('storage/' . $article->image) }}"
                                                                alt="">
                                                        </td>
                                                        <td>{{ $article->title }}</td>
                                                        <td>{{ $article->category->title }}</td>
                                                        <td>{{ $article->created_at ? \Carbon\Carbon::parse($article->created_at)->format('d M Y') : '-' }}
                                                        </td>
                                                        <td>

                                                            <a href="{{ route('articles.edit', $article->id) }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="la la-pencil"></i>
                                                            </a>

                                                            <form action="{{ route('articles.destroy', $article->id) }}"
                                                                method="POST" style="display:inline-block;"
                                                                class="delete-form">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger delete-btn">
                                                                    <i class="la la-trash-o"></i>
                                                                </button>
                                                            </form>

                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center text-muted">Tidak ada data
                                                            tersedia.</td>
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

        </div>
    </div>
@endsection
