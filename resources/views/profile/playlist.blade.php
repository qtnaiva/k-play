@extends('layouts.app')
@section('title', 'Playlist — K-PLAY')

@section('content')
<div class="px-4 py-8 animate-fade-up max-w-3xl mx-auto">
    <a href="{{ route('profile.index') }}" class="text-sm text-purple-300 hover:text-pink-300 mb-4 inline-block">← Profile</a>
    <h1 class="text-3xl font-extrabold gradient-text mb-6">🎧 My Playlist</h1>

    <div class="glass rounded-2xl overflow-hidden">
        @foreach($playlist as $i => $p)
            <div class="flex items-center gap-4 p-4 {{ $i !== count($playlist)-1 ? 'border-b border-slate-800' : '' }} hover:bg-purple-500/10 transition">
                <span class="text-lg font-extrabold gradient-text w-8">{{ $i + 1 }}</span>
                <div class="flex-1">
                    <div class="font-bold">{{ $p['judul'] }}</div>
                    <div class="text-sm text-slate-500">{{ $p['artist'] }}</div>
                </div>
                <span class="text-xs text-slate-500">{{ $p['durasi'] }}</span>
                <button class="text-pink-400 text-xl">▶</button>
            </div>
        @endforeach
    </div>
</div>
@endsection