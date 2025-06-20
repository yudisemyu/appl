<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <title>Curriculum Vitae - {{ $user->name }}</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
 <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #f4f7f6; /* Latar belakang lebih lembut */
      overflow-x: hidden;
      color: #333;
    }

    /* CV Content Container - Gaya dasar yang berlaku untuk Web dan PDF */
    .cv-container {
        max-width: 900px;
        margin: 20px auto 60px auto; /* Margin atas/bawah untuk browser */
        padding: 40px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    /* PENYESUAIAN KHUSUS UNTUK PDF agar tidak ada shadow/margin di PDF */
    body.is-pdf-mode .cv-container {
        box-shadow: none !important;
        border-radius: 0 !important;
        margin: 0 !important;
        padding: 20mm !important; /* Padding untuk kertas A4 */
        max-width: none !important; /* Agar mengisi lebar penuh kertas */
    }
    body.is-pdf-mode { /* Gaya body khusus untuk PDF */
        background: #fff !important;
        margin: 0 !important;
        padding: 0 !important;
    }


    /* CV Title inside container (akan terlihat di PDF dan Web) */
    .cv-container .cv-title {
        font-size: 2.2rem;
        color: #1d3b98;
        text-align: center;
        margin-top: 0;
        margin-bottom: 30px;
        border-bottom: 2px solid #eee;
        padding-bottom: 10px;
    }
    body.is-pdf-mode .cv-container .cv-title {
        font-size: 24pt !important;
        color: #000 !important;
    }


    /* CV Section Styling */
    .cv-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .cv-section:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .cv-section h2 {
        font-size: 1.8rem;
        color: #1d3b98;
        margin-top: 0;
        margin-bottom: 15px;
    }
    body.is-pdf-mode .cv-section h2 {
        font-size: 18pt !important;
        color: #000 !important;
    }

    /* Personal Info Styling */
    .personal-info {
        display: flex;
        align-items: center;
        gap: 25px;
        margin-bottom: 25px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .personal-info img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #1d3b98;
        flex-shrink: 0;
    }
    body.is-pdf-mode .personal-info img {
        width: 70px !important;
        height: 70px !important;
    }

    .personal-details h1 {
        font-size: 2.5rem;
        margin: 0 0 5px 0;
        color: #333;
    }
    body.is-pdf-mode .personal-details h1 {
        font-size: 20pt !important;
        color: #000 !important;
    }

    .personal-details p {
        font-size: 1.1rem;
        margin: 0;
        color: #555;
    }
    body.is-pdf-mode .personal-details p {
        font-size: 10pt !important;
        color: #000 !important;
    }

    /* Skills & Certificates List Styling */
    /* CV Content Container */
    .cv-container {
        max-width: 900px;
        margin: 20px auto 60px auto;
        padding: 40px;
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }
    
    /* Header CV di dalam container */
    .cv-header-content {
        text-align: center;
        margin-bottom: 40px;
    }
    .cv-header-content img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid #1d3b98;
        margin-bottom: 15px;
        box-shadow: 0 0 0 5px rgba(29, 59, 152, 0.1);
    }
    .cv-header-content h1 {
        font-size: 2.8rem;
        color: #1d3b98;
        margin: 0 0 5px 0;
    }
    .cv-header-content p {
        font-size: 1.1rem;
        color: #555;
        margin: 0;
    }
    .cv-header-content p.contact-info {
        font-size: 0.95rem;
        margin-top: 10px;
    }


    /* Main two-column layout */
    .cv-main-columns {
        display: flex;
        flex-wrap: wrap; /* Allow columns to wrap on smaller screens */
        gap: 30px; /* Space between columns */
    }

    .cv-left-column, .cv-right-column {
        flex: 1; /* Allow columns to grow and shrink */
        min-width: 300px; /* Minimum width before wrapping */
    }

    /* CV Section Styling */
    .cv-section {
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }
    .cv-section:last-child {
        border-bottom: none;
        padding-bottom: 0;
        margin-bottom: 0;
    }
    .cv-section h2 {
        font-size: 1.8rem;
        color: #1d3b98;
        margin-top: 0;
        margin-bottom: 15px;
    }


    /* Individual Item Styling (e.g., Education, Experience) */
    .item-block {
        margin-bottom: 15px;
    }
    .item-block:last-child {
        margin-bottom: 0;
    }
    .item-block h3 {
        font-size: 1.2rem;
        color: #333;
        margin: 0 0 5px 0;
    }
    .item-block p {
        font-size: 0.95rem;
        color: #666;
        margin: 0 0 2px 0;
    }
    .item-block .date-range {
        font-size: 0.85rem;
        color: #888;
        font-style: italic;
    }

    body.is-pdf-mode .cv-list li strong {
        color: #000 !important;
    }

    .cv-list li span.meta {
        font-size: 0.9em;
        color: #777;
        margin-left: 8px;
    }
    body.is-pdf-mode .cv-list li span.meta {
        font-size: 8pt !important;
        color: #000 !important;
    }

    /* Download Button (Hanya untuk web) */
    .download-section {
        text-align: center;
        margin-top: 40px;
    }
    .download-section .btn {
        display: inline-block;
        padding: 12px 25px;
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
    .download-section .btn:hover {
        background: #16337d;
        transform: translateY(-2px);
    }

    /* Gaya untuk Header Utama (Web) */
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      border-bottom: 1px solid #eee;
      background: #fff;
      box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }

    /* PERBAIKAN DI SINI: Atur ukuran logo di header */
    header .left img {
      height: 30px !important; /* Paksa tinggi */
      width: auto !important; /* Biarkan lebar mengikuti proporsi */
    }

    header .left {
      display: flex;
      align-items: center;
      gap: 15px;
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

    /* Page-specific Header untuk CV di web */
    .page-header { /* Kelas ini sudah diubah dari 'page-header-web' di HTML */
        max-width: 900px;
        margin: 30px auto 20px auto;
        padding: 0 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .page-header .back-button {
        font-size: 1.5rem;
        color: #555;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .page-header .back-button:hover {
        color: #1d3b98;
    }
    .page-header h1 {
        font-size: 2rem;
        color: #333;
        margin: 0;
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

    /* Footer Utama (Web) */
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

    .cv-list {
        list-style: none;
        padding-left: 0;
        margin: 0;
    }
    .cv-list li {
        margin-bottom: 8px;
        font-size: 1rem;
        color: #444;
    }
    .cv-list li strong {
        color: #1d3b98;
    }
    .cv-list li span.meta {
        font-size: 0.9em;
        color: #777;
        margin-left: 8px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .page-header { /* Menggunakan kelas yang sudah diselaraskan */
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 15px;
        }
        .cv-container {
            padding: 20px;
            margin: 20px auto 40px auto;
        }
        .personal-info {
            flex-direction: column;
            text-align: center;
        }
        .personal-details h1 {
            font-size: 2rem;
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
        .page-header h1 { /* Menggunakan kelas yang sudah diselaraskan */
            font-size: 1.8rem;
        }
    }
 </style>
</head>
{{-- Tambahkan kelas 'is-pdf-mode' ke body jika dirender sebagai PDF --}}
<body class="{{ (isset($is_pdf) && $is_pdf) ? 'is-pdf-mode' : '' }}">

{{-- Debugging Hook: Akan muncul di PDF jika $is_pdf true. Hapus ini setelah fix --}}
{{-- @if(isset($is_pdf) && $is_pdf)
    <p style="color:red; background:yellow; text-align:center;">PDF Mode Active!</p>
@endif --}}


{{-- Header Utama (Hanya di Web, bukan PDF) --}}
@if(empty($is_pdf))
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

    {{-- Page Header khusus CV (dengan tombol kembali, hanya di Web) --}}
    <div class="page-header"> {{-- Nama kelas CSS di HTML sudah diubah ke 'page-header' --}}
        <div class="left-actions">
            <a href="{{ route('profile.profile') }}" class="back-button" title="Kembali ke Profil"><i class="fas fa-arrow-left"></i></a>
            <h1>Curriculum Vitae</h1> {{-- H1 ini adalah bagian dari page-header --}}
        </div>
    </div>
@endif

{{-- Konten Utama CV --}}
<div class="cv-container">
    <div class="cv-header-content">
        <img src="https://i.pravatar.cc/120?u={{ $user->email }}" alt="Foto Profil">
        <h1>{{ $user->name }}</h1>
        <p class="contact-info">
            {{ $user->email }} | {{ $user->no_hp ?? 'Belum ada Telepon' }}
        </p>
        <p>{{ $user->jurusan ?? 'Belum ada Jurusan' }} - {{ $user->kampus ?? 'Belum ada Kampus' }}</p>
    </div>

    <div class="cv-main-columns">
        <div class="cv-left-column">
            <div class="cv-section">
                <h2>Ringkasan</h2>
                <p>{{ $user->biography ?? 'Belum ada ringkasan atau deskripsi diri.' }}</p>
            </div>

            <div class="cv-section">
                <h2>Skills</h2>
                <ul class="cv-list">
                    @forelse($user->skills as $skill)
                        <li>
                            <strong>{{ $skill->nama }}</strong>
                            <span class="meta">({{ $skill->kategori ?? 'Tidak Diketahui' }}, Level: {{ $skill->level ?? 'N/A' }})</span>
                        </li>
                    @empty
                        <li>Tidak ada skill yang dicatat.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="cv-right-column">
            <div class="cv-section">
                <h2>Pendidikan</h2>
                <div class="item-block">
                    <h3>Sarjana Teknik Informatika</h3>
                    <p>Universitas Teknologi</p>
                    <p class="date-range">Sept 2020 - Juni 2024</p>
                </div>
                <div class="item-block">
                    <h3>SMA Negeri 1</h3>
                    <p>Jurusan IPA</p>
                    <p class="date-range">Juli 2017 - Juni 2020</p>
                </div>
                {{-- Tambahkan loop @forelse ($user->education as $edu) jika ada data dinamis --}}
            </div>

            <div class="cv-section">
                <h2>Pengalaman</h2>
                <div class="item-block">
                    <h3>Junior Web Developer</h3>
                    <p>PT. Teknologi Maju</p>
                    <p class="date-range">Jan 2024 - Sekarang</p>
                    <p>Mengembangkan dan memelihara aplikasi web menggunakan Laravel dan Vue.js.</p>
                </div>
                <div class="item-block">
                    <h3>Intern Data Analyst</h3>
                    <p>Perusahaan Data Solusi</p>
                    <p class="date-range">Juni 2023 - Agustus 2023</p>
                    <p>Menganalisis data penjualan dan membuat laporan visual menggunakan Tableau.</p>
                </div>
                {{-- Tambahkan loop @forelse ($user->experience as $exp) jika ada data dinamis --}}
            </div>

            <div class="cv-section">
                <h2>Sertifikat</h2>
                <ul class="cv-list">
                    @forelse($user->sertifikats as $sertifikat)
                        <li>
                            <strong>{{ $sertifikat->judul }}</strong> - {{ $sertifikat->penyelenggara }} 
                            <span class="meta">({{ \Carbon\Carbon::parse($sertifikat->tanggal)->format('d F Y') ?? 'Tidak Diketahui' }})</span>
                        </li>
                    @empty
                        <li>Tidak ada sertifikat yang dicatat.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    {{-- Tombol Download (Hanya di Web, bukan PDF) --}}
    @if(empty($is_pdf))
        <div class="download-section">
            <form action="{{ route('cv.download') }}" method="POST">
                @csrf
                <button type="submit" class="btn"><i class="fas fa-download"></i> Download CV PDF</button>
            </form>
        </div>
    @endif
</div>

{{-- Kondisi untuk menampilkan Footer Utama (Hanya di Web, bukan PDF) --}}
@if(empty($is_pdf))
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
@endif

</body>
</html>