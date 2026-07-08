<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku Febry | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="main d-flex justify-content-between flex-column">
        <nav class="navbar navbar-dark navbar-expand-lg bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Rental Buku</a>
                    <button class="navbar-toggler" type="button" 
                        data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" 
                        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
            </div>
        </nav>

        <div class="body-content h-100">
            <div class="row g-0 h-100">
                <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo02">
                        @if (Auth::user()->role_id == 1)
                        <a href="/dashboard" @if (request()->route()->uri == 'dashboard') class="active" 
                            @endif>Dashboard</a>
                        <a href="/buku" @if (request()->route()->uri == 'buku' 
                            || request()->route()->uri == 'add-buku' 
                            || request()->route()->uri == 'edit-buku/{slug}'
                            || request()->route()->uri == 'delete-buku/{slug}'
                            || request()->route()->uri == 'delete-view-buku') class="active"
                            @endif>Buku</a>
                        <a href="/kategori" @if (request()->route()->uri == 'kategori' 
                            || request()->route()->uri == 'tambah-kategori' 
                            || request()->route()->uri == 'edit-kategori/{slug}'
                            || request()->route()->uri == 'delete-kategori/{slug}' 
                            || request()->route()->uri == 'delete-view-kategori') class="active" 
                            @endif>Kategori</a>
                        <a href="/user" @if (request()->route()->uri == 'user') class="active" 
                            @endif>User</a>
                        <a href="/riwayat" @if (request()->route()->uri == 'riwayat') class="active" 
                            @endif>Riwayat</a>
                        <a href="/logout">Logout</a>
                        @else
                        <a href="/profile" @if (request()->route()->uri == 'profile') class="active" 
                            @endif>Profil</a>
                        <a href="/logout">Logout</a>
                        @endif
                </div>
                <div class="content p-5 col-lg-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" 
    crossorigin="anonymous"></script>
</body>
</html>