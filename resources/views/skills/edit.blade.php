<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Edit Skill - SkillHub</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

    /* Header - Tidak diubah */
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

    /* Page-specific Header for Edit Skill */
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
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        color: #333;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input[type="text"]:focus,
    .form-group select:focus {
        border-color: #1d3b98;
        box-shadow: 0 0 0 3px rgba(29, 59, 152, 0.2);
        outline: none;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid #eee;
    }

    /* Tombol umum - Sesuai permintaan */
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

    /* Footer - Tidak diubah */
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
        /* No right actions needed in edit page header */
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
    <img src="\images\image4.png" alt="Logo">
  </div>
 </a>

 <div class="right">
    <a href="{{ route('profile.profile') }}" class="profile-icon" title="Profil Saya">
    <i class="fas fa-user"></i> </a>
 </div>
</header>

<div class="page-header">
    <div class="left-actions">
        <a href="{{ route('skills.index') }}" class="back-button" title="Kembali ke Daftar Skill"><i class="fas fa-arrow-left"></i></a>
        <h1>Edit Skill</h1>
    </div>
    </div>

<div class="form-container">
    {{-- Form untuk mengupdate skill. Mengarah ke SkillController@update --}}
    {{-- Perhatikan method PATCH dan parameter $skill->id --}}
    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf {{-- Direktif Blade untuk CSRF protection --}}
        @method('PATCH') {{-- Method spoofing untuk UPDATE request --}}

        <div class="form-group">
            <label for="nama">Nama Skill</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $skill->nama) }}" required autofocus>
            @error('nama')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Hard Skill" {{ (old('kategori', $skill->kategori) == 'Hard Skill') ? 'selected' : '' }}>Hard Skill</option>
                <option value="Soft Skill" {{ (old('kategori', $skill->kategori) == 'Soft Skill') ? 'selected' : '' }}>Soft Skill</option>
                <option value="Pengetahuan Industri" {{ (old('kategori', $skill->kategori) == 'Pengetahuan Industri') ? 'selected' : '' }}>Pengetahuan Industri</option>
                <option value="Peralatan & Teknologi" {{ (old('kategori', $skill->kategori) == 'Peralatan & Teknologi') ? 'selected' : '' }}>Peralatan & Teknologi</option>
                {{-- Tambahkan lebih banyak kategori jika ada --}}
            </select>
            @error('kategori')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="level">Level</label>
            <select id="level" name="level" required>
                <option value="">Pilih Level</option>
                <option value="Beginner" {{ (old('level', $skill->level) == 'Beginner') ? 'selected' : '' }}>Beginner</option>
                <option value="Intermediate" {{ (old('level', $skill->level) == 'Intermediate') ? 'selected' : '' }}>Intermediate</option>
                <option value="Advanced" {{ (old('level', $skill->level) == 'Advanced') ? 'selected' : '' }}>Advanced</option>
                <option value="Expert" {{ (old('level', $skill->level) == 'Expert') ? 'selected' : '' }}>Expert</option>
            </select>
            @error('level')
                <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('skills.index') }}" class="btn secondary">Batalkan</a>
            <button type="submit" class="btn">Perbarui Skill</button>
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