<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Edit Profil - SkillHub</title>
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

    /* Main Content Container for Edit Profile */
    .edit-profile-container {
        max-width: 900px; /* Cukup lebar untuk formulir */
        margin: 40px auto 60px auto;
        padding: 30px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .edit-profile-container h1 {
        font-size: 2.2rem;
        color: #1d3b98;
        margin-bottom: 25px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
        text-align: left;
    }

    .form-section {
        margin-bottom: 30px;
    }

    .form-section h2 {
        font-size: 1.6rem;
        color: #1d3b98;
        margin-bottom: 20px;
        text-align: left;
    }

    .form-group {
        margin-bottom: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        align-items: flex-start;
    }

    .form-item {
        flex: 1 1 calc(50% - 10px); /* Two columns, minus gap */
        display: flex;
        flex-direction: column;
        gap: 8px; /* Space between label and input */
    }
    
    .form-item.full-width {
        flex-basis: 100%;
    }

    .form-item label {
        font-size: 0.95rem;
        color: #444;
        font-weight: 600;
    }

    .form-item input[type="text"],
    .form-item input[type="email"],
    .form-item input[type="tel"], /* Untuk nomor HP */
    .form-item textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 1rem;
        color: #333;
        box-sizing: border-box;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-item input[type="text"]:focus,
    .form-item input[type="email"]:focus,
    .form-item input[type="tel"]:focus,
    .form-item textarea:focus {
        border-color: #1d3b98;
        box-shadow: 0 0 0 3px rgba(29, 59, 152, 0.2);
        outline: none;
    }

    .form-item textarea {
        min-height: 120px; /* Make textarea taller for biography */
        resize: vertical;
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
        .edit-profile-container {
            padding: 20px;
            margin: 20px auto 40px auto;
        }
        .form-group {
            flex-direction: column;
            gap: 15px;
        }
        .form-item {
            flex-basis: 100%;
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
    <a href="{{ route('profile.profile') }}" class="profile-icon" title="Profil Saya">
    <i class="fas fa-user"></i> </a>
 </div>
</header>

<div class="edit-profile-container">
    <h1>Edit Profil Anda</h1>

    {{-- Form untuk mengupdate profil. Mengarah ke ProfileController@update --}}
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- CSRF token --}}
        @method('patch') {{-- Method spoofing untuk UPDATE request --}}

        <div class="form-section">
            <h2>Informasi Dasar</h2>
            <div class="form-group">
                <div class="form-item full-width"> {{-- Menggunakan full-width untuk nama lengkap --}}
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                    @error('name')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $user->jurusan) }}">
                    @error('jurusan')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item">
                    <label for="kampus">Kampus</label>
                    <input type="text" id="kampus" name="kampus" value="{{ old('kampus', $user->kampus) }}">
                    @error('kampus')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item full-width"> {{-- Biasanya foto profil diupload terpisah --}}
                    <label for="profilePhoto">Foto Profil</label>
                    <input type="file" id="profilePhoto" name="profile_photo" accept="image/*">
                    @error('profile_photo')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2>Informasi Kontak</h2>
            <div class="form-group">
                <div class="form-item full-width">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-item full-width">
                    <label for="no_hp">Nomor HP</label>
                    <input type="tel" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" placeholder="e.g., +62 812-3456-7890">
                    @error('no_hp')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-section">
            <h2>Biografi</h2>
            <div class="form-group">
                <div class="form-item full-width">
                    <label for="biography">Deskripsi Diri</label>
                    <textarea id="biography" name="biography">{{ old('biography', $user->biography) }}</textarea>
                    @error('biography')
                        <span style="color:red; font-size:0.85rem;">{{ $message }}</span>
                    @enderror
            </div>
        </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('profile.profile') }}" class="btn secondary">Batalkan</a>
            <button type="submit" class="btn">Simpan Perubahan</button>
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