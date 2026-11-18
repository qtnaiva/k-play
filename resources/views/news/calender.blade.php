@extends('layouts.app')
@section('title', 'Comeback Calendar — K-PLAY')

@section('content')
<div class="px-4 py-8">
    <div class="flex justify-between items-center mb-6" data-aos="fade-down">
        <div>
            <h1 class="text-3xl font-extrabold gradient-text">Comeback Calendar</h1>
            <p class="text-slate-400">Jadwal comeback grup K-Pop terbaru</p>
        </div>
        <a href="{{ route('news.index') }}" class="text-sm text-purple-300 hover:text-pink-300">← News</a>
    </div>

    <div class="space-y-4">
        @foreach($comebacks as $i => $c)
            <div class="glass rounded-2xl p-5 flex flex-col md:flex-row md:items-center gap-4
                        border-l-4 border-l-purple-500 hover:border-l-pink-500 transition"
                 data-aos="fade-right" data-aos-delay="{{ $i * 100 }}">
                <div class="md:w-32 flex-shrink-0">
                    <div class="text-3xl font-extrabold gradient-text">{{ date('d', strtotime($c['tanggal'])) }}</div>
                    <div class="text-xs uppercase text-slate-500">{{ date('M Y', strtotime($c['tanggal'])) }}</div>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-lg">{{ $c['judul'] }}</h3>
                    <p class="text-sm text-pink-400 font-semibold">{{ $c['grup'] }}</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-purple-500/20 text-purple-300 text-xs font-bold">
                    {{ $c['type'] }}
                </span>
            </div>
        @endforeach
    </div>
</div>
@endsection