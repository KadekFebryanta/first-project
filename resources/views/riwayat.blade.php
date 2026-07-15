@extends('layouts.main_layout')

@section('title', 'Riwayat')

@section('content')
    <h1>Riwayat Rental Buku</h1>
    
    <div class="mt-5">
        <x-history-table :rentlog="$riwayat"/>
    </div>
@endsection
    