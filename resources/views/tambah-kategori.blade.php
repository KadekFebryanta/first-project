@extends('layouts.main_layout')

@section('title', 'Tambah Kategori')

@section('content')
    <h1>Tambah Kategori Baru</h1>
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
        <form action="tambah-kategori" method="post">
            @csrf
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Kategori">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Tambahkan</button>
                <a href="/kategori" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
    