@extends('layouts.main_layout')

@section('title', 'Delete User')

@section('content')
    <h2>Apakah kamu yakin ingin menghapus user {{ $user->name }} ?</h2>
    <div class="mt-4">
        <a href="/destroy-user/{{ $user->slug }}" class="btn btn-success me-4">Yakin</a>
        <a href="/user" class="btn btn-danger">Cancel</a>
    </div>
@endsection
    