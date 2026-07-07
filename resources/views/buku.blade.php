@extends('layouts.main_layout')

@section('title', 'Buku')

@section('content')
    <h1>Data Buku</h1>

    <div class="my-5 d-flex justify-content-end">
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
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="#">edit</a>
                            <a href="#">delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    