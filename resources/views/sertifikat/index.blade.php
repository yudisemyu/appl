<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Sertifikat - SkillHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            font-family: "Segoe UI", sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #1d3b98;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0,0,0,0.06);
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            background: #1d3b98;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 12px 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #e8efff;
        }

        td a {
            color: #1d3b98;
            text-decoration: underline;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-buttons form {
            display: inline;
        }

        .edit-btn {
            background: #ffc107;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Sertifikat</h1>

    @if(session('success'))
        <div style="background: #d4edda; padding: 10px; color: #155724; margin-bottom: 15px; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Penyelenggara</th>
                <th>Tanggal</th>
                <th>File</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sertifikats as $sertifikat)
                <tr>
                    <td>{{ $sertifikat->judul }}</td>
                    <td>{{ $sertifikat->penyelenggara }}</td>
                    <td>{{ $sertifikat->tanggal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada sertifikat.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
