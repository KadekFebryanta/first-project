@extends('layouts.main_layout')

@section('title', 'Edit Kategori')

@section('content')
    <h1>Edit Kategori</h1>
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
        <form action="/edit-kategori/{{ $kategori->slug }}" method="post">
            @csrf
            @method('put')
            <div>
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $kategori->name }}" placeholder="Nama Kategori">
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Update</button>
                <a href="/kategori" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
@endsection
    