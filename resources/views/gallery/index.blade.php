@extends('layouts.app')
@section('title', 'Gallery — K-PLAY')

@section('content')
<div class="px-4 py-8">
    <div data-aos="fade-down">
        <h1 class="text-3xl font-extrabold gradient-text mb-2">Gallery</h1>
        <p class="text-slate-400 mb-6">Foto idol, album, dan photocard pilihan komunitas</p>
    </div>

    <div class="flex gap-2 overflow-x-auto scrollbar-hide mb-6 pb-2" data-aos="fade-up">
        @foreach(['Semua','Photocard','Photoshoot','Fanart','Album','Edits'] as $cat)
            <button class="px-4 py-2 rounded-full text-sm font-bold whitespace-nowrap transition
                {{ $loop->first ? 'bg-gradient-to-r from-pink-500 to-purple-600' : 'glass hover:border-pink-400 hover:bg-purple-500/10' }}">
                {{ $cat }}
            </button>
        @endforeach
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach($gallery as $i => $g)
            <div class="card-hover glass rounded-2xl overflow-hidden group relative cursor-pointer"
                 data-aos="zoom-in" data-aos-delay="{{ ($i % 4) * 80 }}">
                <img src="{{ $g['image'] }}"
                     class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/40 to-transparent
                            opacity-0 group-hover:opacity-100 transition duration-300
                            flex flex-col justify-end p-4">
                    <div class="text-xs uppercase text-pink-400 font-bold">{{ $g['kategori'] }}</div>
                    <h3 class="font-bold">{{ $g['judul'] }}</h3>
                    <p class="text-xs text-slate-400">by {{ $g['author'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection