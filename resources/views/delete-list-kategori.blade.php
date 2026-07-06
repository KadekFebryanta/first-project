@extends('layouts.main_layout')

@section('title', 'Delete Kategori')

@section('content')
    <h1>Delete Kategori List</h1>
    <div class="mt-4">
        <a href="/kategori" class="btn btn-danger">Back</a>
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
                @foreach ( $deleteView as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="restore-kategori/{{ $item->slug }}">Kembalikan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
    