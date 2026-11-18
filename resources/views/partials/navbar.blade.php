<nav x-data="{ open: false, scrolled: false, progress: 0 }"
     x-init="window.addEventListener('scroll', () => { 
         scrolled = window.scrollY > 20; 
         progress = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
     })"
     :class="scrolled ? 'bg-ink-950/85 shadow-2xl shadow-neon-pink/10' : 'bg-ink-950/40'"
     class="sticky top-0 z-50 backdrop-blur-xl border-b border-neon-violet/20 transition-all duration-300">

    {{-- Scroll progress bar --}}
    <div class="absolute bottom-0 left-0 h-[2px] bg-gradient-to-r from-neon-pink via-neon-purple to-neon-cyan transition-all duration-150"
         :style="`width: ${progress}%`"></div>

    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16 gap-4">

            {{-- LOGO with animated ring --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                <div class="relative w-9 h-9">
                    <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-neon-pink to-neon-violet animate-spin-slow opacity-70 blur-sm group-hover:opacity-100 transition"></div>
                    <div class="relative w-full h-full rounded-lg bg-ink-900 border border-neon-pink/40 flex items-center justify-center font-display font-bold text-transparent bg-clip-text bg-gradient-to-br from-neon-pink to-neon-cyan">
                        K
                    </div>
                </div>
                <span class="text-2xl font-display font-bold gradient-text tracking-tight">K-PLAY</span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden lg:flex items-center gap-1 text-sm font-semibold">
                @php
                    $nav = [
                        ['route'=>'home',            'label'=>'Home'],
                        ['route'=>'idols.index',     'label'=>'Idol & Groups'],
                        ['route'=>'community.index', 'label'=>'Community'],
                        ['route'=>'news.index',      'label'=>'News'],
                        ['route'=>'gallery.index',   'label'=>'Gallery'],
                        ['route'=>'profile.index',   'label'=>'Profile'],
                    ];
                @endphp
                @foreach($nav as $item)
                    @php $active = request()->routeIs($item['route'].'*'); @endphp
                    <a href="{{ route($item['route']) }}"
                       class="relative px-3 py-2 rounded-lg transition group overflow-hidden
                              {{ $active ? 'text-neon-pink' : 'text-slate-300 hover:text-neon-pink' }}">
                        <span class="relative z-10">{{ $item['label'] }}</span>
                        {{-- Hover background glow --}}
                        <span class="absolute inset-0 bg-gradient-to-r from-neon-pink/10 to-neon-violet/10 
                                     scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-300 rounded-lg"></span>
                        {{-- Active underline --}}
                        <span class="absolute left-3 right-3 bottom-1 h-0.5 rounded-full bg-gradient-to-r from-neon-pink to-neon-cyan
                                     origin-left transition-transform duration-300
                                     {{ $active ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                    </a>
                @endforeach
            </div>

            {{-- Right actions --}}
            <div class="hidden md:flex items-center gap-2">

                {{-- Search --}}
                <form action="{{ route('search') }}" method="GET" class="relative" x-data="{ open: false }">
                    <button type="button" @click="open = !open; $nextTick(() => $refs.searchInput?.focus())"
                            class="p-2 hover:bg-neon-violet/20 rounded-lg transition hover:rotate-12 duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <div x-show="open" x-cloak @click.outside="open = false" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute right-0 top-full mt-2 w-72 glass rounded-xl p-3 shadow-2xl border border-neon-pink/30">
                        <input x-ref="searchInput" type="text" name="q" placeholder="Cari idol, grup, post..."
                               class="w-full bg-ink-800/80 border border-neon-violet/30 rounded-lg px-4 py-2 text-sm focus:border-neon-pink focus:outline-none focus:ring-2 focus:ring-neon-pink/30">
                        <div class="mt-2 text-xs text-slate-500">Tekan Enter untuk mencari</div>
                    </div>
                </form>

                {{-- Dark mode --}}
                <button id="themeToggle" class="p-2 hover:bg-neon-violet/20 rounded-lg transition hover:rotate-180 duration-500" title="Toggle theme">
                    <svg id="iconSun" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg id="iconMoon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                {{-- Notif --}}
                <a href="{{ route('profile.notifications') }}"
                   class="relative p-2 hover:bg-neon-violet/20 rounded-lg transition group">
                    <span class="text-xl group-hover:rotate-12 transition-transform inline-block">🔔</span>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-neon-pink rounded-full animate-pulse"></span>
                </a>

                {{-- ============ USER MENU (LOGIN-AWARE) ============ --}}
                @if(session('user'))
                    {{-- Sudah login: dropdown user --}}
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="relative w-9 h-9 group">
                            <div class="absolute inset-0 rounded-full bg-gradient-to-br from-neon-pink to-neon-cyan animate-pulse opacity-70"></div>
                            <img src="{{ session('user.avatar') }}" 
                                 alt="{{ session('user.nama') }}"
                                 class="relative w-full h-full rounded-full object-cover group-hover:scale-110 transition border-2 border-ink-900">
                        </button>
                        <div x-show="open" x-cloak @click.outside="open = false" x-transition
                             class="absolute right-0 top-full mt-2 w-56 glass rounded-xl p-2 shadow-2xl border border-neon-pink/30">
                            <div class="px-3 py-2 border-b border-neon-violet/20">
                                <div class="font-bold text-sm">{{ session('user.nama') }}</div>
                                <div class="text-xs text-slate-500">{{ session('user.username') }}</div>
                            </div>
                            <a href="{{ route('profile.index') }}" class="block px-3 py-2 text-sm rounded-lg hover:bg-neon-violet/20 transition">👤 Profil Saya</a>
                            <a href="{{ route('profile.bias') }}" class="block px-3 py-2 text-sm rounded-lg hover:bg-neon-violet/20 transition">💜 My Bias</a>
                            <a href="{{ route('profile.playlist') }}" class="block px-3 py-2 text-sm rounded-lg hover:bg-neon-violet/20 transition">🎧 Playlist</a>
                            <form method="POST" action="{{ route('logout') }}" class="border-t border-neon-violet/20 mt-1 pt-1">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-2 text-sm rounded-lg hover:bg-red-500/20 text-red-400 transition">
                                    🚪 Logout
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    {{-- Belum login: tombol Login --}}
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 rounded-lg bg-gradient-to-r from-neon-pink to-neon-violet font-bold text-sm hover:shadow-lg hover:shadow-neon-pink/50 hover:scale-105 transition">
                        Login
                    </a>
                @endif
            </div>

            <button @click="open = !open" class="lg:hidden text-2xl transition-transform" :class="open ? 'rotate-90' : ''">
                <span x-show="!open">☰</span>
                <span x-show="open" x-cloak>✕</span>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-cloak 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             class="lg:hidden pb-4 space-y-1 text-sm font-semibold">
            @foreach($nav as $item)
                <a href="{{ route($item['route']) }}"
                   class="block px-3 py-2 rounded-lg hover:bg-neon-violet/20 hover:text-neon-pink transition">
                    {{ $item['label'] }}
                </a>
            @endforeach

            {{-- ============ MOBILE AUTH ============ --}}
            <div class="pt-3 mt-3 border-t border-neon-violet/20">
                @if(session('user'))
                    <div class="flex items-center gap-3 px-3 py-2 mb-2">
                        <img src="{{ session('user.avatar') }}" class="w-10 h-10 rounded-full ring-2 ring-neon-pink/40">
                        <div>
                            <div class="font-bold text-sm">{{ session('user.nama') }}</div>
                            <div class="text-xs text-slate-500">{{ session('user.username') }}</div>
                        </div>
                    </div>
                    <a href="{{ route('profile.index') }}" class="block px-3 py-2 rounded-lg hover:bg-neon-violet/20 transition">👤 Profil Saya</a>
                    <a href="{{ route('profile.bias') }}" class="block px-3 py-2 rounded-lg hover:bg-neon-violet/20 transition">💜 My Bias</a>
                    <a href="{{ route('profile.playlist') }}" class="block px-3 py-2 rounded-lg hover:bg-neon-violet/20 transition">🎧 Playlist</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-lg hover:bg-red-500/20 text-red-400 transition">
                            🚪 Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" 
                       class="block px-3 py-2 rounded-lg bg-gradient-to-r from-neon-pink to-neon-violet text-center font-bold transition hover:shadow-lg hover:shadow-neon-pink/50">
                        Login
                    </a>
                    <a href="{{ route('register') }}" 
                       class="block mt-2 px-3 py-2 rounded-lg border border-neon-pink/40 text-center font-bold text-neon-pink transition hover:bg-neon-pink/10">
                        Daftar Akun
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>