
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet">
    <style>
        /* Anda bisa menyalin style dari halaman admin.home untuk konsistensi */
        body { font-family: 'Diastema', serif; background-color: #f4f7f6; padding: 30px; }
        .admin-card { background: white; border-radius: 1rem; padding: 30px; box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
        .header-text { font-size: 2.5rem; text-align: center; margin-bottom: 2rem; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header-text">Kelola Data Pemesanan</h1>

        <div class="admin-card">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Tempat</th>
                        <th>Nama Pemesan</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->place->name ?? 'Tempat Dihapus' }}</td>
                            <td>{{ $booking->user_name }}</td>
                            <td>{{ $booking->user_email }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i') }}</td>
                            <td>
                                <span class="badge
                                    @if($booking->status == 'approved') bg-success
                                    @elseif($booking->status == 'rejected') bg-danger
                                    @else bg-warning @endif">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>
                                <!--
                                    ==============================================
                                    PASTIKAN BAGIAN FORM INI SAMA PERSIS
                                    ==============================================
                                -->
                                <form action="{{ route('admin.bookings.status', $booking) }}" method="POST" class="d-flex">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select form-select-sm me-2">
                                        <option value="pending" @if($booking->status == 'pending') selected @endif>Pending</option>
                                        <option value="approved" @if($booking->status == 'approved') selected @endif>Approved</option>
                                        <option value="rejected" @if($booking->status == 'rejected') selected @endif>Rejected</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data pemesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('admin.home') }}" class="btn btn-secondary mt-3">Kembali ke Home</a>
        </div>
    </div>
</body>
</html>
