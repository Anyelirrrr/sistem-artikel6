@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded-xl shadow">

    <h2 class="font-bold text-lg text-[#6F4E37] mb-4">
        Edit Artikel
    </h2>

    <form method="POST"
          action="{{ route('articles.update', $article) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block font-semibold mb-1">Judul</label>
            <input name="judul"
                   value="{{ old('judul', $article->judul) }}"
                   class="w-full border rounded p-2"
                   required>
        </div>

        <div class="mb-3">
            <label class="block font-semibold mb-1">Jenis Artikel</label>
            <select name="jenis" class="w-full border rounded p-2" required>
                <option value="ilmiah" @selected($article->jenis === 'ilmiah')>
                    Ilmiah
                </option>
                <option value="populer" @selected($article->jenis === 'populer')>
                    Populer
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label class="block font-semibold mb-1">Konten</label>
            <textarea name="konten"
                      rows="5"
                      class="w-full border rounded p-2"
                      required>{{ old('konten', $article->konten) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">
                Ganti Foto (opsional)
            </label>
            <input type="file"
                   name="image"
                   class="w-full border rounded p-2"
                   accept="image/*">
        </div>

        <button
            class="bg-[#6F4E37] text-white px-4 py-2 rounded hover:bg-[#5a3e2b] transition">
            Update Artikel
        </button>

    </form>
</div>
@endsection
