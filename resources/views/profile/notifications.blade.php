@extends('layouts.app')
@section('title', 'Notifications — K-PLAY')

@section('content')
<div class="px-4 py-8 animate-fade-up max-w-2xl mx-auto">
    <a href="{{ route('profile.index') }}" class="text-sm text-purple-300 hover:text-pink-300 mb-4 inline-block">← Profile</a>
    <h1 class="text-3xl font-extrabold gradient-text mb-6">🔔 Notifikasi</h1>

    <div class="space-y-2">
        @foreach($notifs as $n)
            <div class="glass rounded-xl p-4 flex items-center gap-3 {{ !$n['read'] ? 'border-l-4 border-l-pink-500' : '' }}">
                <img src="{{ $n['avatar'] }}" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <div class="text-sm"><span class="font-bold">{{ $n['user'] }}</span> {{ $n['isi'] }}</div>
                    <div class="text-xs text-slate-500">{{ $n['waktu'] }}</div>
                </div>
                @if(!$n['read'])
                    <span class="w-2 h-2 rounded-full bg-pink-500"></span>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection