{{-- resources/views/backend/youtube/create.blade.php --}}
@extends('backend.layouts.main')

@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6">
                <div class="welcome-text">
                    <h4>Add YouTube Video</h4>
                </div>
            </div>
            <div class="col-sm-6 justify-content-sm-end d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add YouTube Video</li>
                </ol>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('youtube.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        {{-- Title --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- URL --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>URL YouTube</label>
                                <input type="url" name="url" class="form-control" value="{{ old('url') }}" placeholder="https://youtube.com/watch?v=...">
                                @error('url')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('youtube.index') }}" class="btn btn-light">Cancel</a>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
