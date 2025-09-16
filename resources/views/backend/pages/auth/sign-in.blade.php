@extends('backend.layouts.base')

@section('container')
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="authincation-content w-100" style="max-width: 500px">
        <div class="auth-form p-4 shadow rounded bg-white">
            <h4 class="text-center mb-4">Sign in your account</h4>
            <form action="/login" method="POST">
                @csrf
                <div class="form-group">
                    <label><strong>Email</strong></label>
                    <input type="email" name="email" class="form-control" >
                </div>
                <div class="form-group">
                    <label><strong>Password</strong></label>
                    <input type="password" name="password" class="form-control" >
                </div>
                <div class="form-row d-flex justify-content-between mt-4 mb-2">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox ml-1">
                            <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                            <label class="custom-control-label" for="basic_checkbox_1">
                                Remember my preference
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <a href="#">Forgot Password?</a>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                </div>
            </form>
            <div class="new-account mt-3 text-center">
                {{-- <p>Don't have an account? <a class="text-primary" href="/sign-up">Sign up</a></p> --}}
            </div>
        </div>
    </div>
</div>

@endsection
