@extends('layouts.main_layout')

@section('title', 'Delete Buku')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus buku {{ $buku->title }} ?</h2>
    <div class="mt-4">
        <a href="/destroy-buku/{{ $buku->slug }}" class="btn btn-success me-4">Yakin</a>
        <a href="/buku" class="btn btn-danger">Cancel</a>
    </div>
@endsection
    