<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Edit Sertifikat - SkillHub</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

    /* Header - Tetap sama */
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

    header .right .profile-icon {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 30px;
      height: 30px;
      border: 1px solid #ddd;
      border-radius: 50%;
      background-color: #f0f0f0;
      color: #1d3b98;
      font-size: 1.2rem;
      transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    header .right .profile-icon:hover {
      background-color: #e0e7f9;
      border-color: #1d3b98;
      color: #16337d;
    }

    /* Page-specific Header for Edit Certificate */
    .page-header {
        max-width: 900px;
        margin: 30px auto 20px auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .page-header .left-actions {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .page-header .left-actions .back-button {
        font-size: 1.5rem;
        color: #555;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .page-header .left-actions .back-button:hover {
        color: #1d3b98;
    }

    .page-header h1 {
        font-size: 2rem;
        color: #333;
        margin: 0;
    }

    /* Form Container */
    .form-container {
        max-width: 700px;
        margin: 0 auto 60px auto;
        padding: 30px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 1rem;
        color: #444;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .form-group input[type="text"],
    .form-group input[type="date"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        color: #333;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    /* Penyesuaian untuk input type="file" agar terlihat rapi */
    .form-group input[type="file"] {
        padding: 10px 12px;
        cursor: pointer;
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="date"]:focus,
    .form-group input[type="file"]:focus {
        border-color: #1d3b98;
        box-shadow: 0 0 0 3px rgba(29, 59, 152, 0.2);
        outline: none;
    }

    .current-file-info {
        font-size: 0.9rem;
        color: #777;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    /* Tombol umum - Tetap sama */
    .btn {
      display: inline-block;
      padding: 12px 25px;
      margin-top: 0;
      background: #1d3b98;
      color: white;
      border-radius: 30px;
      text-decoration: none;
      font-size: 1rem;
      font-weight: 500;
      transition: background 0.3s ease, transform 0.2s ease;
      border: none;
      cursor: pointer;
    }

    .btn:hover {
      background: #16337d;
      transform: translateY(-2px);
    }

    .btn.secondary {
        background-color: #6c757d;
    }

    .btn.secondary:hover {
        background-color: #5a6268;
    }

    /* Footer - Tetap sama */
    .stats {
      background: #f9f9f9;
      padding: 40px 20px;
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      text-align: center;
      margin-top: 60px;
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

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .page-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
        }
        .page-header .right-actions {
            position: absolute;
            top: 20px;
            right: 20px;
            display: none; /* Hide add button on edit page header if not needed */
        }
        .form-container {
            padding: 20px;
            margin: 0 auto 40px auto;
        }
        .form-actions {
            flex-direction: column;
            align-items: center;
        }
        .btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
      header {
        padding: 10px 15px;
      }
      header .left strong {
        font-size: 1rem;
      }
      header .left img {
        height: 25px;
      }
      header .right .profile-icon {
        width: 28px;
        height: 28px;
        font-size: 1rem;
      }
        .page-header h1 {
            font-size: 1.8rem;
        }
    }
 </style>
</head>
<body>

<header>
 <a href="{{ route('dashboard') }}" style="text-decoration: none; color: inherit;">
  <div class="left">
    <img src="https://upload.wikimedia.org/wikipedia/sco/thumb/c/cc/Chelsea_FC.svg/2048px-Chelsea_FC.svg.png" alt="Logo">
    <strong>SkillHub</strong>
  </div>
 </a>

 <div class="right">
    <a href="{{ route('profile.profile') }}" class="profile-icon" title="Profil Saya">
    <i class="fas fa-user"></i> </a>
 </div>
</header>

<div class="page-header">
    <div class="left-actions">
        <a href="{{ route('sertifikat.index') }}" class="back-button" title="Kembali ke Daftar Sertifikat"><i class="fas fa-arrow-left"></i></a>
        <h1>Edit Sertifikat</h1>
    </div>
</div>

<div class="form-container">
    {{-- Form untuk mengupdate sertifikat. Mengarah ke SertifikatController@update --}}
    <form action="{{ route('sertifikat.update', $sertifikat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="judul">Judul Sertifikat</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $sertifikat->judul) }}" required autofocus>
            @error('judul')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="penyelenggara">Penyelenggara</label>
            <input type="text" id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara', $sertifikat->penyelenggara) }}" required>
            @error('penyelenggara')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Terbit</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $sertifikat->tanggal ? \Carbon\Carbon::parse($sertifikat->tanggal)->format('Y-m-d') : '') }}" required>
            @error('tanggal')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="file_path">File Sertifikat (PDF/Gambar)</label>
            <input type="file" id="file_path" name="file_path" accept=".pdf,image/*">
            @error('file_path')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
            @if ($sertifikat->file_path)
                <p class="current-file-info">File saat ini: <a href="{{ Storage::url($sertifikat->file_path) }}" target="_blank">Lihat File</a></p>
            @else
                <p class="current-file-info">Belum ada file terunggah.</p>
            @endif
        </div>

        <div class="form-actions">
            <a href="{{ route('sertifikat.index') }}" class="btn secondary">Batalkan</a>
            <button type="submit" class="btn">Perbarui Sertifikat</button>
        </div>
    </form>
</div>

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