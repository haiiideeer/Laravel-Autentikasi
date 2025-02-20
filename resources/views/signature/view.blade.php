@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tanda Tangan Digital</h2>
    <p>Nama: {{ $signature->name }}</p>
    <img src="{{ $signature->signature_data }}" alt="Tanda Tangan">
</div>
@endsection
