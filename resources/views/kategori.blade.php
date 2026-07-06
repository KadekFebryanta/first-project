@extends('layouts.main_layout')

@section('title', 'Kategori')

@section('content')
    <h1>Kategori</h1>
    <div class="mt-4 d-flex justify-content-end">
        <a href="delete-view-kategori" class="btn btn-secondary me-2">Data Terhapus</a>
        <a href="tambah-kategori" class="btn btn-primary">Tambah Kategori</a>
    </div>
    

    <div class="mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-4">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $kategori as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="edit-kategori/{{ $item->slug }}">edit</a>
                            <a href="delete-kategori/{{ $item->slug }}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    