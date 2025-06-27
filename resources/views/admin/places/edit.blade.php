<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Tempat: {{ $place->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Diastema', serif; margin: 0; min-height: 100vh;
            background: linear-gradient(to top, #ffb74d 0%, #ffd180 60%, #ffecb3 100%);
            color: #424242; padding: 30px;
        }
        .admin-card {
            border-radius: 1.5rem; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            background: #fff; padding: 30px; margin-top: 30px;
        }
        .header-text { font-size: 2.5rem; font-weight: 700; text-align: center; margin-bottom: 2rem; color: #424242; }
        .btn-warning { background-color: #ffa726; border-color: #ffa726; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-text">Edit Tempat Belajar</div>

        <div class="admin-card">
            <!-- Form untuk mengedit data -->
            <form method="POST" action="{{ route('admin.places.update', $place) }}">
                @csrf
                @method('PUT') <!-- Metode PUT untuk operasi update -->

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Tempat</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $place->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="location" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $place->location) }}" required>
                </div>

                <div class="mb-3">
                    <label for="facilities" class="form-label">Fasilitas</label>
                    <textarea id="facilities" name="facilities" class="form-control" rows="3" required>{{ old('facilities', $place->facilities) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="capacity" class="form-label">Kapasitas</label>
                    <input type="number" id="capacity" name="capacity" class="form-control" min="1" value="{{ old('capacity', $place->capacity) }}" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" step="0.01" id="price" name="price" class="form-control" min="0" value="{{ old('price', $place->price) }}" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="open_time" class="form-label">Jam Buka</label>
                        <input type="time" id="open_time" name="open_time" class="form-control" value="{{ old('open_time', $place->open_time) }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="close_time" class="form-label">Jam Tutup</label>
                        <input type="time" id="close_time" name="close_time" class="form-control" value="{{ old('close_time', $place->close_time) }}" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning">Update Perubahan</button>
                <a href="{{ route('admin.home') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</body>
</html>
