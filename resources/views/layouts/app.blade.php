<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BPS Provinsi Bengkulu')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { background-color: #f4f7fa; font-family: 'Plus Jakarta Sans', Arial, sans-serif; padding-top: 60px; }
        /* Header ala DKI */
        .bps-header { background-color: #0a2e52; position: fixed; top: 0; left: 0; width: 100%; height: 60px; z-index: 1030; display: flex; align-items: center; }
        .bps-header img { width: 45px; height: 45px; margin-left: 12%; }
        .bps-header .judulweb { color: #fff; font-weight: 800; letter-spacing: .5px; margin-left: 12px; font-size: 15px; }
        .bps-header nav { margin-left: auto; margin-right: 8%; display: flex; height: 60px; }
        .bps-header nav a { display: flex; align-items: center; color: rgba(255,255,255,.78); font-weight: 600; font-size: 13px; padding: 0 18px; text-decoration: none; }
        .bps-header nav a:hover { background-color: rgba(255,255,255,.08); color: #fff; }
        .bps-header nav a.active { color: #ffd54f; box-shadow: inset 0 -3px 0 #ffd54f; }
        .flash-sukses { max-width: 500px; margin: 20px auto; padding: 12px 18px; background: #f0fff4; color: #276749; border: 1px solid #c6f6d5; border-radius: 8px; font-size: 14px; }
        main { min-height: calc(100vh - 160px); }
        /* Footer minimalis biru selaras header */
        .bps-footer { background: #0a2e52; margin-top: 60px; }
        .bps-footer-inner { width: 90%; max-width: 1300px; margin: 0 auto; padding: 14px 0; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 6px; font-size: 12.5px; color: rgba(255,255,255,.65); }
        .bps-footer-inner strong { color: #fff; font-weight: 700; }
        .bps-footer-inner .sep { color: rgba(255,255,255,.25); margin: 0 8px; }
    </style>
    @stack('styles')
</head>
<body>
<header class="bps-header">
    <img src="{{ asset('images/logobps.png') }}" alt="Logo BPS">
    <div class="judulweb">BPS PROVINSI BENGKULU</div>
    <nav>
        <a href="{{ route('publikasi.index') }}" class="{{ request()->routeIs('publikasi.index') ? 'active' : '' }}">Daftar Publikasi</a>
        <a href="{{ route('publikasi.create') }}" class="{{ request()->routeIs('publikasi.create') ? 'active' : '' }}">Tambah Publikasi</a>
    </nav>
</header>

<main>
    @if(session('sukses'))
        <p class="flash-sukses">{{ session('sukses') }}</p>
    @endif
    @yield('content')
</main>

<footer class="bps-footer">
    <div class="bps-footer-inner" style="justify-content: center;">
        <span><strong>BPS Provinsi Bengkulu</strong> &copy; 2026</span>
    </div>
</footer>
@stack('scripts')
</body>
</html>
