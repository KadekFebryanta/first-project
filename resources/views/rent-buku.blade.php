@extends('layouts.main_layout')

@section('title', 'Rental Buku')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet"/>

    <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
        <h1>Formulir Rental Buku</h1>

        <div class="mt-4">
            @if (session('message'))
                <div class="alert {{ session('alert-class') }}">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <form action="rent-buku" method="post">
            @csrf
            <div class="mb-3">
                <label for="user" class="form-label">User</label>
                <select name="user_id" id="user" class="form-control inputbox">
                    <option value="">Pilih User</option>
                    @foreach ($users as $item )
                        <option value="{{ $item->id }}">{{ $item->username }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="buku" class="form-label">Buku</label>
                <select name="buku_id" id="buku" class="form-control inputbox">
                    <option value="">Pilih Buku</option>
                    @foreach ($buku as $item)
                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
        </form>
    </div>


<script src="https://code.jquery.com/jquery-4.0.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.inputbox').select2();
    });
</script>
@endsection