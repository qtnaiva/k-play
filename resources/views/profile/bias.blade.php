@extends('layouts.app')
@section('title', 'My Bias — K-PLAY')

@section('content')
<div class="px-4 py-8 animate-fade-up max-w-4xl mx-auto">
    <a href="{{ route('profile.index') }}" class="text-sm text-purple-300 hover:text-pink-300 mb-4 inline-block">← Profile</a>
    <h1 class="text-3xl font-extrabold gradient-text mb-6">💜 My Bias</h1>

    @if($bias)
        <div class="glass rounded-3xl p-6 flex flex-col md:flex-row gap-6 items-center">
            <img src="{{ $bias['foto'] }}" class="w-40 h-40 rounded-2xl object-cover">
            <div>
                <h2 class="text-2xl font-bold">{{ $bias['nama'] }}</h2>
                <p class="text-pink-400">{{ $bias['grup'] }}</p>
                <p class="text-sm text-slate-400 mt-2">{{ $bias['posisi'] }} · {{ $bias['agensi'] }}</p>
                <p class="text-sm mt-2">👥 {{ $bias['followers'] }} followers</p>
                <button class="mt-4 px-5 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 font-bold text-sm">💜 Bias Terkunci</button>
            </div>
        </div>
    @else
        <p class="text-slate-500">Belum memilih bias. <a href="{{ route('idols.index') }}" class="text-pink-400">Pilih sekarang →</a></p>
    @endif

    <h2 class="text-xl font-bold mt-8 mb-3">Kandidat Bias Lain</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
        @foreach($idols as $i)
            @if($i['nama'] !== $user['bias'])
                <div class="glass rounded-xl p-3 text-center card-hover">
                    <img src="{{ $i['foto'] }}" class="w-full h-32 object-cover rounded-lg mb-2">
                    <div class="font-bold text-sm">{{ $i['nama'] }}</div>
                    <div class="text-xs text-slate-500">{{ $i['grup'] }}</div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection