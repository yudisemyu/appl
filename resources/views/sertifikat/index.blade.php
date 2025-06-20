<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Sertifikat Saya - SkillHub</title>
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

    /* Page-specific Header for Certificates */
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

    /* Certificates List Container */
    .certificates-container {
        max-width: 900px;
        margin: 0 auto 60px auto;
        padding: 20px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .certificate-item {
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        display: flex;
        align-items: center; /* Align items vertically center */
        gap: 20px; /* Space between image and text */
    }

    .certificate-item:last-child {
        border-bottom: none;
    }

    .cert-thumbnail {
        width: 100px; /* Lebar thumbnail */
        height: 70px; /* Tinggi thumbnail, bisa diatur sesuai rasio gambar */
        background-color: #f0f0f0; /* Placeholder background */
        border-radius: 8px;
        object-fit: cover; /* Memastikan gambar mengisi area tanpa distorsi */
        flex-shrink: 0; /* Mencegah thumbnail menyusut */
        border: 1px solid #ddd;
        /* Tambahkan gaya cursor pointer di sini juga agar konsisten */
        cursor: pointer;
    }
    .cert-thumbnail.placeholder-text { /* Gaya khusus untuk thumbnail teks (misal: PDF) */
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        color: #000000; /* Warna teks PDF */
        font-size: 0.85rem;
        border: 1px solid #000000; /* Border PDF */
        background-color: #f2f2f2; /* Latar belakang PDF */
        text-transform: uppercase; /* Contoh: buat teks jadi uppercase */
    }


    .cert-info {
        flex-grow: 1; /* Biarkan informasi mengisi sisa ruang */
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .cert-info h3 {
        font-size: 1.2rem;
        color: #1d3b98;
        margin: 0 0 5px 0;
    }

    .cert-info p {
        font-size: 0.95rem;
        color: #666;
        margin: 0;
        line-height: 1.4;
    }

    .cert-actions {
        display: flex;
        gap: 10px; /* Jarak antar tombol aksi */
        flex-shrink: 0; /* Mencegah tombol menyusut */
    }

    .cert-action-button {
        font-size: 1rem; /* Ukuran ikon lebih kecil agar lebih padat */
        color: #555;
        cursor: pointer;
        transition: color 0.3s ease;
        text-decoration: none;
        padding: 5px; /* Sedikit padding agar mudah diklik */
        border-radius: 4px; /* Sudut sedikit membulat */
    }

    .cert-action-button:hover {
        color: #1d3b98;
        background-color: #eef3fc; /* Latar belakang pada hover */
    }

    .cert-action-button.delete:hover {
        color: #dc3545;
        background-color: #ffeaea;
    }

    .cert-action-button.view-file:hover {
        color: #28a745;
        background-color: #e6ffe6;
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
        .certificates-container {
            padding: 15px;
            margin: 0 auto 40px auto;
        }
        .certificate-item {
            flex-wrap: wrap; /* Izinkan item bungkus jika layar kecil */
            justify-content: center; /* Pusatkan item saat bungkus */
            text-align: center;
        }
        .cert-thumbnail {
            margin-bottom: 10px;
        }
        .cert-info {
            align-items: center; /* Pusatkan teks saat stacked */
            text-align: center;
            margin-right: 0;
        }
        .cert-actions {
            width: 100%; /* Tombol ambil lebar penuh */
            justify-content: center; /* Pusatkan tombol */
        }
        .cert-main-info h3 { /* Ini sebenarnya cert-info h3 */
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
        <h1>Sertifikat Saya</h1>
    </div>
    <div class="right-actions">
        <a href="{{ route('sertifikat.create') }}" class="add-button" title="Tambah Sertifikat Baru"><i class="fas fa-plus"></i></a>
    </div>
</div>

<div class="certificates-container">
    @forelse ($sertifikats as $sertifikat)
        <div class="certificate-item">
            {{-- Bagian Thumbnail Sertifikat - Menggunakan kondisi untuk menampilkan gambar atau teks --}}
            @php
                $filePath = $sertifikat->file_path ? Storage::url($sertifikat->file_path) : null;
                $fileExtension = $filePath ? pathinfo($filePath, PATHINFO_EXTENSION) : '';
                $isPdf = (strtolower($fileExtension) == 'pdf');
                $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            @endphp

            @if ($isPdf)
                <div class="cert-thumbnail placeholder-text" 
                     onclick="openPreview('{{ $filePath }}')" 
                     title="Klik untuk pratinjau PDF">
                    PDF
                </div>
            @elseif ($isImage)
                <img src="{{ $filePath }}" 
                     alt="Thumbnail Sertifikat {{ $sertifikat->judul }}" 
                     class="cert-thumbnail" 
                     onclick="openPreview('{{ $filePath }}')" 
                     title="Klik untuk pratinjau">
            @else
                {{-- Fallback for no file or unsupported type --}}
                <img src="https://via.placeholder.com/100x70?text=File" 
                     alt="Tidak ada pratinjau" 
                     class="cert-thumbnail">
            @endif


            {{-- Bagian Informasi Sertifikat --}}
            <div class="cert-info">
                <h3>{{ $sertifikat->judul }}</h3>
                <p>Penyelenggara: {{ $sertifikat->penyelenggara ?? 'Tidak Diketahui' }}</p>
                <p>Tanggal: {{ \Carbon\Carbon::parse($sertifikat->tanggal)->format('d F Y') ?? 'Tidak Diketahui' }}</p>
            </div>

            {{-- Bagian Tombol Aksi --}}
            <div class="cert-actions">
                @if ($sertifikat->file_path)
                    <a href="{{ Storage::url($sertifikat->file_path) }}" target="_blank" class="cert-action-button view-file" title="Lihat Sertifikat"><i class="fas fa-eye"></i></a>
                @endif
                <a href="{{ route('sertifikat.edit', $sertifikat->id) }}" class="cert-action-button" title="Edit Sertifikat"><i class="fas fa-pencil-alt"></i></a>
                
                <form action="{{ route('sertifikat.destroy', $sertifikat->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sertifikat ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cert-action-button delete" title="Hapus Sertifikat" style="background:none; border:none; padding:0; cursor:pointer;">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p style="text-align: center; color: #777;">Belum ada sertifikat yang ditambahkan. <a href="{{ route('sertifikat.create') }}">Tambah sertifikat pertama Anda!</a></p>
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

<div id="previewModal" style="display: none; position: fixed; z-index: 9999; top: 0; left: 0; width: 100%; height: 100%;
     background-color: rgba(0,0,0,0.7); justify-content: center; align-items: center;">
  <div style="position: relative; max-width: 90%; max-height: 90%; display: flex; justify-content: center; align-items: center;">
    <span onclick="closePreview()" style="position: absolute; top: -20px; right: -20px; font-size: 2rem; color: white; cursor: pointer;">&times;</span>
    <iframe id="modalFrame" src="" style="width: 100%; height: 80vh; border: none; border-radius: 8px; background: white; display: none;"></iframe>
    <img id="modalImage" src="" alt="Sertifikat Pratinjau" style="max-width: 100%; max-height: 80vh; object-fit: contain; border-radius: 8px; display: none;">
  </div>
</div>

<script>
  function openPreview(url) {
    const modal = document.getElementById("previewModal");
    const modalFrame = document.getElementById("modalFrame");
    const modalImage = document.getElementById("modalImage");

    // Reset display of both elements
    modalFrame.style.display = "none";
    modalImage.style.display = "none";

    // Determine file type
    const fileExtension = url.split('.').pop().toLowerCase();
    if (['pdf'].includes(fileExtension)) {
      // It's a PDF
      modalFrame.src = url;
      modalFrame.style.display = "block";
    } else if (['jpg', 'jpeg', 'png', 'gif', 'webp'].includes(fileExtension)) {
      // It's an image
      modalImage.src = url;
      modalImage.style.display = "block";
    } else {
      // Fallback or unsupported type, open in new tab
      window.open(url, '_blank');
      return; // Exit function if opening in new tab
    }

    modal.style.display = "flex";
  }

  function closePreview() {
    const modal = document.getElementById("previewModal");
    const modalFrame = document.getElementById("modalFrame");
    const modalImage = document.getElementById("modalImage");

    modalFrame.src = ""; // Clear iframe src
    modalImage.src = ""; // Clear image src
    modal.style.display = "none";
  }
</script>



</body>
</html>