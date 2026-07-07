@extends('layouts.main_layout')

@section('title', 'Tambah Buku')

@section('content')
    <h1>Tambah Buku Baru</h1>
    <div class="mt-5 w-25">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="add-buku" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Buku</label>
                <input type="text" name="kode_buku" id="kode" class="form-control" placeholder="Kode Buku" value="{{ old('kode_buku') }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title Buku" value="{{ old('title') }}">
            </div>
            <div>
                <label for="cover" class="form-label">Cover</label>
                <input type="file" name="cover" class="form-control">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Tambahkan</button>
                <a href="/buku" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection