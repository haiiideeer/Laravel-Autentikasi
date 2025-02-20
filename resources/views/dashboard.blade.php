@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-3xl font-bold">Selamat Datang, {{ auth()->user()->name }}!</h1>
    <p class="mt-4">Ini adalah halaman Dashboard Anda.</p>
@endsection
