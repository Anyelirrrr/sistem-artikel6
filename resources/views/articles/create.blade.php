@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-2xl">

    <h1 class="text-2xl font-bold text-[#6F4E37] mb-6">
        Tambah Artikel
    </h1>

    <form action="{{ route('articles.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white p-6 rounded-xl shadow">

        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul"
                   class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Jenis Artikel</label>
            <select name="jenis" class="w-full border rounded p-2" required>
                <option value="">-- Pilih --</option>
                <option value="ilmiah">Ilmiah</option>
                <option value="populer">Populer</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Foto Artikel</label>
            <input type="file" name="image"
                   class="w-full border rounded p-2"
                   accept="image/*" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Konten</label>
            <textarea name="konten" rows="5"
                      class="w-full border rounded p-2" required></textarea>
        </div>

        <button
            class="bg-[#6F4E37] text-white px-4 py-2 rounded hover:bg-[#5a3e2b] transition">
            Simpan Artikel
        </button>

    </form>
</div>
@endsection
