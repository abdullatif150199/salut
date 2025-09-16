@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add Gallery</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Gallery</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('galleries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            {{-- Thumbnail --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Thumbnail</label>
                                <input type="file" name="img_thumb" class="form-control-file" required>
                                @error('img_thumb')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Title --}}
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Judul Galeri</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}"
                                    required>
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Subtitle --}}
                            {{-- <div class="col-md-12 mb-3">
                                <label class="form-label">Sub Judul</label>
                                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}">
                                @error('subtitle')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}

                            {{-- Description --}}
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="description" class="trix-content trix-lg"></trix-editor>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Multiple Images --}}
                            <div class="col-md-12">
                                <label class="form-label">Images</label>
                                <input type="file" name="images[]" class="form-control-file" multiple>
                                @error('images.*')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- Buttons --}}
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('galleries.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
