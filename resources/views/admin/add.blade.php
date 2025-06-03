<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tambah Tempat Belajar - Mendaki Gunung</title>

  <!-- External Resources -->
  <link href="https://fonts.googleapis.com/css2?family=Diastema&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css"/>

  <style>
    /* Base Styles */
    body {
      font-family: 'Diastema', serif;
      margin: 0;
      min-height: 100vh;
      background: linear-gradient(to top, #2e7d32 0%, #a5d6a7 60%, #81d4fa 100%);
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
      border-radius: 1rem;
      box-shadow: 0 8px 40px rgba(44, 62, 80, 0.2);
      background: #e6f2d9;
      position: relative;
      overflow: hidden;
      border: none;
    }

    /* Forest Ornament for Cards */
    .card:before {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 40px;
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
      font-size: 2.5rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 1rem;
      color: #2c3e50;
      font-family: 'Diastema', serif;
      user-select: none;
      animation: bounceInDown 2s ease forwards;
      text-shadow: 0 0 8px #a4c639;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      position: relative;
    }
    
    .header-text:before {
      content: '';
      position: absolute;
      top: -15px;
      left: 0;
      right: 0;
      height: 30px;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" fill="%232e7d32"></path><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" fill="%232e7d32"></path><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="%232e7d32"></path></svg>');
      background-size: cover;
      background-repeat: no-repeat;
      transform: rotate(180deg);
    }
    
    .header-text img {
      width: 50px;
      height: 50px;
      animation: swing 3s ease-in-out infinite;
    }

    /* Calendar */
    .calendar {
      font-weight: bold;
      font-family: 'Diastema', serif;
      color: #2c3e50;
      text-align: center;
      margin: 20px 0;
      font-size: 1.2rem;
      text-shadow: 0 0 4px #a4c639;
    }

    /* Digital Clock */
    .digital-clock {
      font-size: 1.4rem;
      font-weight: 600;
      font-family: 'Courier New', Courier, monospace;
      background-color: #d1e8a4;
      padding: 10px;
      border-radius: 0.5rem;
      margin-bottom: 12px;
      box-shadow: 0 0 10px #a4c639;
      color: #2c3e50;
      border: 2px solid #81c784;
    }

    /* Form Elements */
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

    /* Input Groups */
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

    /* Combined Input Fields */
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
      border-radius: 0.5rem;
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

    /* Clock Canvas */
    #clockCanvas {
      display: none;
      background: #e6f2d9;
      border-radius: 50%;
      box-shadow: 0 0 15px #81c784;
      border: 3px solid #81c784;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .digital-clock {
        font-size: 1.1rem;
      }
      
      .header-text {
        font-size: 1.8rem;
      }

      .header-text:before {
        height: 20px;
      }

      .card:before {
        height: 30px;
      }
    }
  </style>
</head>
<body>
  <!-- Animation Elements -->
  <div class="cloud"></div>
  <div class="cloud"></div>
  <div class="bird"></div>
  <div class="bird" style="animation-delay: 10s;"></div>

  <div class="container py-5" style="position: relative; z-index: 10;">
    <div class="row">
      <!-- Time Sidebar -->
      <div class="col-md-4 mb-4">
        <div class="card p-4 shadow animate__animated animate__fadeInLeft">
          <h3 class="mb-3" style="color:#2c3e50; font-family: 'Diastema', serif;">Waktu Indonesia</h3>
          <div id="timeWIB" class="digital-clock mb-2"></div>
          <div id="timeWITA" class="digital-clock mb-2"></div>
          <div id="timeWIT" class="digital-clock mb-2"></div>
          <button id="toggleVisualTime" class="btn btn-outline-success w-100 mb-3">Tampilkan Waktu Visual</button>
          
          <canvas id="clockCanvas" width="250" height="250"></canvas>
        </div>
      </div>

      <!-- Booking Form -->
      <div class="col-md-8">
        <div class="header-text animate__animated animate__bounceInDown">
          <img src="https://cdn-icons-png.flaticon.com/512/421/421262.png" alt="Mountain Icon" />
          Form Pemesanan
        </div>
        <div class="card p-4 shadow animate__animated animate__fadeInRight">
          <div class="form-container">
            <form method="POST" action="/add" novalidate>
              @csrf
              <div class="mb-4">
                <label for="name" class="form-label">Nama Tempat</label>
                <input type="text" id="name" name="name" placeholder="Nama tempat belajar" class="form-control" required>
              </div>
              <div class="mb-4">
                <label for="location" class="form-label">Lokasi</label>
                <input type="text" id="location" name="location" placeholder="Lokasi tempat" class="form-control" required>
              </div>
              <div class="mb-4">
                <label for="facilities" class="form-label">Fasilitas</label>
                <textarea id="facilities" name="facilities" placeholder="Fasilitas yang tersedia" class="form-control" rows="3" required></textarea>
              </div>
              <div class="mb-4">
                <label for="capacity" class="form-label">Kapasitas</label>
                <div class="combined-input">
                  <input type="number" id="capacity" name="capacity" placeholder="Jumlah" class="form-control" min="1" required>
                  <span class="input-group-text">/ Orang</span>
                </div>
              </div>
              <div class="mb-4">
                <label for="price" class="form-label">Harga</label>
                <div class="combined-input">
                  <span class="input-group-text">Rp</span>
                  <input type="number" step="0.01" id="price" name="price" placeholder="Harga sewa" class="form-control" min="0" required>
                  <span class="input-group-text">/ Jam</span>
                </div>
              </div>
              <div class="row mb-4">
                <div class="col-md-6">
                  <label for="open_time" class="form-label">Jam Buka</label>
                  <input type="text" id="open_time" name="open_time" class="form-control flatpickr-time" placeholder="Pilih jam buka" required>
                </div>
                <div class="col-md-6">
                  <label for="close_time" class="form-label">Jam Tutup</label>
                  <input type="text" id="close_time" name="close_time" class="form-control flatpickr-time" placeholder="Pilih jam tutup" required>
                </div>
              </div>
              <button type="submit" class="btn btn-primary w-100 py-3 mt-3">Simpan Tempat Belajar</button>
            </form>
            <div class="calendar mt-4" id="calendarDisplay"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script>
    // Initialize time picker
    flatpickr(".flatpickr-time", {
      enableTime: true,
      noCalendar: true,
      dateFormat: "H:i",
      time_24hr: true,
      animate: true,
    });

    // Calendar display
    function updateCalendar() {
      const now = new Date();
      const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('calendarDisplay').textContent = now.toLocaleDateString('id-ID', options);
    }
    updateCalendar();

    // Digital clocks for Indonesian time zones
    function updateDigitalClocks() {
      const now = new Date();
      const timeZones = [
        { id: 'timeWIB', offset: 7, label: 'WIB' },
        { id: 'timeWITA', offset: 8, label: 'WITA' },
        { id: 'timeWIT', offset: 9, label: 'WIT' },
      ];

      timeZones.forEach(tz => {
        const local = new Date(now.getTime() + (tz.offset * 60 + now.getTimezoneOffset()) * 60000);
        const timeString = local.toLocaleTimeString('id-ID', { hour12: false });
        document.getElementById(tz.id).textContent = `${tz.label}: ${timeString}`;
      });
    }
    setInterval(updateDigitalClocks, 1000);
    updateDigitalClocks();

    // Toggle between digital and analog clock
    const toggleBtn = document.getElementById('toggleVisualTime');
    const canvas = document.getElementById('clockCanvas');
    let showVisual = false;
    
    toggleBtn.addEventListener('click', () => {
      showVisual = !showVisual;
      canvas.style.display = showVisual ? 'block' : 'none';
      toggleBtn.textContent = showVisual ? 'Tampilkan Waktu Digital' : 'Tampilkan Waktu Visual';
    });

    // Analog clock drawing
    const ctx = canvas.getContext('2d');
    const radius = canvas.height / 2;
    ctx.translate(radius, radius);

    function drawClock() {
      drawFace();
      drawNumbers();
      drawTime();
    }

    function drawFace() {
      ctx.beginPath();
      ctx.arc(0, 0, radius, 0, 2 * Math.PI);
      ctx.fillStyle = '#d1e8a4';
      ctx.fill();

      const grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
      grad.addColorStop(0, '#81c784');
      grad.addColorStop(0.5, '#a4c639');
      grad.addColorStop(1, '#81c784');
      ctx.strokeStyle = grad;
      ctx.lineWidth = radius * 0.1;
      ctx.stroke();

      ctx.beginPath();
      ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
      ctx.fillStyle = '#2c3e50';
      ctx.fill();
    }

    function drawNumbers() {
      ctx.font = radius * 0.15 + "px Diastema, serif";
      ctx.textBaseline = "middle";
      ctx.textAlign = "center";
      
      for (let num = 1; num <= 12; num++) {
        const angle = num * Math.PI / 6;
        ctx.rotate(angle);
        ctx.translate(0, -radius * 0.85);
        ctx.rotate(-angle);
        ctx.fillText(num.toString(), 0, 0);
        ctx.rotate(angle);
        ctx.translate(0, radius * 0.85);
        ctx.rotate(-angle);
      }
    }

    function drawTime() {
      const now = new Date();
      const utc = now.getTime() + now.getTimezoneOffset() * 60000;
      const wib = new Date(utc + 7 * 3600000);

      const hour = wib.getHours() % 12;
      const minute = wib.getMinutes();
      const second = wib.getSeconds();

      // Hour hand
      const hourAngle = (hour * Math.PI / 6) + (minute * Math.PI / 360) + (second * Math.PI / 21600);
      drawHand(hourAngle, radius * 0.5, radius * 0.07);

      // Minute hand
      const minuteAngle = (minute * Math.PI / 30) + (second * Math.PI / 1800);
      drawHand(minuteAngle, radius * 0.8, radius * 0.07);

      // Second hand
      const secondAngle = second * Math.PI / 30;
      drawHand(secondAngle, radius * 0.9, radius * 0.02, '#a4c639');
    }

    function drawHand(angle, length, width, color = '#2c3e50') {
      ctx.beginPath();
      ctx.lineWidth = width;
      ctx.lineCap = "round";
      ctx.strokeStyle = color;
      ctx.moveTo(0, 0);
      ctx.rotate(angle);
      ctx.lineTo(0, -length);
      ctx.stroke();
      ctx.rotate(-angle);
    }

    // Animation loop
    function tick() {
      if(showVisual) {
        ctx.clearRect(-radius, -radius, canvas.width, canvas.height);
        drawClock();
      }
      requestAnimationFrame(tick);
    }
    tick();
  </script>
</body>
</html>