<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CV - {{ $user->name }}</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      margin: 40px;
      background: #fdfdfd;
      color: #333;
    }

    h1 {
      color: #1d3b98;
      margin-bottom: 5px;
    }

    h2 {
      color: #1d3b98;
      margin-top: 30px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
    }

    p {
      margin: 5px 0;
    }

    .section {
      margin-bottom: 30px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    ul li {
      background: #e8efff;
      margin: 5px 0;
      padding: 10px;
      border-radius: 6px;
    }

    .actions {
      margin-top: 40px;
    }

    .btn {
      text-decoration: none;
      background: #1d3b98;
      color: #fff;
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: 500;
      margin-right: 10px;
    }
  </style>
</head>
<body>

  <h1>{{ $user->name }}</h1>
  <p>Email: {{ $user->email }}</p>
  <p>Telp: {{ $user->phone ?? '-' }}</p>

  <div class="section">
    <h2>Deskripsi Diri</h2>
    <p>{{ $user->bio ?? '-' }}</p>
  </div>

  <div class="section">
    <h2>Skill</h2>
    @if($skills->count())
      <ul>
        @foreach($skills as $skill)
          <li>{{ $skill->nama }} ({{ $skill->kategori }})</li>
        @endforeach
      </ul>
    @else
      <p>Belum ada skill yang ditambahkan.</p>
    @endif
  </div>

  <div class="section">
    <h2>Sertifikat</h2>
    @if($sertifikats->count())
      <ul>
        @foreach($sertifikats as $sertifikat)
          <li>
            {{ $sertifikat->judul }} <br>
            <small>{{ $sertifikat->penyelenggara }} - {{ $sertifikat->tanggal }}</small>
          </li>
        @endforeach
      </ul>
    @else
      <p>Belum ada sertifikat yang ditambahkan.</p>
    @endif
  </div>

  <div class="actions">
    <a href="{{ route('profile.edit') }}" class="btn">Edit Profil</a>
    <a href="{{ route('skills.index') }}" class="btn">Tambah Skill</a>
    <a href="{{ route('sertifikat.index') }}" class="btn">Tambah Sertifikat</a>
  </div>

</body>
</html>
