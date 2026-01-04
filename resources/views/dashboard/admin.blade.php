@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h2 class="font-bold text-xl text-[#6F4E37] mb-6">
        Dashboard Admin
    </h2>

    <div class="bg-white rounded-xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">
            Manajemen Artikel
        </h3>

        <div class="flex gap-3">
            <a href="{{ route('articles.create') }}"
               class="bg-[#6F4E37] hover:bg-[#5a3e2b] text-white px-4 py-2 rounded transition">
                + Tambah Artikel
            </a>

            <a href="{{ route('articles.index') }}"
               class="bg-[#A67C52] hover:bg-[#8c6844] text-white px-4 py-2 rounded transition">
                Lihat Artikel
            </a>
        </div>
    </div>

</div>
@endsection
