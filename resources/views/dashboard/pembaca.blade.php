@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-6">

    <h2 class="font-bold text-xl text-[#6F4E37] mb-6">
        Dashboard Pembaca
    </h2>

    <div class="bg-white rounded-xl shadow p-6">
        <p class="mb-4 text-gray-700">
            Selamat datang, <strong>{{ auth()->user()->name }}</strong> 👋
        </p>

        <a href="{{ route('articles.index') }}"
           class="inline-block bg-[#6F4E37] text-white px-4 py-2 rounded hover:bg-[#5c3f2d] transition">
            Baca Artikel
        </a>
    </div>

</div>
@endsection
