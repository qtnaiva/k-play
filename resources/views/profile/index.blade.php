@extends('layouts.app')
@section('title', 'Profile — K-PLAY')

@section('content')
<div class="px-4 py-8 max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="glass rounded-3xl p-8 flex flex-col md:flex-row items-center gap-6"
         data-aos="zoom-in">
        <img src="{{ $user['avatar'] }}"
             class="w-28 h-28 rounded-full border-4 border-purple-500/40 hover:scale-105 transition"
             data-aos="zoom-in" data-aos-delay="100">
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-3xl font-extrabold">{{ $user['nama'] }}</h1>
            <p class="text-slate-400">{{ $user['username'] }}</p>
            <p class="text-sm mt-2">{{ $user['bio'] }}</p>
            <div class="flex gap-6 mt-4 justify-center md:justify-start text-sm">
                <div><span class="font-bold">{{ $user['posts'] }}</span> <span class="text-slate-500">Posts</span></div>
                <div><span class="font-bold">{{ $user['followers'] }}</span> <span class="text-slate-500">Followers</span></div>
                <div><span class="font-bold">{{ $user['following'] }}</span> <span class="text-slate-500">Following</span></div>
            </div>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-6">
        @php
            $menus = [
                ['route'=>'profile.bias',          'icon'=>'💜', 'label'=>'My Bias'],
                ['route'=>'profile.groups',        'icon'=>'🎵', 'label'=>'Groups'],
                ['route'=>'profile.playlist',      'icon'=>'🎧', 'label'=>'Playlist'],
                ['route'=>'profile.notifications', 'icon'=>'🔔', 'label'=>'Notif'],
            ];
        @endphp
        @foreach($menus as $i => $m)
            <a href="{{ route($m['route']) }}"
               class="glass rounded-xl p-4 text-center card-hover block"
               data-aos="zoom-in" data-aos-delay="{{ $i * 100 }}">
                <div class="text-2xl">{{ $m['icon'] }}</div>
                <div class="text-sm font-bold mt-1">{{ $m['label'] }}</div>
            </a>
        @endforeach
    </div>

    {{-- Activity --}}
    <div class="mt-6" data-aos="fade-up">
        <h2 class="text-xl font-bold mb-3">Riwayat Aktivitas</h2>
        <div class="space-y-2">
            @foreach($activity as $i => $a)
                <div class="glass rounded-xl p-4 flex justify-between items-center
                            hover:border-pink-400/40 transition"
                     data-aos="fade-right" data-aos-delay="{{ $i * 80 }}">
                    <div>
                        <span class="font-semibold">{{ $a['aksi'] }}</span>
                        <span class="text-slate-400 text-sm">— {{ $a['detail'] }}</span>
                    </div>
                    <span class="text-xs text-slate-500">{{ $a['waktu'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection