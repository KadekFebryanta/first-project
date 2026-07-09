@extends('layouts.main_layout')

@section('title', 'Registered User')

@section('content')
    <h1>Halaman User Terdaftar</h1>

    <div class="mt-4 d-flex justify-content">
        <a href="/user" class="btn btn-success me-2">Approved Users</a>
    </div>

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
                    @foreach ($registeredUser as $item)
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
                            <a href="/detail-user/{{ $item->slug }}" class="btn btn-secondary">Detail</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
    