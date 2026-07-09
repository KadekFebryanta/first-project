@extends('layouts.main_layout')

@section('title', 'Registered User')

@section('content')
    <h1>Halaman Detail User</h1>

    <div class="mt-4 d-flex justify-content-end">
        @if ($user->status == 'inactive')
            <a href="/approve-user/{{ $user->slug }}" class="btn btn-success me-2">Approved Users</a>
        @endif
    </div>

    <div class="my-5 w-25 mt-3">
        <table class="table">
            <div class="mb-3">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" readonly value="{{ $user->username }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" readonly value="{{ $user->hp }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Alamat</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control" style="resize: none;">{{ $user->alamat }}</textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Status</label>
                <input type="text" class="form-control" readonly value="{{ $user->status }}">
            </div>
        </table>
        <div>
            <a href="/user" class="btn btn-danger me-2">Back</a>
        </div>
    </div>
@endsection
    