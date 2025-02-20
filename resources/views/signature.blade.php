@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 rounded-4 text-center" style="max-width: 400px;">
        <h3 class="fw-bold mb-3">Tanda Tangan Digital</h3>

        <!-- QR Code -->
        <div class="p-3 border rounded-3 bg-light">
            {!! $qrCode !!}
        </div>

        <p class="text-muted mt-2">Scan QR Code ini untuk verifikasi tanda tangan digital Anda.</p>

        <hr>

        <!-- Foto Pengguna -->
        <h5 class="mt-3">Foto Anda</h5>
        <img src="{{ asset('images/saya.jpg') }}" alt="Foto Anda" class="img-fluid rounded-circle border border-3 shadow" style="width: 120px; height: auto;">

        <p class="text-muted mt-2">Pastikan foto Anda sudah benar untuk keperluan verifikasi.</p>
    </div>
</div>
@endsection
