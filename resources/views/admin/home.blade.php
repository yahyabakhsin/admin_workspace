<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Tempat Belajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet">
    <!-- Icon Bootstrap untuk ikon yang lebih bagus -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Menggunakan style dasar Anda yang sudah bagus dan menambahkan beberapa perbaikan */
        body {
            font-family: 'Diastema', serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(to top, #388e3c 0%, #a5d6a7 60%, #81d4fa 100%);
            overflow-x: hidden;
            position: relative;
            color: #2c3e50;
            padding: 30px;
        }

        .main-content-card {
            border-radius: 1.5rem;
            box-shadow: 0 12px 40px rgba(44, 62, 80, 0.25);
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 30px;
            margin-top: 20px;
            z-index: 2;
        }

        .header-text {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 1rem;
            color: #2c3e50;
            text-shadow: 0 0 10px #a4c639;
        }

        .table {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(44, 62, 80, 0.1);
        }

        .table thead {
            background-color: #2e7d32;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #e6f2d9;
            transform: scale(1.02);
            transition: transform 0.2s ease-in-out;
        }

        .table td, .table th {
            vertical-align: middle;
        }

        .btn-group-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        /* Animasi Latar Belakang (tidak berubah) */
        @keyframes cloudMove { 0% { left: -150px; } 100% { left: 110vw; } }
        .cloud { position: fixed; top: 60px; width: 120px; height: 60px; background: #fff; border-radius: 60px / 40px; box-shadow: 40px 10px 0 0 #fff, 70px 20px 0 0 #fff, 90px 15px 0 0 #fff; opacity: 0.9; animation: cloudMove 60s linear infinite; z-index: 1; }
        .cloud:nth-child(2) { top: 120px; width: 90px; height: 40px; box-shadow: 30px 8px 0 0 #fff, 55px 12px 0 0 #fff, 70px 10px 0 0 #fff; animation-duration: 90s; animation-delay: 15s; }
        @keyframes birdFly { 0% { left: -50px; top: 100px; opacity: 1; } 50% { opacity: 0.6; } 100% { left: 110vw; top: 120px; opacity: 0; } }
        .bird { position: fixed; top: 100px; left: -50px; width: 40px; height: 20px; background: transparent; animation: birdFly 18s linear infinite; z-index: 4; }
        .bird:before, .bird:after { content: ''; position: absolute; width: 20px; height: 4px; background: #2c3e50; border-radius: 50% / 100%; top: 8px; transform-origin: center; }
        .bird:before { left: 0; transform: rotate(30deg); }
        .bird:after { left: 20px; transform: rotate(-30deg); }
    </style>
</head>

<body>
    <!-- Animasi Latar Belakang -->
    <div class="cloud"></div>
    <div class="cloud"></div>
    <div class="bird"></div>
    <div class="bird" style="animation-delay: 10s;"></div>

    <div class="container">
        <div class="header-text">
            <i class="bi bi-shield-lock-fill me-3"></i> Admin Panel
        </div>

        <div class="main-content-card">
            <!-- Pesan Selamat Datang dan Tombol Logout -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </div>

            <!-- Notifikasi Sukses (jika ada) -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Tombol Aksi Utama -->
            <div class="d-flex justify-content-between mb-4">
                <a href="{{ route('admin.add') }}" class="btn btn-success">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Tempat
                </a>
                <a href="{{ route('admin.bookings') }}" class="btn btn-primary">
                    <i class="bi bi-journal-text"></i> Lihat Data Pemesan
                </a>
            </div>

            <!-- Tabel Data Tempat Belajar -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Tempat</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($places as $place)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->location }}</td>
                                <td>
                                    <div class="btn-group-actions">
                                        <a href="{{ route('admin.places.show', $place) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{ route('admin.places.edit', $place) }}" class="btn btn-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <form method="POST" action="{{ route('admin.delete', $place) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tempat ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada data tempat belajar. Silakan tambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Script Bootstrap untuk fungsionalitas seperti notifikasi dismissible -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
