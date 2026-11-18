@extends('layouts.app')

@section('content')
<div class="px-4 py-8 space-y-20">

    {{-- ============ HERO ============ --}}
    <section class="relative rounded-3xl p-[2px] animated-border overflow-hidden" data-aos="fade-up">
        <div class="rounded-3xl bg-ink-900/90 p-10 md:p-16 relative overflow-hidden">
            
            {{-- Floating particles --}}
            <div class="absolute top-10 right-20 w-2 h-2 rounded-full bg-neon-pink float"></div>
            <div class="absolute top-32 right-40 w-3 h-3 rounded-full bg-neon-cyan float float-delay-1"></div>
            <div class="absolute bottom-20 right-20 w-2 h-2 rounded-full bg-neon-purple float float-delay-2"></div>
            <div class="absolute top-1/2 right-10 w-1.5 h-1.5 rounded-full bg-neon-pink float float-delay-3"></div>

            {{-- Glow blobs --}}
            <div class="absolute -bottom-20 -right-10 w-96 h-96 bg-neon-pink/30 blur-3xl rounded-full animate-pulse"></div>
            <div class="absolute -top-20 -right-40 w-96 h-96 bg-neon-cyan/20 blur-3xl rounded-full"></div>

            <div class="relative z-10 max-w-2xl">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-neon-pink/20 border border-neon-pink/40 text-neon-pink text-xs font-bold uppercase tracking-wider mb-5"
                      data-aos="fade-right" data-aos-delay="100">
                    <span class="w-2 h-2 rounded-full bg-neon-pink pulse-glow"></span>
                    Trending Now
                </span>
                <h1 class="text-5xl md:text-7xl font-display font-bold leading-[1.05] mb-5"
                    data-aos="fade-right" data-aos-delay="200">
                    Selamat Datang di<br>
                    <span class="gradient-text">K-PLAY</span>
                </h1>
                <p class="text-lg text-slate-300 max-w-xl mb-8"
                   data-aos="fade-right" data-aos-delay="300">
                    Komunitas kreatif pecinta K-Pop — fanart, cover dance, edit video, dan diskusi seru bareng.
                </p>
                <div class="flex flex-wrap gap-3"
                     data-aos="fade-right" data-aos-delay="400">
                    <a href="{{ route('community.index') }}"
                       class="group px-7 py-3.5 rounded-full bg-gradient-to-r from-neon-pink to-neon-violet font-bold hover:shadow-2xl hover:shadow-neon-pink/50 transition-all duration-300 hover:scale-105 flex items-center gap-2">
                        Gabung Community
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </a>
                    <a href="{{ route('gallery.index') }}"
                       class="px-7 py-3.5 rounded-full border border-neon-cyan/40 font-bold hover:bg-neon-cyan/10 hover:border-neon-cyan transition-all duration-300 text-slate-200">
                        Lihat Gallery
                    </a>
                </div>
            </div>

            {{-- Big floating K --}}
            <div class="hidden lg:block absolute right-10 top-1/2 -translate-y-1/2 text-[20rem] font-display font-bold leading-none gradient-text opacity-20 select-none float">
                K
            </div>
        </div>
    </section>

    {{-- ============ MARQUEE ============ --}}
    <section class="-mx-4 py-6 border-y border-neon-violet/20 bg-ink-900/40 overflow-hidden" data-aos="fade-up">
        <div class="marquee">
            @php
                $items = ['BTS', 'BLACKPINK', 'SEVENTEEN', 'IVE', 'aespa', 'Stray Kids', 'TWICE', 'NewJeans', 'EXO', 'NCT'];
            @endphp
            <div class="marquee-content">
                @foreach($items as $name)
                    <span class="text-2xl font-display font-bold text-slate-600 hover:text-neon-pink transition-colors cursor-default flex items-center gap-4">
                        {{ $name }}
                        <span class="text-neon-pink">✦</span>
                    </span>
                @endforeach
            </div>
            <div class="marquee-content" aria-hidden="true">
                @foreach($items as $name)
                    <span class="text-2xl font-display font-bold text-slate-600 hover:text-neon-pink transition-colors cursor-default flex items-center gap-4">
                        {{ $name }}
                        <span class="text-neon-pink">✦</span>
                    </span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ TRENDING SWIPER ============ --}}
    <section data-aos="fade-up">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-display font-bold">🔥 Trending Now</h2>
                <p class="text-slate-400 text-sm mt-1">Lagu & idol paling hot minggu ini</p>
            </div>
            <a href="{{ route('idols.index') }}" class="text-sm text-neon-pink hover:text-neon-cyan transition flex items-center gap-1 group">
                Lihat semua
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        <div class="swiper trendingSwiper !pb-14">
            <div class="swiper-wrapper">
                @foreach($trending as $t)
                    <div class="swiper-slide">
                        <div class="card-neon glass rounded-2xl p-5 h-full">
                            <div class="flex items-start justify-between mb-3">
                                <div class="text-5xl font-display font-bold gradient-text leading-none">#{{ $t['rank'] }}</div>
                                <span class="text-xs font-bold px-2.5 py-1 rounded-full
                                    {{ str_starts_with($t['change'], '+') ? 'bg-emerald-500/20 text-emerald-400' : (str_starts_with($t['change'], '-') ? 'bg-rose-500/20 text-rose-400' : 'bg-slate-500/20 text-slate-400') }}">
                                    {{ $t['change'] }}
                                </span>
                            </div>
                            <h3 class="font-bold text-lg line-clamp-1 mt-2">{{ $t['judul'] }}</h3>
                            <p class="text-sm text-neon-pink font-semibold">{{ $t['artist'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    {{-- ============ NEWS ============ --}}
    <section>
        <div class="flex justify-between items-center mb-6" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-display font-bold">📰 Berita Terbaru</h2>
                <p class="text-slate-400 text-sm mt-1">Update terhangat dari dunia K-Pop</p>
            </div>
            <a href="{{ route('news.index') }}" class="text-sm text-neon-pink hover:text-neon-cyan transition flex items-center gap-1 group">
                Lihat semua
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-5">
            @foreach($news as $i => $n)
                <article class="card-neon glass rounded-2xl overflow-hidden group"
                         data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="overflow-hidden aspect-video">
                        <img src="{{ $n['image'] }}" alt=""
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                    </div>
                    <div class="p-5">
                        <span class="inline-block text-[10px] uppercase tracking-wider bg-neon-pink/20 text-neon-pink font-bold px-2 py-0.5 rounded">{{ $n['kategori'] }}</span>
                        <h3 class="font-bold mt-2 leading-snug group-hover:text-neon-pink transition line-clamp-2">{{ $n['judul'] }}</h3>
                        <p class="text-sm text-slate-400 mt-2 line-clamp-2">{{ $n['ringkasan'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </section>

    {{-- ============ GROUPS ============ --}}
    <section data-aos="fade-up">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-display font-bold">💫 Groups Populer</h2>
                <p class="text-slate-400 text-sm mt-1">Grup favorit komunitas</p>
            </div>
            <a href="{{ route('groups.index') }}" class="text-sm text-neon-pink hover:text-neon-cyan transition flex items-center gap-1 group">
                Lihat semua
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>

        <div class="swiper groupsSwiper !pb-14">
            <div class="swiper-wrapper">
                @foreach($groups as $g)
                    <div class="swiper-slide">
                        <div class="card-neon glass rounded-2xl p-5 text-center">
                            <div class="relative w-20 h-20 mx-auto mb-4">
                                <div class="absolute inset-0 rounded-full bg-gradient-to-br {{ $g['warna'] }} blur-md opacity-60"></div>
                                <div class="relative w-full h-full rounded-full bg-gradient-to-br {{ $g['warna'] }} flex items-center justify-center text-3xl font-display font-bold">
                                    {{ substr($g['nama'], 0, 1) }}
                                </div>
                            </div>
                            <h3 class="font-bold">{{ $g['nama'] }}</h3>
                            <p class="text-xs text-slate-500">{{ $g['agensi'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    {{-- ============ COMMUNITY ============ --}}
    <section>
        <div class="flex justify-between items-center mb-6" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-display font-bold">💬 Community</h2>
                <p class="text-slate-400 text-sm mt-1">Obrolan seru dari para fans</p>
            </div>
            <a href="{{ route('community.index') }}" class="text-sm text-neon-pink hover:text-neon-cyan transition flex items-center gap-1 group">
                Lihat semua
                <span class="group-hover:translate-x-1 transition-transform">→</span>
            </a>
        </div>
        <div class="grid md:grid-cols-3 gap-5">
            @foreach($posts as $i => $p)
                <div class="card-neon glass rounded-2xl p-5"
                     data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="flex items-center gap-3 mb-3">
                        <img src="{{ $p['avatar'] }}" class="w-10 h-10 rounded-full ring-2 ring-neon-pink/30">
                        <div>
                            <div class="font-bold text-sm">{{ $p['user'] }}</div>
                            <div class="text-xs text-slate-500">{{ $p['waktu'] }} · {{ $p['grup'] }}</div>
                        </div>
                    </div>
                    <p class="text-sm line-clamp-3 text-slate-300">{{ $p['isi'] }}</p>
                    <div class="mt-4 flex gap-5 text-xs text-slate-500 pt-3 border-t border-neon-violet/10">
                        <span class="flex items-center gap-1">❤️ {{ $p['likes'] }}</span>
                        <span class="flex items-center gap-1">💬 {{ $p['comments'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ CTA ============ --}}
    <section class="text-center py-12" data-aos="zoom-in">
        <h2 class="text-4xl md:text-5xl font-display font-bold mb-4">
            Siap Bergabung di <span class="gradient-text">K-PLAY?</span>
        </h2>
        <p class="text-slate-400 mb-8 max-w-xl mx-auto">Jadilah bagian dari komunitas kreatif pecinta K-Pop terbesar!</p>
        <a href="{{ route('community.index') }}"
           class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-gradient-to-r from-neon-pink to-neon-violet font-bold text-lg hover:shadow-2xl hover:shadow-neon-pink/50 hover:scale-105 transition-all duration-300">
            Mulai Sekarang
            <span>✨</span>
        </a>
    </section>

</div>
@endsection

@push('scripts')
<script>
    new Swiper('.trendingSwiper', {
        slidesPerView: 1.2,
        spaceBetween: 16,
        autoplay: { delay: 3500, disableOnInteraction: false },
        loop: true,
        pagination: { el: '.trendingSwiper .swiper-pagination', clickable: true },
        navigation: {
            nextEl: '.trendingSwiper .swiper-button-next',
            prevEl: '.trendingSwiper .swiper-button-prev',
        },
        breakpoints: {
            640: { slidesPerView: 2.2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 },
        },
        grabCursor: true,
    });

    new Swiper('.groupsSwiper', {
        slidesPerView: 2,
        spaceBetween: 16,
        autoplay: { delay: 4000, disableOnInteraction: false },
        loop: true,
        pagination: { el: '.groupsSwiper .swiper-pagination', clickable: true },
        breakpoints: {
            640: { slidesPerView: 3 },
            768: { slidesPerView: 4 },
            1024: { slidesPerView: 6 },
        },
        grabCursor: true,
    });
</script>
@endpush