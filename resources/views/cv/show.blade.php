<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Curriculum Vitae - {{ $user->name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* CSS Umum */
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: #f4f7f6; /* Latar belakang lebih lembut */
            overflow-x: hidden;
            color: #333;
            box-sizing: border-box; /* Pastikan box-sizing konsisten */
        }
        /* Pastikan semua elemen mewarisi box-sizing */
        *, *::before, *::after {
            box-sizing: inherit;
        }

        /* --- Pengaturan Khusus PDF untuk Margin Halaman --- */
        @page {
            margin-top: 20mm;    /* Margin atas 2 cm */
            margin-right: 20mm;  /* Margin kanan 2 cm */
            margin-bottom: 20mm; /* Margin bawah 2 cm */
            margin-left: 20mm;   /* Margin kiri 2 cm */
        }

        body.is-pdf-mode {
            background: #fff !important;
            margin: 0 !important; /* Pastikan margin body di reset jika @page digunakan */
            padding: 0 !important;
            font-size: 10pt; /* Default font size for PDF */
        }
        /* --- Akhir Pengaturan Khusus PDF --- */

        /* CV Content Container - Gaya dasar yang berlaku untuk Web dan PDF */
        .cv-container {
            max-width: 900px; /* Max-width untuk tampilan web */
            margin: 20px auto 60px auto; /* Margin atas/bawah untuk browser */
            padding: 40px; /* Padding untuk web */
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }
        
        /* PENYESUAIAN KHUSUS UNTUK PDF agar tidak ada shadow/margin di PDF */
        body.is-pdf-mode .cv-container {
            box-shadow: none !important;
            border-radius: 0 !important;
            margin: 0 !important; 
            padding: 0 !important; /* Padding diatur oleh @page */
            max-width: none !important; /* Agar mengisi lebar penuh kertas */
            width: 100% !important; /* Penting untuk layout satu kolom */
            height: auto !important; /* Biarkan tinggi menyesuaikan konten */
            overflow: hidden; 
        }

        /* CV Title inside container (akan terlihat di PDF dan Web) */
        .cv-container .cv-title {
            font-size: 2.2rem; /* Ukuran untuk web */
            color: #1d3b98;
            text-align: center;
            margin-top: 0;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        body.is-pdf-mode .cv-title {
            font-size: 20pt !important; /* Ukuran khusus PDF */
            color: #000 !important; /* Warna hitam untuk cetak */
            margin-bottom: 15pt !important; /* Sesuaikan margin untuk PDF */
            padding-bottom: 5pt !important;
        }


        /* CV Section Styling */
        .cv-section {
            margin-bottom: 30px; /* Ukuran untuk web */
            padding-bottom: 20px; /* Ukuran untuk web */
            border-bottom: 1px solid #eee;
        }
        .cv-section:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        body.is-pdf-mode .cv-section {
            margin-bottom: 15pt !important; /* Sesuaikan margin untuk PDF */
            padding-bottom: 10pt !important;
            border-bottom: 0.5pt solid #eee !important; /* Border tipis untuk PDF */
        }
        body.is-pdf-mode .cv-section:last-child {
            border-bottom: none !important;
        }


        .cv-section h2 {
            font-size: 1.8rem; /* Ukuran untuk web */
            color: #1d3b98;
            margin-top: 0;
            margin-bottom: 15px; /* Ukuran untuk web */
        }
        body.is-pdf-mode .cv-section h2 {
            font-size: 14pt !important; /* Ukuran khusus PDF */
            color: #000 !important; /* Warna hitam untuk cetak */
            margin-bottom: 8pt !important; /* Sesuaikan margin untuk PDF */
        }

        /* Personal Info Styling - This section will now be part of the main flow */
        .personal-info {
            display: flex; /* Keep flex for personal info if it works for image/text alignment */
            align-items: center;
            gap: 25px; /* Ukuran untuk web */
            margin-bottom: 25px; /* Ukuran untuk web */
            padding-bottom: 20px; /* Ukuran untuk web */
            border-bottom: 1px solid #eee;
        }
        body.is-pdf-mode .personal-info {
            gap: 15pt !important;
            margin-bottom: 15pt !important;
            padding-bottom: 10pt !important;
        }
        .personal-info img {
            width: 100px; /* Ukuran untuk web */
            height: 100px; /* Ukuran untuk web */
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #1d3b98;
            flex-shrink: 0;
        }
        body.is-pdf-mode .personal-info img {
            width: 50pt !important; /* Ukuran khusus PDF */
            height: 50pt !important; /* Ukuran khusus PDF */
            border: 2pt solid #000 !important; /* Sesuaikan border untuk PDF */
        }

        .personal-details h1 {
            font-size: 2.5rem; /* Ukuran untuk web */
            margin: 0 0 5px 0;
            color: #333;
        }
        body.is-pdf-mode .personal-details h1 {
            font-size: 18pt !important; /* Ukuran khusus PDF */
            color: #000 !important; /* Warna hitam untuk cetak */
            margin-bottom: 4pt !important;
        }

        .personal-details p {
            font-size: 1.1rem; /* Ukuran untuk web */
            margin: 0;
            color: #555;
        }
        body.is-pdf-mode .personal-details p {
            font-size: 9pt !important; /* Ukuran khusus PDF */
            color: #000 !important; /* Warna hitam untuk cetak */
        }

        /* Header CV in container (This will be the main name/contact block) */
        .cv-header-content {
            text-align: center; /* Sesuaikan ke kiri sesuai gambar contoh */
            margin-bottom: 40px; /* Ukuran untuk web */
            padding-bottom: 20px; /* Tambahkan padding bawah */
            border-bottom: 1px solid #eee; /* Tambahkan border bawah */
        }
        body.is-pdf-mode .cv-header-content {
            margin-bottom: 15pt !important; /* Sesuaikan margin untuk PDF */
            padding-bottom: 10pt !important;
            border-bottom: 0.5pt solid #eee !important;
            text-align: center !important;
        }
        .cv-header-content img { /* Anda tidak memiliki gambar profil di header seperti gambar contoh */
            display: none; /* Sembunyikan jika tidak ada di desain 1 kolom */
        }
        .cv-header-content h1 {
            font-size: 2.8rem; /* Ukuran untuk web */
            color: #1d3b98;
            margin: 0 0 5px 0;
        }
        body.is-pdf-mode .cv-header-content h1 {
            font-size: 20pt !important; /* Ukuran khusus PDF (lebih kecil dari sebelumnya) */
            color: #000 !important;
            margin-bottom: 3pt !important;
        }
        .cv-header-content p {
            font-size: 1.1rem; /* Ukuran untuk web */
            color: #555;
            margin: 0;
        }
        body.is-pdf-mode .cv-header-content p {
            font-size: 9pt !important; /* Ukuran khusus PDF */
            color: #000 !important;
        }
        .cv-header-content p.contact-info {
            font-size: 0.95rem; /* Ukuran untuk web */
            margin-top: 5px; /* Sesuaikan margin top untuk contact-info */
        }
        body.is-pdf-mode .cv-header-content p.contact-info {
            font-size: 8pt !important; /* Ukuran khusus PDF */
            margin-top: 3pt !important;
        }

        /* Individual Item Styling (e.g., Education, Experience) */
        .item-block {
            margin-bottom: 15px; /* Ukuran untuk web */
        }
        body.is-pdf-mode .item-block {
            margin-bottom: 10pt !important; /* Sesuaikan margin untuk PDF */
        }
        .item-block:last-child {
            margin-bottom: 0;
        }
        .item-block h3 {
            font-size: 1.2rem; /* Ukuran untuk web */
            color: #333;
            margin: 0 0 5px 0; /* Ukuran untuk web */
        }
        body.is-pdf-mode .item-block h3 {
            font-size: 11pt !important; /* Ukuran khusus PDF */
            color: #000 !important;
            margin-bottom: 3pt !important;
        }
        .item-block p {
            font-size: 0.95rem; /* Ukuran untuk web */
            color: #666;
            margin: 0 0 2px 0; /* Ukuran untuk web */
        }
        body.is-pdf-mode .item-block p {
            font-size: 9pt !important; /* Ukuran khusus PDF */
            color: #000 !important;
            margin-bottom: 1pt !important;
        }
        .item-block .date-range {
            font-size: 0.85rem; /* Ukuran untuk web */
            color: #888;
            font-style: italic;
        }
        body.is-pdf-mode .item-block .date-range {
            font-size: 8pt !important; /* Ukuran khusus PDF */
            color: #000 !important;
        }
        /* List styles */
        .cv-list {
            list-style: disc; /* Use disc bullets */
            padding-left: 20px; /* Indent lists */
            margin-top: 0;
            margin-bottom: 0;
        }
        body.is-pdf-mode .cv-list {
            padding-left: 15pt !important;
        }
        .cv-list li {
            margin-bottom: 5px;
        }
        body.is-pdf-mode .cv-list li {
            margin-bottom: 3pt !important;
            line-height: 1.3; /* Adjust line height for better readability in PDF */
        }
        body.is-pdf-mode .cv-list li strong {
            color: #000 !important;
        }

        .cv-list li span.meta {
            font-size: 0.9em; /* Ukuran untuk web */
            color: #777;
            margin-left: 8px; /* Ukuran untuk web */
        }
        body.is-pdf-mode .cv-list li span.meta {
            font-size: 8pt !important; /* Ukuran khusus PDF */
            color: #000 !important;
            margin-left: 5pt !important;
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

        header .left img {
            height: 30px !important;
            width: auto !important;
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
        .page-header {
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

        /* Responsive adjustments for 1-COLUMN layout */
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
                margin-bottom: 15px;
            }
            .cv-container {
                padding: 20px;
                margin: 20px auto 40px auto;
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
<body class="{{ (isset($is_pdf) && $is_pdf) ? 'is-pdf-mode' : '' }}">

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

    <div class="page-header">
        <div class="left-actions">
            <a href="{{ route('dashboard') }}" class="back-button" title="Kembali ke Dashboard"><i class="fas fa-arrow-left"></i></a>
            <h1>Curriculum Vitae</h1>
        </div>
    </div>
@endif

{{-- Konten Utama CV (Sekarang satu kolom) --}}
<div class="cv-container">
    {{-- Personal Info / Header CV seperti di gambar contoh --}}
    <div class="cv-header-content">
        <h1>{{ $user->name }}</h1>
        <p class="contact-info">
            {{ $user->email }} | {{ $user->no_hp ?? '-' }}
            {{-- Menggunakan variabel jurusan dan kampus dari user --}}
            @if($user->jurusan || $user->kampus)
                <br>{{ $user->jurusan ?? '-' }} - {{ $user->kampus ?? '-' }}
            @endif
        </p>
    </div>

    {{-- Ringkasan / Tentang Saya (menggunakan biografi) --}}
    <div class="cv-section">
        <h2>Tentang Saya</h2> {{-- Mengubah judul section --}}
        <p>{{ $user->biografi ?? 'Belum ada ringkasan atau deskripsi diri.' }}</p>
    </div>

    {{-- Pendidikan (Menggunakan pendidikan_terakhir) --}}
    <div class="cv-section">
        <h2>Pendidikan</h2>
        @if($user->pendidikan_terakhir || $user->tahun_pendidikan_terakhir)
            <div class="item-block">
                <h3>{{ $user->pendidikan_terakhir }}</h3>
                <p class="date-range">{{ $user->tahun_pendidikan_terakhir ?? '-' }}</p>
            </div>
        @else
            <p>Tidak ada pendidikan yang dicatat.</p>
        @endif
        {{-- Jika Anda memiliki relasi 'education' yang berisi banyak riwayat pendidikan, Anda bisa melakukan loop di sini --}}
        {{-- @forelse($user->education as $edu)
            <div class="item-block">
                <h3>{{ $edu->gelar }}</h3>
                <p>{{ $edu->institusi }}</p>
                <p class="date-range">{{ $edu->tahun_mulai }} - {{ $edu->tahun_selesai }}</p>
            </div>
        @empty
            <li>Tidak ada pendidikan yang dicatat.</li>
        @endforelse --}}
    </div>

    {{-- Pengalaman (Data masih dummy karena tidak ada kolom di tabel users untuk array pengalaman) --}}
    <div class="cv-section">
        <h2>Pengalaman</h2>
        @forelse($user->experiences as $experience)
            <div class="item-block">
                <h3>{{ $experience->job_title }}</h3>
                <p>{{ $experience->company }} @if($experience->location), {{ $experience->location }} @endif</p>
                <p class="date-range">
                    {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                    {{ $experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : 'Sekarang' }}
                </p>
                @if($experience->description)
                    <p>{{ $experience->description }}</p> 
                @endif
            </div>
        @empty
            <p>Belum ada pengalaman yang dicatat.</p>
        @endforelse
    </div>

    {{-- Skills --}}
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

    {{-- Sertifikat --}}
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