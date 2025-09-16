@extends('backend.layouts.main')

@section('content')
    <div class="content-body">
        <div class="container-fluid">

            <!-- Breadcrumb -->
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Pengaturan Situs</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0);">Pengaturan</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ isset($setting) ? 'Ubah Pengaturan' : 'Tambah Pengaturan' }}</h5>
                        </div>
                        <div class="card-body">
                            <form
                                action="{{ isset($setting) ? route('settings.update', $setting->id) : route('settings.store') }}"
                                method="POST">
                                @csrf
                                @if (isset($setting))
                                    @method('PUT')
                                @endif
                                <div class="row">

                                    <!-- WhatsApp -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">WhatsApp</label>
                                            <input type="number" name="whatsapp" class="form-control"
                                                value="{{ old('whatsapp', $setting->whatsapp ?? '') }}"
                                                placeholder="Contoh: 6281234567890">
                                            @error('whatsapp')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Telepon -->
                                    {{-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Telepon</label>
                                            <input type="number" name="phone" class="form-control"
                                                value="{{ old('phone', $setting->phone ?? '') }}"
                                                placeholder="Contoh: 0212345678">
                                            @error('phone')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <!-- Email -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ old('email', $setting->email ?? '') }}"
                                                placeholder="Contoh: admin@domain.com">
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Alamat -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Alamat</label>
                                            <textarea name="address" class="form-control" rows="3"
                                                placeholder="Masukkan alamat lengkap">{{ old('address', $setting->address ?? '') }}</textarea>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Instagram -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Instagram</label>
                                            <input type="text" name="instagram" class="form-control"
                                                value="{{ old('instagram', $setting->instagram ?? '') }}"
                                                placeholder="https://instagram.com/username">
                                            @error('instagram')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Facebook -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" name="facebook" class="form-control"
                                                value="{{ old('facebook', $setting->facebook ?? '') }}"
                                                placeholder="https://facebook.com/username">
                                            @error('facebook')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- YouTube -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">YouTube</label>
                                            <input type="text" name="youtube" class="form-control"
                                                value="{{ old('youtube', $setting->youtube ?? '') }}"
                                                placeholder="https://youtube.com/channel/xxx">
                                            @error('youtube')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Google Maps -->
                                    {{-- <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">URL Google Maps</label>
                                            <input type="text" name="google_maps_url" class="form-control"
                                                value="{{ old('google_maps_url', $setting->google_maps_url ?? '') }}"
                                                placeholder="Tempelkan link Google Maps lokasi">
                                            @error('google_maps_url')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <!-- Register URL -->
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">URL Pendaftaran</label>
                                            <input type="text" name="register_url" class="form-control"
                                                value="{{ old('register_url', $setting->register_url ?? '') }}"
                                                placeholder="Contoh: https://domain.com/daftar">
                                            @error('register_url')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Tombol -->
                                    <div class="col-lg-12 mt-3">
                                        <button type="submit"
                                            class="btn btn-primary">{{ isset($setting) ? 'Perbarui' : 'Simpan' }}</button>
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
