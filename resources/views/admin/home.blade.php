<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Tempat Belajar</title>
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
            padding: 30px; /* Adjusted padding */
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

        /* Card Styling for main content */
        .admin-card {
    border-radius: 1.5rem;
    box-shadow: 0 12px 40px rgba(44, 62, 80, 0.25);
    background: #e6f2d9;
    position: relative;
    overflow: hidden;
    border: none;
    padding: 30px; /* Original padding */
    padding-bottom: 80px; /* **ADDED/MODIFIED: Increased padding-bottom to clear the ornament** */
    margin-top: 30px;
    z-index: 2;
}

/* Forest Ornament for Cards */
.admin-card:before {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px; /* This height is fine */
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232e7d32"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232e7d32"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232e7d32"></path></svg>');
    background-size: cover;
    background-repeat: no-repeat;
    z-index: 1;
}

        /* Header */
        .header-text {
            font-size: 3rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 2rem;
            color: #2c3e50;
            font-family: 'Diastema', serif;
            user-select: none;
            animation: bounceInDown 2s ease forwards;
            text-shadow: 0 0 10px #a4c639;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.8rem;
            position: relative;
            padding-top: 50px;
        }
        
        .header-text:before {
            content: '';
            position: absolute;
            top: -20px;
            left: 0;
            right: 0;
            height: 40px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232e7d32"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232e7d32"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232e7d32"></path></svg>');
            background-size: cover;
            background-repeat: no-repeat;
            transform: rotate(180deg);
        }
        
        .header-text img {
            width: 60px;
            height: 60px;
            animation: swing 3s ease-in-out infinite;
        }

        /* Buttons */
        .btn-success {
            background-color: #4CAF50; /* A slightly warmer green for success */
            border-color: #4CAF50;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(76,175,80,0.6);
            padding: 10px 20px;
            border-radius: 0.75rem;
            position: relative;
            overflow: hidden;
            display: inline-flex; /* Align icon and text */
            align-items: center;
            gap: 8px;
        }
        
        .btn-success:hover {
            background-color: #388E3C; /* Darker on hover */
            border-color: #388E3C;
            box-shadow: 0 8px 16px rgba(56,142,60,0.9);
            transform: translateY(-2px);
        }

        .btn-success:active {
            transform: translateY(0);
        }

        .btn-success:after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            bottom: -50%;
            left: -50%;
            background: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 50%);
            transform: rotateZ(60deg) translate(-5em, 7.5em);
        }

        .btn-success:hover:after {
            animation: sheen 1s forwards;
        }

        .btn-primary {
            background-color: #81c784;
            border-color: #81c784;
            font-weight: 700;
            transition: all 0.3s ease;
            box-shadow: 0 6px 12px rgba(129,199,132,0.6);
            padding: 10px 20px;
            border-radius: 0.75rem;
            position: relative;
            overflow: hidden;
            display: inline-flex; /* Align icon and text */
            align-items: center;
            gap: 8px;
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

        .btn-danger {
            background-color: #ef5350; /* A more vibrant red for danger */
            border-color: #ef5350;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(239,83,80,0.4);
            padding: 6px 15px;
            border-radius: 0.5rem;
        }

        .btn-danger:hover {
            background-color: #d32f2f; /* Darker on hover */
            border-color: #d32f2f;
            box-shadow: 0 6px 12px rgba(211,47,47,0.6);
            transform: translateY(-1px);
        }
        /* List Group Styling */
        .list-group {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(44, 62, 80, 0.1);
        }

        .list-group-item {
            padding: 15px 20px; /* Increased padding */
            font-size: 1.1rem; /* Slightly larger font size */
            background-color: #f7fcf4; /* Light background for items */
            border: 1px solid #c8e6c9; /* Lighter border */
            margin-bottom: 8px; /* Space between items */
            border-radius: 0.75rem; /* Rounded corners for each item */
        }

        .list-group-item:last-child {
            margin-bottom: 0;
        }

        .list-group-item:hover {
            background-color: #e0f2f1; /* Subtle hover effect */
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(44, 62, 80, 0.08);
            transition: all 0.2s ease-in-out;
        }

        .d-flex.justify-content-between.mb-3 {
            margin-top: 20px; /* Space from header */
            padding: 0 15px; /* Added horizontal padding to align with card */
        }
    </style>
</head>

<body>
    <div class="cloud"></div>
    <div class="cloud"></div>
    <div class="bird"></div>
    <div class="bird"></div>

    <div class="header-text">
        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067469.png" alt="admin icon" /> Kelola Tempat Belajar
    </div>

    <div class="container admin-card">
        <div class="d-flex justify-content-between mb-4"> <a href="/add" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z"/>
                </svg>
                Tambah Tempat
            </a>
            <a href="/bookings" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
                    <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-12a2 2 0 0 1 2-2m0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>
                </svg>
                Lihat Data Pemesan
            </a>
        </div>

        <ul class="list-group">
            @foreach ($places ?? [] as $place)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong>{{ $place['name'] }}</strong> - {{ $place['location'] }}</span>
                    <form method="POST" action="/delete/{{ $place['id'] }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7.5a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>