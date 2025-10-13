<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pilih Role - Absensi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;700&display=swap" rel="stylesheet" />
  <style>
    /* Responsive Styles */
    @media (max-width: 768px) {
      h2.main-title {
        font-size: 1.4rem;
        margin-bottom: 20px;
      }

      h2.main-title span {
        font-size: 0.9rem;
      }

      .school-logo-wrapper {
        width: 80px;
        height: 80px;
        margin-bottom: 10px;
      }

      .school-logo-wrapper img {
        width: 45px;
        height: 45px;
      }

      .role-card {
        padding: 20px 15px;
        border-radius: 15px;
        margin-bottom: 20px;
      }

      .role-card img.role-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 10px;
      }

      .role-title {
        font-size: 1.1rem;
      }

      .container-box {
        padding: 15px;
      }
    }

    body {
      background: linear-gradient(270deg, #ff6600, #ff9966, #ff6600, #ff9966);
      background-size: 800% 800%;
      animation: gradientMove 15s ease infinite;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Quicksand', sans-serif;
      position: relative;
      overflow: hidden;
      padding: 20px;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .particle {
      position: absolute;
      background: rgba(255, 255, 255, 0.2);
      border-radius: 50%;
      pointer-events: none;
      animation: float 20s linear infinite;
    }

    @keyframes float {
      0% { transform: translateY(100vh) translateX(0); opacity: 0; }
      10% { opacity: 0.3; }
      50% { opacity: 0.5; }
      100% { transform: translateY(-10vh) translateX(50px); opacity: 0; }
    }

    .container-box {
      text-align: center;
      color: #fff;
      width: 100%;
      max-width: 900px;
      position: relative;
      z-index: 10;
    }

    .school-logo-wrapper {
      width: 120px;
      height: 120px;
      background: #fff;
      border-radius: 50%;
      border: 4px solid #ffd700;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px auto;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
    }

    .school-logo-wrapper:hover {
      transform: rotate(10deg) scale(1.1);
    }

    .school-logo-wrapper img {
      width: 70px;
      height: 70px;
    }

    h2.main-title {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.25);
    }

    h2.main-title span {
      font-size: 1rem;
      margin-top: 10px;
      font-weight: 500;
      color: #fff;
    }

    .role-card {
      background: linear-gradient(145deg, rgba(255, 255, 255, 0.9), rgba(245, 245, 245, 0.9));
      border-radius: 25px;
      padding: 35px 25px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
      cursor: pointer;
      transition: transform 0.5s, box-shadow 0.5s, border 0.3s, backdrop-filter 0.5s;
      position: relative;
      overflow: hidden;
      border: 2px solid rgba(255, 215, 0, 0.5);
      backdrop-filter: blur(4px);
    }

    .role-card:hover {
      transform: translateY(-15px) scale(1.05);
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.35);
      border: 2px solid #ffd700;
    }

    .role-card img.role-icon {
      width: 120px;
      height: 120px;
      margin-bottom: 20px;
      transition: transform 0.5s;
    }

    .role-card:hover img.role-icon {
      transform: scale(1.1) rotate(-5deg);
    }

    .role-title {
      font-size: 1.5rem;
      font-weight: 700;
      color: #333;
      transition: color 0.3s, text-shadow 0.3s;
    }

    .role-card:hover .role-title {
      color: #ff6600;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-box px-3">
      <h2 class="main-title">
        
        SELAMAT DATANG DI ABSENSI SMK FATAHILLAH
        <span>Pilih Role Untuk Login</span>
      </h2>
      <div class="row justify-content-center g-4">
        <div class="col-12 col-md-4">
          <a href="{{ url('/siswa/register') }}" class="text-decoration-none">
            <div class="role-card text-center">
              <img src="https://cdn-icons-png.flaticon.com/512/201/201818.png" class="role-icon" alt="Siswa" />
              <div class="role-title">Siswa</div>
            </div>
          </a>
        </div>
        <div class="col-12 col-md-4">
          <a href="{{ url('/guru/register') }}" class="text-decoration-none">
            <div class="role-card text-center">
              <img src="https://cdn-icons-png.flaticon.com/512/219/219986.png" class="role-icon" alt="Guru" />
              <div class="role-title">Guru</div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Partikel background -->
  <script>
    const colors = ['255,255,255', '255,215,0', '255,255,255'];
    for (let i = 0; i < 40; i++) {
      const particle = document.createElement('div');
      particle.classList.add('particle');
      const size = Math.random() * 6 + 2;
      particle.style.width = size + 'px';
      particle.style.height = size + 'px';
      particle.style.left = Math.random() * window.innerWidth + 'px';
      particle.style.animationDuration = (15 + Math.random() * 10) + 's';
      particle.style.background = `rgba(${colors[Math.floor(Math.random() * colors.length)]},${Math.random() * 0.3 + 0.2})`;
      document.body.appendChild(particle);
    }
  </script>
</body>
</html>
