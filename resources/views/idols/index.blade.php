@extends('layouts.app')
@section('title', 'Idols — K-PLAY')

@section('content')
<div class="px-4 py-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4 mb-8" data-aos="fade-down">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neon-pink/20 border border-neon-pink/40 text-neon-pink text-xs font-bold uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-neon-pink pulse-glow"></span>
                    Idols
                </span>
                <span class="text-xs text-slate-500">{{ count($idols) }} idol terdaftar</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold gradient-text">K-Pop Idols</h1>
            <p class="text-slate-400 mt-2">Profil idol K-Pop favoritmu di komunitas K-PLAY</p>
        </div>

        {{-- Toggle Idols / Groups --}}
        <div class="flex gap-2 p-1 rounded-full glass self-start">
            <a href="{{ route('idols.index') }}"
               class="px-5 py-2 rounded-full font-bold text-sm bg-gradient-to-r from-neon-pink to-neon-violet text-white shadow-lg shadow-neon-pink/30">
                👤 Idols
            </a>
            <a href="{{ route('groups.index') }}"
               class="px-5 py-2 rounded-full font-bold text-sm transition text-slate-300 hover:text-neon-pink">
                🎵 Groups
            </a>
        </div>
    </div>

    {{-- SEARCH & FILTER BAR --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6" data-aos="fade-up">
        <div class="relative flex-1">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input type="text" id="idolSearch" placeholder="Cari nama idol atau grup..."
                   class="w-full bg-ink-900/60 border border-neon-violet/30 rounded-full pl-12 pr-4 py-3 text-sm focus:border-neon-pink focus:outline-none focus:ring-2 focus:ring-neon-pink/30 transition">
        </div>
        <select id="idolSort"
                class="bg-ink-900/60 border border-neon-violet/30 rounded-full px-5 py-3 text-sm font-semibold focus:border-neon-pink focus:outline-none cursor-pointer">
            <option value="nama">Urutkan: Nama</option>
            <option value="grup">Urutkan: Grup</option>
            <option value="followers">Urutkan: Followers</option>
            <option value="trending">Urutkan: Trending</option>
        </select>
    </div>

    {{-- FILTER PILLS --}}
    <div class="flex gap-2 overflow-x-auto scrollbar-hide mb-8 pb-2" data-aos="fade-up">
        <button class="filter-pill active" data-filter="all">Semua</button>
        <button class="filter-pill" data-filter="trending">🔥 Trending</button>
        @php $grups = array_unique(array_column($idols, 'grup')); @endphp
        @foreach($grups as $g)
            <button class="filter-pill" data-filter="{{ strtolower($g) }}">{{ $g }}</button>
        @endforeach
    </div>

    {{-- GRID IDOLS --}}
    <div id="idolsGrid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-5">
        @foreach($idols as $i => $idol)
            <a href="{{ route('idols.show', $idol['id']) }}"
               class="idol-card card-neon glass rounded-2xl overflow-hidden block group"
               data-nama="{{ strtolower($idol['nama']) }}"
               data-grup="{{ strtolower($idol['grup']) }}"
               data-followers="{{ $idol['followers'] }}"
               data-trending="{{ $idol['trending'] ? '1' : '0' }}"
               data-aos="zoom-in-up"
               data-aos-delay="{{ ($i % 4) * 80 }}">

                {{-- Photo --}}
                <div class="relative overflow-hidden aspect-[3/4]">
                    <img src="{{ $idol['foto'] }}" alt="{{ $idol['nama'] }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                    {{-- Gradient overlay --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-transparent to-transparent opacity-90"></div>

                    {{-- Trending badge --}}
                    @if($idol['trending'])
                        <div class="absolute top-2 left-2 px-2 py-1 rounded-full bg-gradient-to-r from-neon-pink to-neon-violet text-[10px] font-bold text-white shadow-lg flex items-center gap-1">
                            <span class="w-1 h-1 rounded-full bg-white animate-pulse"></span>
                            TRENDING
                        </div>
                    @endif

                    {{-- Group badge --}}
                    <div class="absolute top-2 right-2 px-2 py-1 rounded-full glass text-[10px] font-bold text-neon-cyan border border-neon-cyan/40">
                        {{ $idol['grup'] }}
                    </div>

                    {{-- Info di bawah foto --}}
                    <div class="absolute bottom-0 left-0 right-0 p-3">
                        <h3 class="font-display font-bold text-lg leading-tight group-hover:text-neon-pink transition">
                            {{ $idol['nama'] }}
                        </h3>
                        <p class="text-xs text-slate-400">{{ $idol['posisi'] }}</p>
                    </div>
                </div>

                {{-- Stats footer --}}
                <div class="px-3 py-2.5 flex items-center justify-between text-xs border-t border-neon-violet/10">
                    <span class="text-slate-500 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        {{ $idol['followers'] }}
                    </span>
                    <span class="text-neon-pink group-hover:translate-x-1 transition-transform">→</span>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Empty state --}}
    <div id="emptyState" class="hidden text-center py-16">
        <div class="text-6xl mb-4">🔍</div>
        <h3 class="text-xl font-display font-bold mb-2">Tidak ada idol ditemukan</h3>
        <p class="text-slate-400 text-sm">Coba kata kunci atau filter lain</p>
    </div>

</div>
@endsection

@push('scripts')
<style>
    .filter-pill {
        padding: 0.5rem 1.25rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 700;
        white-space: nowrap;
        background: rgba(18, 10, 46, 0.6);
        border: 1px solid rgba(139, 92, 246, 0.25);
        color: #cbd5e1;
        cursor: pointer;
        transition: all .2s;
    }
    .filter-pill:hover {
        border-color: rgba(255, 45, 149, 0.5);
        color: #ff2d95;
    }
    .filter-pill.active {
        background: linear-gradient(90deg, #ff2d95, #8b5cf6);
        border-color: transparent;
        color: #fff;
        box-shadow: 0 4px 20px -4px rgba(255, 45, 149, 0.5);
    }
</style>

<script>
    const idolSearch = document.getElementById('idolSearch');
    const idolSort   = document.getElementById('idolSort');
    const idolGrid   = document.getElementById('idolsGrid');
    const idolEmpty  = document.getElementById('emptyState');
    const pills      = document.querySelectorAll('.filter-pill');

    let activeFilter = 'all';

    function applyIdolFilterSort() {
        const q = (idolSearch.value || '').toLowerCase().trim();
        const sortBy = idolSort.value;
        let cards = Array.from(idolGrid.querySelectorAll('.idol-card'));

        // Sort
        cards.sort((a, b) => {
            const aVal = a.dataset[sortBy] || '';
            const bVal = b.dataset[sortBy] || '';
            if (sortBy === 'trending') {
                return Number(bVal) - Number(aVal); // trending dulu
            }
            if (sortBy === 'followers') {
                // Parse '52.3M' → 52.3
                const aNum = parseFloat(aVal) * (aVal.includes('M') ? 1 : 0.001);
                const bNum = parseFloat(bVal) * (bVal.includes('M') ? 1 : 0.001);
                return bNum - aNum;
            }
            return aVal.localeCompare(bVal);
        });

        cards.forEach(card => idolGrid.appendChild(card));

        // Filter
        let visibleCount = 0;
        cards.forEach(card => {
            const nama = card.dataset.nama || '';
            const grup = card.dataset.grup || '';
            const isTrending = card.dataset.trending === '1';

            let match = true;

            // Search filter
            if (q) match = match && (nama.includes(q) || grup.includes(q));

            // Pill filter
            if (activeFilter !== 'all') {
                if (activeFilter === 'trending') {
                    match = match && isTrending;
                } else {
                    match = match && grup === activeFilter;
                }
            }

            card.style.display = match ? '' : 'none';
            if (match) visibleCount++;
        });

        idolEmpty.classList.toggle('hidden', visibleCount !== 0);
    }

    idolSearch?.addEventListener('input', applyIdolFilterSort);
    idolSort?.addEventListener('change', applyIdolFilterSort);

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            pills.forEach(p => p.classList.remove('active'));
            pill.classList.add('active');
            activeFilter = pill.dataset.filter;
            applyIdolFilterSort();
        });
    });
</script>
@endpush