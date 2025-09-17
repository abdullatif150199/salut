@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Add FAQ</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">FAQ</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Add FAQ</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Basic Info</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('faqs.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <!-- Question -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Question</label>
                                            <input type="text" name="question" class="form-control"
                                                value="{{ old('question') }}" required>
                                            @error('question')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Answer -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Answer</label>
                                            <textarea name="answer" class="form-control" rows="4" required>{{ old('answer') }}</textarea>
                                            @error('answer')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('faqs.index') }}" class="btn btn-light">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
