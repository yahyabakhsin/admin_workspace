<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet">
    <style>
        /* Base Styles */
        body {
            font-family: 'Diastema', serif;
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(to top, #388e3c 0%, #a5d6a7 60%, #81d4fa 100%);
            overflow-x: hidden;
            position: relative;
            color: #2c3e50;
        }

        /* Animations */
        @keyframes sway {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(3deg); }
        }

        @keyframes cloudMove {
            0% { left: -150px; }
            100% { left: 110vw; }
        }

        @keyframes birdFly {
            0% { left: -50px; top: 100px; opacity: 1; }
            50% { opacity: 0.6; }
            100% { left: 110vw; top: 120px; opacity: 0; }
        }

        @keyframes swing {
            0%, 100% { transform: rotate(10deg); }
            50% { transform: rotate(-10deg); }
        }

        @keyframes bounceInDown {
            from, 60%, 75%, 90%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
            }
            0% {
                opacity: 0;
                transform: translate3d(0, -3000px, 0);
            }
            60% {
                opacity: 1;
                transform: translate3d(0, 25px, 0);
            }
            75% {
                transform: translate3d(0, -10px, 0);
            }
            90% {
                transform: translate3d(0, 5px, 0);
            }
            to {
                transform: none;
            }
        }

        /* Cloud Animation */
        .cloud {
            position: fixed;
            top: 60px;
            width: 120px;
            height: 60px;
            background: #fff;
            border-radius: 60px / 40px;
            box-shadow: 40px 10px 0 0 #fff, 70px 20px 0 0 #fff, 90px 15px 0 0 #fff;
            opacity: 0.9;
            animation: cloudMove 60s linear infinite;
            z-index: 1;
        }
        
        .cloud:nth-child(2) {
            top: 120px;
            width: 90px;
            height: 40px;
            box-shadow: 30px 8px 0 0 #fff, 55px 12px 0 0 #fff, 70px 10px 0 0 #fff;
            animation-duration: 90s;
            animation-delay: 15s;
        }

        /* Bird Animation */
        .bird {
            position: fixed;
            top: 100px;
            left: -50px;
            width: 40px;
            height: 20px;
            background: transparent;
            animation: birdFly 18s linear infinite;
            z-index: 4;
        }
        
        .bird:before, .bird:after {
            content: '';
            position: absolute;
            width: 20px;
            height: 4px;
            background: #2c3e50;
            border-radius: 50% / 100%;
            top: 8px;
            transform-origin: center;
        }
        
        .bird:before {
            left: 0;
            transform: rotate(30deg);
        }
        
        .bird:after {
            left: 20px;
            transform: rotate(-30deg);
        }
        
        .bird:nth-child(5) {
            top: 160px;
            animation-delay: 8s;
            width: 30px;
            height: 15px;
        }

        /* Card Styling */
        .card {
    border-radius: 1.5rem;
    box-shadow: 0 12px 40px rgba(44, 62, 80, 0.25);
    background: #e6f2d9;
    position: relative;
    overflow: hidden;
    border: none;
    padding: 30px; /* Original padding */
    padding-bottom: 80px; /* **ADDED/MODIFIED: Increased padding-bottom to clear the ornament** */
    margin-top: 30px;
}

/* Forest Ornament for Cards */
.card:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px; /* This height is fine, we just need to account for it in padding */
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232e7d32"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232e7d32"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232e7d32"></path></svg>');
    background-size: cover;
    background-repeat: no-repeat;
    z-index: 1;
}

        /* Form Container */
        .form-container {
            position: relative;
            z-index: 2;
            padding: 20px;
        }

        /* Header */
        .header-text {
            font-size: 3rem; /* Increased font size for better visibility */
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem; /* Increased margin for better separation */
            color: #2c3e50;
            font-family: 'Diastema', serif;
            user-select: none;
            animation: bounceInDown 2s ease forwards;
            text-shadow: 0 0 10px #a4c639; /* Slightly larger shadow */
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem; /* Increased gap */
            position: relative;
            padding-top: 50px; /* Added padding to push content down from top */
        }
        
        .header-text:before {
            content: '';
            position: absolute;
            top: -20px; /* Adjusted position */
            left: 0;
            right: 0;
            height: 40px; /* Increased height */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232e7d32"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232e7d32"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232e7d32"></path></svg>');
            background-size: cover;
            background-repeat: no-repeat;
            transform: rotate(180deg);
        }
        
        .header-text img {
            width: 60px; /* Increased icon size */
            height: 60px;
            animation: swing 3s ease-in-out infinite;
        }

        /* Form Elements (Not directly used in this page, but keeping for consistency) */
        label {
            color: #2c3e50;
            font-weight: 600;
            display: block;
            margin-bottom: 8px;
            position: relative;
            padding-left: 25px;
        }

        label:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 15px;
            height: 15px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%232e7d32"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>');
            background-size: contain;
            background-repeat: no-repeat;
        }

        /* Input Groups (Not directly used in this page, but keeping for consistency) */
        .input-group-text {
            background-color: #81c784;
            color: white;
            font-weight: bold;
            border: none;
        }

        .form-control {
            border: 2px solid #81c784;
            border-radius: 0.5rem;
            padding: 10px 15px;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(129, 199, 132, 0.25);
            border-color: #519657;
        }

        /* Combined Input Fields (Not directly used in this page, but keeping for consistency) */
        .combined-input {
            display: flex;
            align-items: center;
        }

        .combined-input .form-control {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            flex: 1;
        }

        .combined-input .input-group-text {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            padding: 10px 15px;
        }

        /* Buttons */
        .btn-primary {
            background-color: #81c784;
            border-color: #81c784;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(129,199,132,0.6);
            padding: 10px 20px;
            border-radius: 0.75rem; /* Slightly more rounded */
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background-color: #519657;
            border-color: #519657;
            box-shadow: 0 8px 16px rgba(81,150,87,0.9);
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary:after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 50%);
            transform: rotateZ(60deg) translate(-5em, 7.5em);
        }

        .btn-primary:hover:after {
            animation: sheen 1s forwards;
        }

        @keyframes sheen {
            100% {
                transform: rotateZ(60deg) translate(1em, -9em);
            }
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            padding: 8px 18px;
            border-radius: 0.75rem;
            display: inline-flex; /* To align icon if added */
            align-items: center;
            gap: 5px;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            box-shadow: 0 6px 12px rgba(0,0,0,0.3);
            transform: translateY(-1px);
        }
        
        /* Table Styling */
        .table {
            width: 100%; /* Make table full width */
            margin-bottom: 1rem;
            color: #2c3e50;
            border-collapse: separate; /* Allow border-spacing */
            border-spacing: 0 10px; /* Space between rows */
        }

        .table thead th {
            border-bottom: 2px solid #519657;
            padding: 12px 15px;
            text-align: left;
            background-color: #81c784;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .table tbody td {
            padding: 15px; /* Increased padding for cells */
            vertical-align: middle;
            border-top: 1px solid #c8e6c9; /* Lighter border for rows */
            background-color: #f7fcf4; /* Slightly off-white background for rows */
        }

        .table tbody tr:first-child td {
            border-top: none; /* No top border for the first row */
        }

        .table tbody tr:hover {
            background-color: #e0f2f1; /* Subtle hover effect */
        }

        .table-responsive {
            overflow-x: auto;
            margin-top: 20px; /* Added margin for separation */
        }

        /* Select for Status */
        .form-select {
            border: 1px solid #81c784;
            border-radius: 0.5rem;
            padding: 6px 12px;
            background-color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
            cursor: pointer;
        }

        .form-select:focus {
            border-color: #519657;
            box-shadow: 0 0 0 0.25rem rgba(129, 199, 132, 0.25);
        }
    </style>
</head>

<body>
    <div class="cloud"></div>
    <div class="cloud"></div>
    <div class="bird"></div>
    <div class="bird"></div>

    <div class="header-text">
        <img src="https://cdn-icons-png.flaticon.com/512/4273/4273786.png" alt="icon" />
        Daftar Booking
    </div>

    <div class="container">
        <div class="card">
            <a href="/" class="btn btn-secondary mb-3">← Kembali ke tempat</a>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings ?? [] as $booking)
                            <tr>
                                <td>{{ $booking['user_name'] }}</td>
                                <td>{{ $booking['user_email'] }}</td>
                                <td>{{ $booking['place']['name'] ?? '-' }}</td>
                                <td>{{ $booking['date'] }}</td>
                                <td>{{ $booking['start_time'] }} - {{ $booking['end_time'] }}</td>
                                <td>
                                    <form action="/bookings/{{ $booking['id'] }}/status" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                            <option value="pending" {{ $booking['status'] == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ $booking['status'] == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                            <option value="rejected" {{ $booking['status'] == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                        </select>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>