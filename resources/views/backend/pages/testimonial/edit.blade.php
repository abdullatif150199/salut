@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Edit Testimonial</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Edit Testimonial</li>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            {{-- User --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="user" class="form-control"
                                        value="{{ old('user', $testimonial->user) }}">
                                    @error('user')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            {{-- Image --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Gambar</label><br>
                                    @if ($testimonial->img)
                                        <img src="{{ asset('storage/' . $testimonial->img) }}" alt="" width="120"
                                            class="mb-2">
                                    @endif
                                    <input type="file" name="img" class="form-control-file">
                                    @error('img')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>


                            {{-- Content --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Review</label>
                                    <textarea name="content" rows="6" class="form-control">{{ old('content', $testimonial->content) }}</textarea>
                                    @error('content')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rating (1 - 5)</label>
                                    <input type="number" name="rating" min="1" max="5" step="1"
                                        class="form-control" value="{{ old('rating', $testimonial->rating) }}" required>
                                    @error('rating')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('testimonials.index') }}" class="btn btn-light">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
