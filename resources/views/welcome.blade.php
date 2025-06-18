<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SkillHub</title>

  {{-- Jika pakai Laravel Breeze + Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>

    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

    /* Header */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      border-bottom: 1px solid #eee;
    }

    header .left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    header .left img {
      height: 30px;
    }

    header .right {
      display: flex;
      align-items: center;
      gap: 20px;
      font-size: 14px;
    }

    header .right a {
      text-decoration: none;
      color: #333;
      font-weight: 500;
    }

    header .right .login {
      border: 1px solid #333;
      padding: 5px 12px;
      border-radius: 6px;
    }

    /* Hero Section */
    .container {
      max-width: 1300px;
      margin: auto;
      padding: 50px 20px;
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      position: relative;
    }

    .text {
      flex: 1 1 40%;
      min-width: 300px;
      z-index: 2;
    }

    .text h1 {
      font-size: 3rem;
      font-weight: 600;
      margin-bottom: 30px;
      line-height: 1.2;
      margin-top: 20px;
    }

    .text p {
      font-size: 0.9rem;
      line-height: 1.6;
      margin-bottom: 25px;
      color: #333;
    }

    .buttons {
      display: flex;
      gap: 15px;
    }

    .buttons a {
      text-decoration: none;
      padding: 12px 24px;
      border-radius: 25px;
      font-weight: 600;
      transition: 0.3s;
    }

    .buttons .start {
      background: #1d3b98;
      color: white;
    }

    .buttons .explore {
      border: 2px solid #1d3b98;
      color: #1d3b98;
    }

    .image-grid {
        flex: 1 1 45%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, auto);
        gap: 30px;
        position: relative;
        z-index: 2;
        transform: translateX(80px); /* 👈 geser ke kanan */
    }

    .image-grid img {
        width: 100%;
        border-radius: 20px;
        object-fit: cover;
        max-height: 260px; /* 👈 batas tinggi gambar */
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .image-grid .big {
        grid-row: span 2;
        height: 100%;
        max-height: 700px; /* 👈 gambar besar lebih ramping */
    }

    /* Dekorasi Latar */
    .bg-pattern-line {
      position: absolute;
      top: 0;
      right: -100px;
      width: 800px;
      height: 800px;
      background: url('https://www.cisco.com/etc/designs/cdc/nextgen/clientlibs_base/img/line-pattern.svg') no-repeat center;
      background-size: cover;
      opacity: 0.05;
      z-index: 0;
    }

    .bg-pattern-dot {
      position: absolute;
      left: -40px;
      top: 50%;
      transform: translateY(-50%);
      width: 120px;
      height: 120px;
      background: url('https://www.svgrepo.com/show/520084/dots-pattern.svg') no-repeat center;
      background-size: contain;
      opacity: 0.1;
      z-index: 0;
    }

    /* Footer Statistics */
    .stats {
      background: #f9f9f9;
      padding: 40px 20px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      text-align: center;
    }

    .stats div {
      flex: 1 1 180px;
      margin: 20px;
    }

    .stats h2 {
      font-size: 2rem;
      color: #1d3b98;
      margin-bottom: 10px;
    }

    .stats p {
      font-size: 1rem;
      color: #333;
      margin: 0;
    }

    @media (max-width: 900px) {
        .image-grid {
        transform: none;
        }

        .image-grid img {
        max-height: 220px;
        }

        .image-grid .big {
        max-height: 700px;
        }
    }
  </style>
</head>
<body>

<!-- Header -->
<header>
  <div class="left">
    <img src="https://upload.wikimedia.org/wikipedia/sco/thumb/c/cc/Chelsea_FC.svg/2048px-Chelsea_FC.svg.png" alt="Logo">
    <strong>SkillHub</strong>
  </div>
  <div class="right">
    <a href="{{ route('login') }}" class="login">Login</a>
  </div>
</header>

<!-- Hero Section -->
<div class="container">
  <div class="bg-pattern-line"></div>
  <div class="bg-pattern-dot"></div>

  <!-- Teks -->
  <div class="text">
    <h1>Catat Skillmu,<br>Bangun Profil Impianmu.</h1>
    <p>
      SkillHub membantu mahasiswa mencatat skill (hard/soft), mengunggah sertifikat, dan membuat profil semi-LinkedIn untuk masa depan kariermu.
    </p>
    <div class="buttons">
      <a href="{{ route('register') }}" class="start">Start Make It</a>
    </div>
  </div>

  <!-- Gambar -->
  <div class="image-grid">
    <img src="{{ asset('images/image1.jpg') }}" class="big" alt="Mahasiswa belajar">
    <img src="{{ asset('images/image2.jpg') }}" alt="Belajar bersama">
    <img src="{{ asset('images/image3.jpg') }}" alt="Orang tua mendampingi anak">
  </div>
</div>

<!-- Statistics -->
<div class="stats">
  <div>
    <h2>1K++</h2>
    <p>Mahasiswa aktif</p>
  </div>
  <div>
    <h2>900++</h2>
    <p>Sertifikat diunggah</p>
  </div>
  <div>
    <h2>500++</h2>
    <p>Skill dicatat</p>
  </div>
  <div>
    <h2>13</h2>
    <p>Universitas asal Pengguna</p>
  </div>
  <div>
    <h2>96%</h2>
    <p>Pengguna merasa terbantu</p>
  </div>
</div>

</body>
</html>
