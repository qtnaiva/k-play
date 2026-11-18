@extends('layouts.app')
@section('title', 'Favorite Groups — K-PLAY')

@section('content')
<div class="px-4 py-8 animate-fade-up max-w-4xl mx-auto">
    <a href="{{ route('profile.index') }}" class="text-sm text-purple-300 hover:text-pink-300 mb-4 inline-block">← Profile</a>
    <h1 class="text-3xl font-extrabold gradient-text mb-6">🎵 Favorite Groups</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
        @foreach($groups as $g)
            <div class="glass rounded-xl p-4 flex items-center gap-3">
                <div class="w-14 h-14 rounded-xl bg-gradient-to-br {{ $g['warna'] }}"></div>
                <div class="flex-1">
                    <h3 class="font-bold">{{ $g['nama'] }}</h3>
                    <p class="text-xs text-slate-500">{{ $g['agensi'] }}</p>
                </div>
                @if(in_array($g['nama'], $user['favorite_groups']))
                    <span class="text-pink-400 text-xl">💜</span>
                @else
                    <button class="text-sm text-slate-500 hover:text-pink-400">+ Favorit</button>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection