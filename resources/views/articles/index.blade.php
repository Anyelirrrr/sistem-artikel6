@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h2 class="font-bold text-xl text-[#6F4E37] mb-6">
        Daftar Artikel
    </h2>

    {{-- SEARCH --}}
    <form method="GET" action="{{ route('articles.index') }}" class="mb-6">
        <div class="flex gap-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari artikel..."
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6F4E37]"
            >
            <button
                type="submit"
                class="px-5 py-2 bg-[#6F4E37] text-white rounded-lg hover:opacity-90"
            >
                Cari
            </button>
        </div>
    </form>

    @if(request('search'))
        <p class="mb-4 text-sm text-gray-600">
            Hasil pencarian untuk:
            <span class="font-semibold">"{{ request('search') }}"</span>
        </p>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        @forelse($articles as $article)
            <div class="bg-white rounded-2xl shadow hover:shadow-lg transition overflow-hidden">

                {{-- FOTO ARTIKEL --}}
                <img
                    src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->judul }}"
                    class="w-full h-48 object-cover">

                <div class="p-6">
                    <span class="text-xs bg-[#A67C52] text-white px-3 py-1 rounded-full">
                        {{ ucfirst($article->jenis) }}
                    </span>

                    <h3 class="text-lg font-bold mt-3 text-gray-800">
                        {{ $article->judul }}
                    </h3>

                    <p class="text-sm text-gray-600 mt-2">
                        {{ \Illuminate\Support\Str::limit($article->konten, 120) }}
                    </p>

                    <a href="{{ route('articles.show', $article) }}"
                       class="text-[#6F4E37] font-semibold mt-3 inline-block hover:underline">
                        Baca Selengkapnya →
                    </a>

                    {{-- BUTTON ADMIN --}}
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <div class="mt-4 flex gap-2">
                                <a href="{{ route('articles.edit', $article) }}"
                                   class="text-sm bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Edit
                                </a>

                                <button
                                    onclick="openDeleteModal({{ $article->id }})"
                                    class="text-sm bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Hapus
                                </button>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center text-gray-500">
                Tidak ada artikel yang ditemukan.
            </div>
        @endforelse

    </div>
</div>

{{-- MODAL HAPUS --}}
<div id="deleteModal"
     class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md">
        <h2 class="text-lg font-bold text-[#6F4E37] mb-3">
            Konfirmasi Hapus Artikel
        </h2>

        <p class="text-gray-700 mb-5">
            Apakah Anda yakin ingin menghapus artikel ini?
            <br>
            <span class="text-red-600 font-semibold">
                Data yang dihapus tidak dapat dikembalikan.
            </span>
        </p>

        <div class="flex justify-end gap-3">
            <button onclick="closeDeleteModal()"
                    class="px-4 py-2 rounded border">
                Batal
            </button>

            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 text-white px-4 py-2 rounded">
                    Ya, Hapus
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function openDeleteModal(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');

    form.action = `/articles/${id}`;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
}
</script>
@endsection
