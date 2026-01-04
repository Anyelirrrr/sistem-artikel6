@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8 max-w-3xl">

    {{-- BUTTON KEMBALI --}}
    <div class="mb-6">
        <a href="{{ auth()->check() && auth()->user()->role === 'admin'
                ? route('dashboard')
                : route('articles.index') }}"
           class="inline-flex items-center gap-2
                  bg-[#6F4E37] text-white px-4 py-2 rounded-lg
                  hover:bg-[#5a3e2b] transition text-sm">

            ← Kembali
        </a>
    </div>

    {{-- FOTO ARTIKEL --}}
    <img src="{{ asset('storage/' . $article->image) }}"
         class="rounded-xl mb-6 w-full h-64 object-cover">

    {{-- LABEL JENIS --}}
    <span class="text-sm text-white px-3 py-1 rounded
        {{ $article->jenis === 'ilmiah' ? 'bg-blue-600' : 'bg-green-600' }}">
        {{ ucfirst($article->jenis) }}
    </span>

    {{-- JUDUL --}}
    <h1 class="text-3xl font-bold text-[#6F4E37] mt-4">
        {{ $article->judul }}
    </h1>

    {{-- KONTEN --}}
    <p class="text-gray-700 mt-6 leading-relaxed">
        {{ $article->konten }}
    </p>

</div>
@endsection
