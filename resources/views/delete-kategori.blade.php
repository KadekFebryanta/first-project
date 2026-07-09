@extends('layouts.main_layout')

@section('title', 'Delete Kategori')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus kategori {{ $kategori->name }} ?</h2>
    <div class="mt-4">
        <a href="/destroy-kategori/{{ $kategori->slug }}" class="btn btn-success me-4">Yakin</a>
        <a href="/kategori" class="btn btn-danger">Cancel</a>
    </div>
@endsection