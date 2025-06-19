@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-semibold mb-4">Edit Skill</h1>

    <form action="{{ route('skills.update', $skill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block font-medium">Nama Skill</label>
            <input type="text" name="nama" id="nama" value="{{ $skill->nama }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label for="tingkat" class="block font-medium">Tingkat</label>
            <select name="tingkat" id="tingkat" class="w-full border rounded px-3 py-2" required>
                <option value="Dasar" {{ $skill->tingkat === 'Dasar' ? 'selected' : '' }}>Dasar</option>
                <option value="Menengah" {{ $skill->tingkat === 'Menengah' ? 'selected' : '' }}>Menengah</option>
                <option value="Mahir" {{ $skill->tingkat === 'Mahir' ? 'selected' : '' }}>Mahir</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('skills.index') }}" class="ml-3 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
