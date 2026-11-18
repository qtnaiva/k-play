@extends('layouts.app')
@section('title', $idol['nama'] . ' — K-PLAY')

@section('content')
<div class="px-4 py-8">

    {{-- BREADCRUMB --}}
    <nav class="flex items-center gap-2 text-sm text-slate-500 mb-6" data-aos="fade-right">
        <a href="{{ route('home') }}" class="hover:text-neon-pink transition">Home</a>
        <span>→</span>
        <a href="{{ route('idols.index') }}" class="hover:text-neon-pink transition">Idols</a>
        <span>→</span>
        <span class="text-neon-pink">{{ $idol['nama'] }}</span>
    </nav>

    <div class="grid lg:grid-cols-5 gap-6">

        {{-- LEFT: PHOTO --}}
        <div class="lg:col-span-2" data-aos="fade-right">
            <div class="relative rounded-3xl overflow-hidden glass">
                <div class="relative aspect-[3/4]">
                    <img src="{{ $idol['foto'] }}" alt="{{ $idol['nama'] }}"
                         class="w-full h-full object-cover">

                    {{-- Gradient overlay bawah --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-transparent to-transparent"></div>

                    {{-- Trending badge --}}
                    @if($idol['trending'])
                        <div class="absolute top-4 left-4 px-3 py-1.5 rounded-full bg-gradient-to-r from-neon-pink to-neon-violet text-xs font-bold text-white shadow-lg flex items-center gap-1.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                            TRENDING
                        </div>
                    @endif

                    {{-- Group badge --}}
                    <div class="absolute top-4 right-4 px-3 py-1.5 rounded-full glass text-xs font-bold text-neon-cyan border border-neon-cyan/40">
                        {{ $idol['grup'] }}
                    </div>

                    {{-- Bottom info --}}
                    <div class="absolute bottom-0 left-0 right-0 p-5">
                        <h1 class="text-3xl font-display font-bold leading-tight">{{ $idol['nama'] }}</h1>
                        <p class="text-neon-pink font-semibold text-sm mt-1">{{ $idol['posisi'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- RIGHT: DETAILS --}}
        <div class="lg:col-span-3 space-y-5">

            {{-- BIO CARD --}}
            <div class="glass rounded-2xl p-6" data-aos="fade-left">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-8 h-8 rounded-lg bg-neon-pink/20 flex items-center justify-center text-neon-pink">
                        ✨
                    </div>
                    <h2 class="font-display font-bold text-lg">Tentang {{ $idol['nama'] }}</h2>
                </div>
                <p class="text-slate-300 leading-relaxed">
                    {{ $idol['nama'] }} adalah idol K-Pop dari grup <span class="text-neon-pink font-bold">{{ $idol['grup'] }}</span>
                    di bawah agensi <span class="text-neon-cyan font-bold">{{ $idol['agensi'] }}</span>.
                    Saat ini menjabat sebagai <span class="text-neon-violet font-bold">{{ $idol['posisi'] }}</span>
                    dengan <span class="text-neon-pink font-bold">{{ $idol['followers'] }}</span> followers.
                </p>
            </div>

            {{-- STATS GRID --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3" data-aos="fade-left" data-aos-delay="100">
                <div class="glass rounded-xl p-4 text-center">
                    <div class="text-[10px] uppercase text-slate-500 font-bold mb-1">Grup</div>
                    <div class="font-display font-bold text-neon-pink">{{ $idol['grup'] }}</div>
                </div>
                <div class="glass rounded-xl p-4 text-center">
                    <div class="text-[10px] uppercase text-slate-500 font-bold mb-1">Agensi</div>
                    <div class="font-display font-bold text-neon-cyan">{{ $idol['agensi'] }}</div>
                </div>
                <div class="glass rounded-xl p-4 text-center">
                    <div class="text-[10px] uppercase text-slate-500 font-bold mb-1">Posisi</div>
                    <div class="font-display font-bold text-neon-violet text-sm">{{ $idol['posisi'] }}</div>
                </div>
                <div class="glass rounded-xl p-4 text-center">
                    <div class="text-[10px] uppercase text-slate-500 font-bold mb-1">Followers</div>
                    <div class="font-display font-bold text-white">{{ $idol['followers'] }}</div>
                </div>
            </div>

            {{-- ACTION BUTTONS --}}
            <div class="flex flex-wrap gap-3" data-aos="fade-left" data-aos-delay="200">
                <button id="setBiasBtn"
                        class="flex-1 min-w-[160px] px-6 py-3.5 rounded-xl bg-gradient-to-r from-neon-pink to-neon-violet font-bold text-sm hover:shadow-lg hover:shadow-neon-pink/50 hover:scale-[1.02] transition flex items-center justify-center gap-2 group">
                    <span class="group-hover:scale-125 transition">💜</span>
                    Set as Bias
                </button>
                <button id="followBtn"
                        class="flex-1 min-w-[160px] px-6 py-3.5 rounded-xl border border-neon-cyan/40 text-neon-cyan font-bold text-sm hover:bg-neon-cyan/10 transition flex items-center justify-center gap-2">
                    <span>+</span>
                    Follow
                </button>
                <button id="shareBtn"
                        class="px-6 py-3.5 rounded-xl border border-neon-violet/40 text-slate-300 font-bold text-sm hover:bg-neon-violet/10 transition">
                    ↗ Share
                </button>
            </div>

            {{-- BIAS HISTORY --}}
            <div class="glass rounded-2xl p-6" data-aos="fade-left" data-aos-delay="300">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-neon-violet/20 flex items-center justify-center">🎵</div>
                    <h2 class="font-display font-bold text-lg">Lagu Populer</h2>
                </div>
                <div class="space-y-2">
                    @foreach([
                        ['judul' => 'Butterfly Effect', 'durasi' => '3:24'],
                        ['judul' => 'Seven (feat. Latto)', 'durasi' => '3:04'],
                        ['judul' => 'Left and Right', 'durasi' => '2:45'],
                        ['judul' => 'Standing Next to You', 'durasi' => '3:26'],
                    ] as $idx => $song)
                        <div class="flex items-center gap-3 p-2.5 rounded-lg hover:bg-neon-violet/10 transition group cursor-pointer">
                            <span class="font-display font-bold text-neon-pink w-6 text-center">{{ $idx + 1 }}</span>
                            <div class="flex-1">
                                <div class="font-semibold text-sm group-hover:text-neon-pink transition">{{ $song['judul'] }}</div>
                            </div>
                            <span class="text-xs text-slate-500">{{ $song['durasi'] }}</span>
                            <button class="text-neon-pink opacity-0 group-hover:opacity-100 transition">▶</button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RELATED IDOLS --}}
            <div class="glass rounded-2xl p-6" data-aos="fade-left" data-aos-delay="400">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-neon-cyan/20 flex items-center justify-center">👥</div>
                    <h2 class="font-display font-bold text-lg">Idol Lainnya</h2>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    @foreach(array_slice(array_filter(\App\Http\Controllers\Data\DummyData::idols(), fn($i) => $i['id'] !== $idol['id']), 0, 3) as $other)
                        <a href="{{ route('idols.show', $other['id']) }}" class="text-center group">
                            <div class="relative aspect-square rounded-xl overflow-hidden mb-2">
                                <img src="{{ $other['foto'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-ink-950/80 to-transparent"></div>
                            </div>
                            <div class="text-xs font-bold group-hover:text-neon-pink transition">{{ $other['nama'] }}</div>
                            <div class="text-[10px] text-slate-500">{{ $other['grup'] }}</div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // SET BIAS
    document.getElementById('setBiasBtn')?.addEventListener('click', function() {
        this.innerHTML = '<span class="animate-pulse">💜</span> Bias Terkunci!';
        this.classList.add('ring-2', 'ring-neon-cyan');
        showToast('{{ $idol["nama"] }} jadi bias kamu! 💜');
    });

    // FOLLOW
    let following = false;
    document.getElementById('followBtn')?.addEventListener('click', function() {
        following = !following;
        if (following) {
            this.innerHTML = '<span>✓</span> Following';
            this.classList.remove('border-neon-cyan/40', 'text-neon-cyan');
            this.classList.add('bg-neon-cyan', 'text-ink-950', 'border-transparent');
            showToast('Kamu mengikuti {{ $idol["nama"] }}! ✨');
        } else {
            this.innerHTML = '<span>+</span> Follow';
            this.classList.remove('bg-neon-cyan', 'text-ink-950', 'border-transparent');
            this.classList.add('border-neon-cyan/40', 'text-neon-cyan');
        }
    });

    // SHARE
    document.getElementById('shareBtn')?.addEventListener('click', () => {
        const url = window.location.href;
        if (navigator.share) {
            navigator.share({ title: '{{ $idol["nama"] }} — K-PLAY', url: url });
        } else {
            navigator.clipboard.writeText(url);
            showToast('Link disalin! 📋');
        }
    });
</script>
@endpush