<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Skill</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CDN (gunakan ini jika belum pakai Vite) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-semibold mb-4 text-[#1d3b98]">Daftar Skill</h1>

        <a href="{{ route('skills.create') }}"
           class="mb-4 inline-block px-4 py-2 bg-[#1d3b98] text-white rounded hover:bg-[#152e76] transition">
            + Tambah Skill
        </a>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-left border-collapse">
            <thead>
                <tr>
                    <th class="border-b py-2">Nama Skill</th>
                    <th class="border-b py-2">Tingkat</th>
                    <th class="border-b py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($skills as $skill)
                <tr class="hover:bg-gray-50">
                    <td class="py-2">{{ $skill->nama }}</td>
                    <td class="py-2">{{ $skill->tingkat }}</td>
                    <td class="py-2">
                        <a href="{{ route('skills.edit', $skill->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        |
                        <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus skill ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-4 text-center text-gray-500">Belum ada data skill.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
