@extends('backend.layouts.main')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Edit Gallery</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('galleries.index') }}">Gallery</a></li>
                    <li class="breadcrumb-item active">Edit Gallery</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">

                        {{-- Thumbnail --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Thumbnail</label> <br>
                            @if($gallery->img_thumb)
                                <img src="{{ asset('storage/' . $gallery->img_thumb) }}" alt="Thumbnail" class="img-fluid mb-2 rounded" width="200">
                            @endif
                            <input type="file" name="img_thumb" class="form-control-file">
                            @error('img_thumb')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Title --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Judul Galeri</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}" required>
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Subtitle --}}
                        {{-- <div class="col-md-12 mb-3">
                            <label class="form-label">Sub Judul</label>
                            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $gallery->subtitle) }}">
                            @error('subtitle')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        {{-- Description --}}
                        <div class="col-md-12 mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <input id="description" type="hidden" name="description" value="{{ old('description', $gallery->description) }}">
                            <trix-editor input="description" class="trix-content trix-lg"></trix-editor>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Multiple Images --}}
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Images</label> <br>
                            @if($gallery->images && count($gallery->images) > 0)
                                <div class="mb-2">
                                    @foreach($gallery->images as $image)
                                        <img src="{{ asset('storage/' . $image->path) }}" alt="Foto Tambahan" class="img-thumbnail me-2 mb-2" width="120">
                                    @endforeach
                                </div>
                            @endif
                            <input type="file" name="images[]" class="form-control-file" multiple>
                            @error('images.*')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('galleries.index') }}" class="btn btn-light">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
