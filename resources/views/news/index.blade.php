@extends('layouts.app')
@section('title', 'News — K-PLAY')

@section('content')
<div class="px-4 py-8">
    <div class="flex justify-between items-center mb-6 flex-wrap gap-3" data-aos="fade-down">
        <div>
            <h1 class="text-3xl font-extrabold gradient-text">News & Comeback</h1>
            <p class="text-slate-400">Berita terbaru seputar dunia K-Pop</p>
        </div>
        <a href="{{ route('news.calendar') }}"
           class="px-4 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 font-bold text-sm hover:scale-105 transition">
            📅 Comeback Calendar
        </a>
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        @foreach($news as $i => $n)
            <article class="card-hover glass rounded-2xl overflow-hidden"
                     data-aos="{{ $i % 2 === 0 ? 'fade-right' : 'fade-left' }}"
                     data-aos-delay="{{ intval($i / 2) * 100 }}">
                <div class="overflow-hidden">
                    <img src="{{ $n['image'] }}" class="w-full h-48 object-cover hover:scale-110 transition duration-500">
                </div>
                <div class="p-5">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="text-xs uppercase text-pink-400 font-bold">{{ $n['kategori'] }}</span>
                        <span class="text-xs text-slate-500">· {{ $n['tanggal'] }}</span>
                    </div>
                    <h3 class="font-bold text-lg leading-tight">{{ $n['judul'] }}</h3>
                    <p class="text-sm text-slate-400 mt-2">{{ $n['ringkasan'] }}</p>
                    <div class="mt-3 text-xs text-slate-500">🏷️ {{ $n['grup'] }}</div>
                </div>
            </article>
        @endforeach
    </div>
</div>
@endsection