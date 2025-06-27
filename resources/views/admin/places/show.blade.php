<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail: {{ $place->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Diastema', serif; background-color: #f4f7f6; padding: 30px; }
        .detail-card { background: white; border-radius: 1rem; padding: 30px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .header-text { font-size: 2.5rem; text-align: center; margin-bottom: 2rem; }
        .detail-item { margin-bottom: 1rem; }
        .detail-item strong { color: #2e7d32; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-text">Detail Tempat Belajar</h1>

        <div class="detail-card">
            <h2 class="mb-4 border-bottom pb-2">{{ $place->name }}</h2>

            <div class="detail-item">
                <strong>Lokasi:</strong>
                <p>{{ $place->location }}</p>
            </div>

            <div class="detail-item">
                <strong>Fasilitas:</strong>
                <p>{{ $place->facilities }}</p>
            </div>

            <div class="detail-item">
                <strong>Kapasitas:</strong>
                <p>{{ $place->capacity }} orang</p>
            </div>

            <div class="detail-item">
                <strong>Harga:</strong>
                <p>Rp {{ number_format($place->price, 0, ',', '.') }} / jam</p>
            </div>

            <div class="detail-item">
                <strong>Jam Operasional:</strong>
                <p>{{ \Carbon\Carbon::parse($place->open_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($place->close_time)->format('H:i') }}</p>
            </div>

            <hr>

            <a href="{{ route('admin.home') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
    </div>
</body>
</html>
