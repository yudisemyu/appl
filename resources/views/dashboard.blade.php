<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard SkillHub</title>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

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

    .dashboard {
      display: flex;
      flex-wrap: wrap;
      padding: 40px 30px;
      gap: 30px;
      justify-content: center;
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background: white;
      border-radius: 16px;
      box-shadow: 0 8px 20px rgba(0,0,0,0.08);
      padding: 25px;
      flex: 1 1 300px;
      max-width: 380px;
    }

    .card h2 {
      font-size: 1.2rem;
      margin-bottom: 15px;
      color: #1d3b98;
      border-bottom: 1px solid #eee;
      padding-bottom: 8px;
    }

    .skills-list, .certificates-list {
      list-style: none;
      padding-left: 0;
      margin: 0;
    }

    .skills-list li {
      padding: 8px 12px;
      margin-bottom: 6px;
      background: #eef3fc;
      border-left: 4px solid #1d3b98;
      border-radius: 8px;
      font-size: 0.95rem;
    }

    .certificates-list img {
      width: 100%;
      border-radius: 12px;
      margin-bottom: 10px;
      border: 1px solid #ddd;
    }

    .profile {
      text-align: center;
    }

    .profile img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 10px;
      border: 3px solid #1d3b98;
    }

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 12px;
      background: #1d3b98;
      color: white;
      border-radius: 25px;
      text-decoration: none;
      font-size: 0.9rem;
      transition: background 0.3s;
    }

    .btn:hover {
      background: #16337d;
    }

    footer {
      background: #f9f9f9;
      text-align: center;
      padding: 30px 20px;
      font-size: 0.9rem;
      color: #555;
      border-top: 1px solid #e0e0e0;
      margin-top: 60px;
    }

    @media (max-width: 900px) {
      .dashboard {
        flex-direction: column;
        padding: 20px;
      }

      .card {
        max-width: 100%;
      }
    }
  </style>
</head>
<body>

<header>
  <div class="left">
    <img src="https://upload.wikimedia.org/wikipedia/sco/thumb/c/cc/Chelsea_FC.svg/2048px-Chelsea_FC.svg.png" alt="Logo">
    <strong>SkillHub</strong>
  </div>
  <div class="right">
    <a href="#">Logout</a>
  </div>
</header>

<div class="dashboard">
  <div class="card profile">
    <img src="https://i.pravatar.cc/100?u=skillhubuser" alt="Foto Profil">
    <h2>Putra Andika</h2>
    <p>Teknik Informatika<br>Universitas Teknologi</p>
    <a href="#" class="btn">Edit Profil</a>
  </div>

  <div class="card">
    <h2>Skill Saya</h2>
    <ul class="skills-list">
      <li>Python (Hard Skill)</li>
      <li>Public Speaking (Soft Skill)</li>
      <li>UI/UX Design (Hard Skill)</li>
    </ul>
    <a href="#" class="btn">+ Tambah Skill</a>
  </div>

  <div class="card">
    <h2>Sertifikat Saya</h2>
    <div class="certificates-list">
      <img src="sertifikat1.jpg" alt="Sertifikat 1">
      <img src="sertifikat2.jpg" alt="Sertifikat 2">
    </div>
    <a href="#" class="btn">+ Upload Sertifikat</a>
  </div>
</div>

<footer>
  <p>&copy; 2025 <strong>SkillHub</strong>. All rights reserved.</p>
  <p>Dibuat untuk mahasiswa agar bisa mencatat skill & sertifikat dengan mudah.</p>
</footer>

</body>
</html>
