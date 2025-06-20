<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Pengalaman Saya - SkillHub</title>
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

    /* Page-specific Header for Experiences */
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

    /* Experiences List Container */
    .experiences-container {
        max-width: 900px;
        margin: 0 auto 60px auto;
        padding: 20px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .experience-item {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        flex-wrap: wrap;
    }

    .experience-item:last-child {
        border-bottom: none;
    }

    .experience-main-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex-grow: 1;
        margin-right: 20px;
    }

    .experience-main-info h3 {
        font-size: 1.3rem;
        color: #1d3b98;
        margin: 0 0 5px 0;
    }

    .experience-details-text {
        font-size: 0.95rem;
        color: #666;
        margin: 0;
        line-height: 1.4;
    }
    .experience-details-text .location-date {
        font-size: 0.9em;
        color: #777;
        font-style: italic;
    }


    .experience-actions {
        display: flex;
        gap: 15px;
        align-items: center;
    }

    .experience-action-button {
        font-size: 1.1rem;
        color: #555;
        cursor: pointer;
        transition: color 0.3s ease;
        text-decoration: none;
    }

    .experience-action-button:hover {
        color: #1d3b98;
    }

    .experience-action-button.delete:hover {
        color: #dc3545;
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
        }
        .experiences-container {
            padding: 15px;
            margin: 0 auto 40px auto;
        }
        .experience-item {
            flex-direction: column;
            align-items: flex-start;
            padding: 15px 0;
        }
        .experience-main-info {
            width: 100%;
            margin-right: 0;
            margin-bottom: 10px;
        }
        .experience-actions {
            width: 100%;
            justify-content: flex-end;
            gap: 10px;
        }
        .experience-main-info h3 {
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
        <h1>Pengalaman Saya</h1>
    </div>
    <div class="right-actions">
        <a href="{{ route('experiences.create') }}" class="add-button" title="Tambah Pengalaman Baru"><i class="fas fa-plus"></i></a>
    </div>
</div>

<div class="experiences-container">
    @forelse ($experiences as $experience)
        <div class="experience-item">
            <div class="experience-main-info">
                <h3>{{ $experience->job_title }} di {{ $experience->company }}</h3>
                <p class="experience-details-text">
                    <span class="location-date">{{ $experience->location ?? 'Lokasi tidak diketahui' }} | 
                        {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                        @if($experience->end_date)
                            {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                        @else
                            Sekarang
                        @endif
                    </span>
                    @if ($experience->description)
                        <br>{{ $experience->description }}
                    @endif
                </p>
            </div>
            <div class="experience-actions">
                <a href="{{ route('experiences.edit', $experience->id) }}" class="experience-action-button" title="Edit Pengalaman"><i class="fas fa-pencil-alt"></i></a>
                
                <form action="{{ route('experiences.destroy', $experience->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengalaman ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="experience-action-button delete" title="Hapus Pengalaman" style="background:none; border:none; padding:0; cursor:pointer;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p style="text-align: center; color: #777;">Belum ada pengalaman yang dicatat. <a href="{{ route('experiences.create') }}">Tambah pengalaman pertama Anda!</a></p>
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
  <h2>96%</div>
  <p>Pengguna merasa terbantu</p>
 </div>
</div>

</body>
</html>
