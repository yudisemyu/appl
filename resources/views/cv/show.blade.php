<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CV Saya - SkillHub</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; line-height: 1.6; margin: 30px; color: #000; }
        h1, h2 { color: #1d3b98; }
        .section { margin-top: 30px; }
        .download { margin-top: 20px; }
    </style>
</head>
<body>
    <h1>{{ Auth::user()->name }}</h1>
    <p>Email: {{ Auth::user()->email }}</p>
    <p>Telepon: {{ Auth::user()->phone ?? '-' }}</p>
    <p>Alamat: {{ Auth::user()->alamat ?? '-' }}</p>

    <div class="section">
        <h2>Deskripsi Diri</h2>
        <p>{{ Auth::user()->bio ?? '-' }}</p>
    </div>

    <div class="section">
        <h2>Skill</h2>
        <ul>
            @foreach(Auth::user()->skills as $skill)
                <li>{{ $skill->nama }} ({{ $skill->tingkat }})</li>
            @endforeach
        </ul>
    </div>

    <div class="section">
        <h2>Sertifikat</h2>
        <ul>
            @foreach(Auth::user()->sertifikats as $sertifikat)
                <li>{{ $sertifikat->judul }} - {{ $sertifikat->penyelenggara }} ({{ $sertifikat->tanggal }})</li>
            @endforeach
        </ul>
    </div>

    <div class="download">
        <form action="{{ route('cv.download') }}" method="POST">
            @csrf
            <button type="submit">Download CV PDF</button>
        </form>
    </div>
</body>
</html>
