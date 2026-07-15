@extends('layouts.main_layout')

@section('title', 'Profile')

@section('content')
    <div class="mt-5">
        <h1>halaman profile</h1>
        <x-history-table :rentlog="$riwayat"/>
    </div>

@endsection
    