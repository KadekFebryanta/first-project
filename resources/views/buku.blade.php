@extends('layouts.main_layout')

@section('title', 'Buku')

@section('content')
    <h1>Data Buku</h1>

    <div class="my-5 d-flex justify-content-end">
        <a href="delete-view-buku" class="btn btn-secondary me-2">Data Terhapus</a>
        <a href="add-buku" class="btn btn-primary">Tambah Data</a>
    </div>

    <div class="mt-4">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Title</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            @foreach ($item->kategories as $kategori)
                                {{ $kategori->name }} <br>
                            @endforeach
                        </td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="/edit-buku/{{ $item->slug }}">edit</a>
                            <a href="/delete-buku/{{ $item->slug }}">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    