@extends('layouts.app')
@section('title', 'Post — K-PLAY')

@section('content')
<div class="px-4 py-8 max-w-2xl mx-auto animate-fade-up">
    <a href="{{ route('community.index') }}" class="text-sm text-purple-300 hover:text-pink-300 mb-4 inline-block">← Kembali</a>

    <article class="glass rounded-2xl p-6">
        <div class="flex items-center gap-3 mb-4">
            <img src="{{ $post['avatar'] }}" class="w-12 h-12 rounded-full">
            <div>
                <div class="font-bold">{{ $post['user'] }}</div>
                <div class="text-xs text-slate-500">{{ $post['waktu'] }} · {{ $post['grup'] }}</div>
            </div>
        </div>
        <p class="text-lg text-slate-200">{{ $post['isi'] }}</p>
        @if($post['image'])
            <img src="{{ $post['image'] }}" class="w-full rounded-xl mt-4">
        @endif
        <div class="flex gap-6 mt-5 text-sm text-slate-400">
            <button class="hover:text-pink-400">❤️ {{ $post['likes'] }}</button>
            <span>💬 {{ $post['comments'] }}</span>
        </div>
    </article>

    <div class="mt-6 space-y-3">
        <h3 class="font-bold">Komentar</h3>
        @foreach($comments as $c)
            <div class="glass rounded-xl p-4 flex gap-3">
                <img src="{{ $c['avatar'] }}" class="w-10 h-10 rounded-full">
                <div class="flex-1">
                    <div class="text-sm font-bold">{{ $c['user'] }}</div>
                    <div class="text-xs text-slate-500">{{ $c['waktu'] }}</div>
                    <p class="text-sm mt-1">{{ $c['isi'] }}</p>
                </div>
            </div>
        @endforeach

        <form class="glass rounded-xl p-4 flex gap-3 mt-3">
            <input type="text" placeholder="Tulis komentar..." class="flex-1 bg-slate-800/50 border border-slate-700 rounded-lg px-4 py-2 text-sm focus:outline-none focus:border-pink-500">
            <button type="button" class="px-4 py-2 rounded-lg bg-gradient-to-r from-pink-500 to-purple-600 font-bold text-sm">Kirim</button>
        </form>
    </div>
</div>
@endsection