<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Keahlian - SkillHub</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

    /* Page-specific Header for Skills */
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

    .page-header .right-actions {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-header .right-actions .add-button {
        font-size: 1.8rem;
        color: #1d3b98;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .page-header .right-actions .add-button:hover {
        color: #16337d;
    }

    /* Skills List Container */
    .skills-container {
        max-width: 900px;
        margin: 0 auto 60px auto;
        padding: 20px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .skill-item {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .skill-item:last-child {
        border-bottom: none;
    }

    .skill-main-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-grow: 1;
        margin-right: 20px;
    }

    .skill-main-info h3 {
        font-size: 1.3rem;
        color: #1d3b98;
        margin: 0 0 5px 0;
    }

    .skill-details-text {
        font-size: 0.95rem;
        color: #666;
        margin: 0;
        line-height: 1.4;
    }

    .skill-actions {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .skill-action-button {
        font-size: 1.1rem;
        color: #555;
        cursor: pointer;
        transition: color 0.3s ease;
        text-decoration: none;
    }

    .skill-action-button:hover {
        color: #1d3b98;
    }

    .skill-action-button.delete:hover {
        color: #dc3545;
    }

    /* Footer */
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
        }
        .skills-container {
            padding: 15px;
            margin: 0 auto 40px auto;
        }
        .skill-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 15px 0;
        }
        .skill-main-info {
            width: 100%;
            margin-right: 0;
            margin-bottom: 10px;
        }
        .skill-actions {
            width: 100%;
            justify-content: flex-end;
            gap: 10px;
        }
        .skill-main-info h3 {
            font-size: 1.2rem;
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
        <a href="{{ route('dashboard') }}" class="back-button" title="Kembali ke Dashboard"><i class="fas fa-arrow-left"></i></a>
        <h1>Keahlian</h1>
    </div>
    <div class="right-actions">
        <a href="{{ route('skills.create') }}" class="add-button" title="Tambah Skill Baru"><i class="fas fa-plus"></i></a>
    </div>
</div>

<div class="skills-container">
    @forelse ($skills as $skill)
        <div class="skill-item">
            <div class="skill-main-info">
                <h3>{{ $skill->nama }}</h3>
                <p class="skill-details-text">Kategori: {{ $skill->kategori }} | Level: {{ $skill->level }}</p>
            </div>
            <div class="skill-actions">
                <a href="{{ route('skills.edit', $skill->id) }}" class="skill-action-button" title="Edit Skill"><i class="fas fa-pencil-alt"></i></a>
                
                {{-- Form untuk tombol delete. Laravel merekomendasikan DELETE method via form --}}
                <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus skill ini?');">
                    @csrf
                    @method('DELETE') {{-- Method spoofing untuk DELETE request --}}
                    <button type="submit" class="skill-action-button delete" title="Hapus Skill" style="background:none; border:none; padding:0; cursor:pointer;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p style="text-align: center; color: #777;">Belum ada skill yang ditambahkan. <a href="{{ route('skills.create') }}">Tambah skill pertama Anda!</a></p>
    @endforelse
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