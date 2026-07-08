@extends('layouts.main_layout')

@section('title', 'Edit Buku')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>

    <h1>Edit Buku</h1>
    <div class="mt-4 w-25">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/edit-buku/{{ $buku->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Buku</label>
                <input type="text" name="kode_buku" id="kode" class="form-control" placeholder="Kode Buku" value="{{ $buku->kode_buku }}">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Title Buku" value="{{ $buku->title }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <label for="currentImage" class="form-label" style="display: block;">Current Image</label>
                @if ($buku->cover != '')
                    <img src="{{ asset('storage/cover/'.$buku->cover) }}" alt="" width="300px">
                @else
                    <img src="{{ asset('images/Cover Not Found.png/') }}" alt="" width="100px">
                @endif
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="kategories[]" id="kategori" class="form-control select-multiple" multiple>
                    @foreach ($kategories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="currentKategori" class="form-label">Current Kategori</label>
                <ul>
                    @foreach ($buku->kategories as $kategori)
                        <li>{{ $kategori->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">Tambahkan</button>
                <a href="/buku" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection