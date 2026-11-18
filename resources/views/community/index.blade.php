@extends('layouts.app')
@section('title', 'Community — K-PLAY')

@section('content')
<div class="px-4 py-8 grid md:grid-cols-3 gap-6">
    {{-- Feed --}}
    <div class="md:col-span-2 space-y-4">
        <h1 class="text-3xl font-extrabold gradient-text" data-aos="fade-down">Community</h1>

        {{-- Form --}}
        <form method="POST" action="{{ route('community.store') }}"
              class="glass rounded-2xl p-4" data-aos="fade-up">
            @csrf
            <textarea name="isi" rows="3" placeholder="Apa yang kamu pikirkan tentang K-Pop hari ini? 💜"
                class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3
                       focus:border-pink-500 focus:outline-none transition"></textarea>
            <div class="flex justify-between items-center mt-3 gap-2">
                <select name="grup" class="bg-slate-800/50 border border-slate-700 rounded-lg px-3 py-2 text-sm">
                    <option value="">Pilih grup (opsional)</option>
                    @foreach(['BTS','BLACKPINK','SEVENTEEN','IVE','aespa','Stray Kids'] as $g)
                        <option>{{ $g }}</option>
                    @endforeach
                </select>
                <button class="px-5 py-2 rounded-full bg-gradient-to-r from-pink-500 to-purple-600
                               font-bold text-sm hover:scale-105 transition">
                    Post
                </button>
            </div>
        </form>

        {{-- Posts --}}
        @foreach($posts as $i => $p)
            <article class="glass rounded-2xl p-5"
                     data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-center gap-3 mb-3">
                    <img src="{{ $p['avatar'] }}" class="w-11 h-11 rounded-full ring-2 ring-purple-500/30">
                    <div>
                        <div class="font-bold">{{ $p['user'] }}</div>
                        <div class="text-xs text-slate-500">{{ $p['waktu'] }} · {{ $p['grup'] }}</div>
                    </div>
                </div>
                <p class="text-slate-200">{{ $p['isi'] }}</p>
                @if($p['image'])
                    <div class="overflow-hidden rounded-xl mt-3">
                        <img src="{{ $p['image'] }}" class="w-full object-cover max-h-96 hover:scale-105 transition duration-500">
                    </div>
                @endif
                <div class="flex gap-6 mt-4 text-sm text-slate-400">
                    <button class="hover:text-pink-400 transition">❤️ {{ $p['likes'] }}</button>
                    <a href="{{ route('community.show', $p['id']) }}" class="hover:text-pink-400 transition">💬 {{ $p['comments'] }}</a>
                    <button class="hover:text-pink-400 transition">↗ Share</button>
                </div>
            </article>
        @endforeach
    </div>

    {{-- Sidebar --}}
    <aside class="space-y-4">
        <div class="glass rounded-2xl p-5" data-aos="fade-left">
            <h3 class="font-bold mb-3">🔥 Trending</h3>
            <ul class="space-y-2 text-sm">
                <li class="flex justify-between"><span>#BTSButterfly</span><span class="text-slate-500">52K</span></li>
                <li class="flex justify-between"><span>#BLACKPINKTour</span><span class="text-slate-500">41K</span></li>
                <li class="flex justify-between"><span>#SEVENTEENcomeback</span><span class="text-slate-500">33K</span></li>
            </ul>
        </div>
        <div class="glass rounded-2xl p-5" data-aos="fade-left" data-aos-delay="100">
            <h3 class="font-bold mb-3">💜 Suggested Follows</h3>
            @foreach(['Rina','Dimas','Sari'] as $name)
                <div class="flex items-center justify-between py-2">
                    <div class="flex items-center gap-2">
                        <img src="https://i.pravatar.cc/50?u={{ $name }}" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-semibold">{{ $name }}</span>
                    </div>
                    <button class="text-xs text-pink-400 font-bold hover:scale-110 transition">Follow</button>
                </div>
            @endforeach
        </div>
    </aside>
</div>
@endsection