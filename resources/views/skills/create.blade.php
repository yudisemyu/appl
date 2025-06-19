@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-semibold mb-4">Tambah Skill</h1>

    <form action="{{ route('skills.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block font-medium">Nama Skill</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="tingkat" class="block font-medium">Tingkat</label>
            <select name="tingkat" id="tingkat" class="w-full border rounded px-3 py-2" required>
                <option value="Dasar">Dasar</option>
                <option value="Menengah">Menengah</option>
                <option value="Mahir">Mahir</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
        <a href="{{ route('skills.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
