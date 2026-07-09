@extends('layouts.main_layout')

@section('title', 'View Deleted User')

@section('content')
    <h1>Halaman Deleted User</h1>

    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            {{-- Mengisi data untuk tabel --}}
                <tbody>
                    @foreach ($view as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->username }}</td>
                        <td>
                            @if ($item->hp)
                                {{ $item->hp }}
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="/restore-user/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
    