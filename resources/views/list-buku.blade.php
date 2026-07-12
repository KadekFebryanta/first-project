@extends('layouts.main_layout')

@section('title', 'List Buku')

@section('content')

    <form action="#" method="get">
        <div class="row">
            <div class="col-12 col-sm-6">
                <select name="kategori" id="kategori" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-sm-6">
                <div class="input-group mb-3">
                    <input type="text" name="title" class="form-control" placeholder="cari title buku">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </div>
    </form>
    <div class="my-5">
        <div class="row">
            @foreach ($buku as $item )
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card h-100">
                        <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/cover-not-found.png') }}" 
                            class="card-img-top" style="height: 300px; object-fit: contain; background-color: #fff;" draggable="false">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->kode_buku }}</h5>
                            <p class="card-text">{{ $item->title }}</p>
                            <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger'}}">
                                {{ $item->status }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
    {{-- asset('images/cover-not-found.png') --}}
    {{-- asset('storage/cover/'.$item->cover) --}}