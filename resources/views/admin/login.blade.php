<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    {{-- CSS tidak berubah, jadi saya singkat --}}
    <style>
        /* ... Seluruh CSS Anda dari sebelumnya ada di sini ... */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap'); body { font-family: 'Poppins', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; } .login-container { background-color: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); width: 100%; max-width: 400px; } .login-container h1 { text-align: center; margin-bottom: 24px; color: #333; } .input-group { margin-bottom: 20px; } .input-group label { display: block; margin-bottom: 8px; color: #555; font-weight: 600; } .input-group input { width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; } .login-button { width: 100%; padding: 12px; background-color: #007bff; border: none; color: white; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: 600; } .login-button:hover { background-color: #0056b3; } .error-message { margin-top: 15px; padding: 10px; background-color: #f8d7da; color: #721c24; border-radius: 4px; text-align:center; }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Panel Login</h1>

        <!-- Menampilkan pesan error validasi jika ada -->
        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
            </div>
        @endif

        <!-- Form standar Laravel -->
        <form method="POST" action="{{ url('/admin/login') }}">
            @csrf <!-- Token perlindungan CSRF, wajib untuk form POST Laravel -->

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>
    </div>
    {{-- Tidak perlu lagi blok <script> --}}
</body>
</html>
