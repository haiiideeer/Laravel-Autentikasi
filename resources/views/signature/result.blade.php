@extends('layouts.app')

@section('content')
<div class="container">
    <h2>QR Code untuk Tanda Tangan Digital</h2>
    <div>{!! $qrCode !!}</div>
    <p>Scan QR Code ini untuk melihat tanda tangan Anda.</p>
    <a href="{{ $signatureUrl }}" target="_blank">Lihat Tanda Tangan</a>
</div>
@endsection
