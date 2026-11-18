@extends('layouts.app')
@section('title', 'Groups — K-PLAY')

@section('content')
<div class="px-4 py-8">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:justify-between md:items-end gap-4 mb-8" data-aos="fade-down">
        <div>
            <div class="flex items-center gap-2 mb-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-neon-pink/20 border border-neon-pink/40 text-neon-pink text-xs font-bold uppercase tracking-wider">
                    <span class="w-1.5 h-1.5 rounded-full bg-neon-pink pulse-glow"></span>
                    Groups
                </span>
                <span class="text-xs text-slate-500">{{ count($groups) }} grup terdaftar</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-display font-bold gradient-text">K-Pop Groups</h1>
            <p class="text-slate-400 mt-2">Jelajahi semua grup K-Pop populer di komunitas K-PLAY</p>
        </div>

        {{-- Toggle Idols / Groups --}}
        <div class="flex gap-2 p-1 rounded-full glass">
            <a href="{{ route('idols.index') }}"
               class="px-5 py-2 rounded-full font-bold text-sm transition text-slate-300 hover:text-neon-pink">
                👤 Idols
            </a>
            <a href="{{ route('groups.index') }}"
               class="px-5 py-2 rounded-full font-bold text-sm bg-gradient-to-r from-neon-pink to-neon-violet text-white shadow-lg shadow-neon-pink/30">
                🎵 Groups
            </a>
        </div>
    </div>

    {{-- SEARCH & SORT BAR --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-8" data-aos="fade-up">
        <div class="relative flex-1">
            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </span>
            <input type="text" id="groupSearch" placeholder="Cari nama grup atau agensi..."
                   class="w-full bg-ink-900/60 border border-neon-violet/30 rounded-full pl-12 pr-4 py-3 text-sm focus:border-neon-pink focus:outline-none focus:ring-2 focus:ring-neon-pink/30 transition">
        </div>
        <select id="groupSort"
                class="bg-ink-900/60 border border-neon-violet/30 rounded-full px-5 py-3 text-sm font-semibold focus:border-neon-pink focus:outline-none cursor-pointer">
            <option value="nama">Urutkan: Nama</option>
            <option value="debut">Urutkan: Debut</option>
            <option value="member">Urutkan: Jumlah Member</option>
            <option value="agensi">Urutkan: Agensi</option>
        </select>
    </div>

    {{-- GRID GROUPS --}}
    <div id="groupsGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($groups as $i => $g)
            @php
                // Coba ekstrak 2 warna dari string 'from-X to-Y'
                $warnaRaw = $g['warna'];
                preg_match('/from-([a-z]+)-(\d+)/', $warnaRaw, $fromMatch);
                preg_match('/to-([a-z]+)-(\d+)/', $warnaRaw, $toMatch);
                $fromColor = '#' . ($fromMatch[1] ?? 'd946ef') . '00';
                $toColor = '#' . ($toMatch[1] ?? '8b5cf6') . '00';
            @endphp

            <article class="group-card card-neon glass rounded-2xl p-6 group cursor-pointer"
                     data-nama="{{ strtolower($g['nama']) }}"
                     data-agensi="{{ strtolower($g['agensi']) }}"
                     data-debut="{{ $g['debut'] }}"
                     data-member="{{ $g['member'] }}"
                     data-aos="zoom-in-up"
                     data-aos-delay="{{ ($i % 3) * 100 }}">

                {{-- Top: logo + info --}}
                <div class="flex items-start gap-4 mb-4">
                    {{-- Logo --}}
                    <div class="relative flex-shrink-0">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-br {{ $g['warna'] }} blur-lg opacity-60 group-hover:opacity-100 transition duration-300"></div>
                        <div class="relative w-20 h-20 rounded-2xl bg-gradient-to-br {{ $g['warna'] }} flex items-center justify-center text-3xl font-display font-bold shadow-xl">
                            {{ substr($g['nama'], 0, 1) }}
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="flex-1 min-w-0">
                        <h3 class="text-xl font-display font-bold group-hover:text-neon-pink transition">
                            {{ $g['nama'] }}
                        </h3>
                        <p class="text-sm text-slate-400 flex items-center gap-1.5 mt-0.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            {{ $g['agensi'] }}
                        </p>
                        <span class="inline-block mt-2 text-[10px] uppercase bg-neon-violet/20 text-neon-violet font-bold px-2 py-0.5 rounded">
                            {{ $g['genre'] }}
                        </span>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="h-px bg-gradient-to-r from-transparent via-neon-violet/30 to-transparent my-3"></div>

                {{-- Stats grid --}}
                <div class="grid grid-cols-2 gap-2 text-center">
                    <div class="bg-ink-800/40 rounded-lg p-2">
                        <div class="text-[10px] uppercase text-slate-500 font-bold">Debut</div>
                        <div class="font-display font-bold text-neon-pink">{{ $g['debut'] }}</div>
                    </div>
                    <div class="bg-ink-800/40 rounded-lg p-2">
                        <div class="text-[10px] uppercase text-slate-500 font-bold">Member</div>
                        <div class="font-display font-bold text-neon-cyan">{{ $g['member'] }}</div>
                    </div>
                </div>

                {{-- CTA --}}
                <div class="mt-4 flex items-center justify-between">
                    <span class="text-xs text-slate-500">💜 Fandom aktif</span>
                    <button class="text-sm font-bold text-neon-pink group-hover:text-neon-cyan transition flex items-center gap-1">
                        Lihat Profil
                        <span class="group-hover:translate-x-1 transition-transform">→</span>
                    </button>
                </div>
            </article>
        @endforeach
    </div>

    {{-- Empty state --}}
    <div id="emptyState" class="hidden text-center py-16">
        <div class="text-6xl mb-4">🔍</div>
        <h3 class="text-xl font-display font-bold mb-2">Tidak ada grup ditemukan</h3>
        <p class="text-slate-400 text-sm">Coba kata kunci lain</p>
    </div>

</div>
@endsection

@push('scripts')
<script>
    // SEARCH + SORT CLIENT-SIDE
    const searchInput = document.getElementById('groupSearch');
    const sortSelect  = document.getElementById('groupSort');
    const grid        = document.getElementById('groupsGrid');
    const emptyState  = document.getElementById('emptyState');

    function applyFilterSort() {
        const q = (searchInput.value || '').toLowerCase().trim();
        const sortBy = sortSelect.value;

        let cards = Array.from(grid.querySelectorAll('.group-card'));

        // Sort
        cards.sort((a, b) => {
            const aVal = a.dataset[sortBy] || '';
            const bVal = b.dataset[sortBy] || '';
            if (sortBy === 'debut' || sortBy === 'member') {
                return Number(aVal) - Number(bVal);
            }
            return aVal.localeCompare(bVal);
        });

        // Append ulang ke grid (sort dulu)
        cards.forEach(card => grid.appendChild(card));

        // Filter + show/hide
        let visibleCount = 0;
        cards.forEach(card => {
            const nama   = card.dataset.nama || '';
            const agensi = card.dataset.agensi || '';
            const match  = nama.includes(q) || agensi.includes(q);
            if (match) {
                card.style.display = '';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Toggle empty state
        if (visibleCount === 0) {
            emptyState.classList.remove('hidden');
        } else {
            emptyState.classList.add('hidden');
        }
    }

    searchInput?.addEventListener('input', applyFilterSort);
    sortSelect?.addEventListener('change', applyFilterSort);
</script>
@endpush