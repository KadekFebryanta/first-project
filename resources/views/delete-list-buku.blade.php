@extends('layouts.main_layout')

@section('title', 'Delete Buku')

@section('content')
    <h1>Delete Buku List</h1>
    <div class="mt-4">
        <a href="/buku" class="btn btn-danger">Back</a>
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
                    <th>Kode_Buku</th>
                    <th>Title</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $deleteView as $item )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_buku }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href="/restore-buku/{{ $item->slug }}">Kembalikan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection