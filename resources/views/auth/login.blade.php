<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — K-PLAY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        neon: { pink:'#ff2d95', cyan:'#00f0ff', violet:'#8b5cf6', purple:'#d946ef' },
                        ink: { 950:'#05030f', 900:'#0a0620', 800:'#120a2e', 700:'#1a0f3d' }
                    },
                    fontFamily: {
                        display: ['"Space Grotesk"', 'sans-serif'],
                        body: ['"Plus Jakarta Sans"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { -webkit-tap-highlight-color: transparent; }
        body { font-family:'Plus Jakarta Sans', sans-serif; background:#05030f; }
        .font-display { font-family:'Space Grotesk', sans-serif; letter-spacing:-0.02em; }
        .gradient-text {
            background: linear-gradient(135deg,#ff2d95 0%,#d946ef 40%,#8b5cf6 70%,#00f0ff 100%);
            background-size:200% 200%;
            -webkit-background-clip:text; background-clip:text;
            -webkit-text-fill-color:transparent;
            animation: gradientMove 6s ease infinite;
        }
        @keyframes gradientMove {
            0%,100% { background-position:0% 50%; }
            50% { background-position:100% 50%; }
        }
        .aurora-blob {
            position:absolute; border-radius:50%; filter:blur(100px);
            opacity:.4; pointer-events:none;
            animation: blobFloat 18s ease-in-out infinite;
        }
        .aurora-blob:nth-child(1) { width:500px; height:500px; background:#ff2d95; top:-100px; left:-100px; }
        .aurora-blob:nth-child(2) { width:600px; height:600px; background:#8b5cf6; bottom:-200px; right:-200px; animation-delay:-6s; }
        .aurora-blob:nth-child(3) { width:400px; height:400px; background:#00f0ff; top:40%; left:40%; animation-delay:-12s; }
        @keyframes blobFloat {
            0%,100% { transform: translate(0,0) scale(1); }
            33%     { transform: translate(60px,-40px) scale(1.1); }
            66%     { transform: translate(-40px,60px) scale(.9); }
        }
        .glass {
            background: rgba(18,10,46,.55);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(139,92,246,.25);
        }
        .input-neon {
            transition: all .3s;
        }
        .input-neon:focus {
            outline:none;
            border-color:#ff2d95;
            box-shadow: 0 0 0 3px rgba(255,45,149,.15), 0 0 20px rgba(255,45,149,.3);
        }
        .btn-neon {
            position:relative; overflow:hidden;
            background: linear-gradient(90deg,#ff2d95 0%,#8b5cf6 50%,#00f0ff 100%);
            background-size:200% 100%;
            transition: all .3s;
        }
        .btn-neon:hover {
            background-position:100% 0;
            box-shadow: 0 10px 40px -10px rgba(255,45,149,.6);
            transform: translateY(-2px);
        }
        .btn-neon:active { transform: translateY(0); }

        .float { animation: floaty 4s ease-in-out infinite; }
        @keyframes floaty {
            0%,100% { transform: translateY(0); }
            50%     { transform: translateY(-12px); }
        }
        .float-delay { animation-delay:-2s; }

        .marquee-line {
            position:absolute; left:0; right:0; height:1px;
            background: linear-gradient(90deg, transparent, #ff2d95, transparent);
            background-size:200% 100%;
            animation: slideLine 4s linear infinite;
        }
        @keyframes slideLine {
            0%   { background-position: -100% 0; }
            100% { background-position: 100% 0; }
        }
        .input-icon {
            position:absolute; left:1rem; top:50%; transform:translateY(-50%);
            color:#94a3b8; pointer-events:none;
        }
        .input-with-icon { padding-left: 3rem !important; }
        .pw-toggle {
            position:absolute; right:1rem; top:50%; transform:translateY(-50%);
            color:#94a3b8; cursor:pointer;
            transition:color .2s;
        }
        .pw-toggle:hover { color:#ff2d95; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="bg-ink-950 text-white min-h-screen overflow-x-hidden">

    {{-- AURORA BACKGROUND --}}
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
    </div>

    {{-- GRID OVERLAY --}}
    <div class="fixed inset-0 -z-10 pointer-events-none"
         style="background-image: linear-gradient(rgba(139,92,246,.06) 1px, transparent 1px), linear-gradient(90deg, rgba(139,92,246,.06) 1px, transparent 1px); background-size: 60px 60px;"></div>

    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-5xl grid lg:grid-cols-2 rounded-3xl overflow-hidden glass shadow-2xl relative">

            {{-- LEFT: BRANDING --}}
            <div class="hidden lg:flex flex-col justify-between p-12 relative bg-gradient-to-br from-ink-900 to-ink-800">
                {{-- Marquee lines --}}
                <div class="absolute top-20 inset-x-0 marquee-line"></div>
                <div class="absolute bottom-20 inset-x-0 marquee-line" style="animation-delay:-2s"></div>

                {{-- Floating particles --}}
                <div class="absolute top-10 right-10 w-2 h-2 rounded-full bg-neon-pink float"></div>
                <div class="absolute top-32 right-24 w-3 h-3 rounded-full bg-neon-cyan float float-delay"></div>
                <div class="absolute bottom-20 right-12 w-2 h-2 rounded-full bg-neon-violet float" style="animation-delay:-1s"></div>

                <div>
                    <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                        <div class="relative w-10 h-10">
                            <div class="absolute inset-0 rounded-lg bg-gradient-to-br from-neon-pink to-neon-violet opacity-70 blur-sm group-hover:opacity-100 transition"></div>
                            <div class="relative w-full h-full rounded-lg bg-ink-900 border border-neon-pink/40 flex items-center justify-center font-display font-bold">
                                K
                            </div>
                        </div>
                        <span class="text-2xl font-display font-bold gradient-text">K-PLAY</span>
                    </a>
                </div>

                <div class="relative z-10">
                    <h1 class="font-display text-5xl font-bold leading-tight mb-4">
                        Masuk ke<br>
                        <span class="gradient-text">Dunia K-Pop</span>
                    </h1>
                    <p class="text-slate-300 text-base mb-8 max-w-sm">
                        Bergabung dengan komunitas kreatif pecinta K-Pop. Fanart, cover dance, edit video, dan diskusi seru.
                    </p>

                    <div class="flex -space-x-3 mb-3">
                        <img src="https://i.pravatar.cc/100?img=44" class="w-10 h-10 rounded-full ring-2 ring-ink-900">
                        <img src="https://i.pravatar.cc/100?img=15" class="w-10 h-10 rounded-full ring-2 ring-ink-900">
                        <img src="https://i.pravatar.cc/100?img=45" class="w-10 h-10 rounded-full ring-2 ring-ink-900">
                        <img src="https://i.pravatar.cc/100?img=33" class="w-10 h-10 rounded-full ring-2 ring-ink-900">
                        <div class="w-10 h-10 rounded-full ring-2 ring-ink-900 bg-gradient-to-br from-neon-pink to-neon-violet flex items-center justify-center text-xs font-bold">
                            +2K
                        </div>
                    </div>
                    <p class="text-xs text-slate-400">Bergabung dengan <span class="text-neon-pink font-bold">2.548+</span> kreator K-Pop 💜</p>
                </div>

                <div class="relative z-10">
                    <div class="flex gap-2 text-xs text-slate-500">
                        <span>© {{ date('Y') }}</span>
                        <span>K-PLAY</span>
                        <span>·</span>
                        <span>Stay purple, stay creative</span>
                    </div>
                </div>
            </div>

            {{-- RIGHT: FORM --}}
            <div class="p-8 sm:p-12 flex flex-col justify-center relative">
                {{-- Mobile brand --}}
                <div class="lg:hidden mb-6 text-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2">
                        <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-neon-pink to-neon-violet flex items-center justify-center font-display font-bold">K</div>
                        <span class="text-2xl font-display font-bold gradient-text">K-PLAY</span>
                    </a>
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-display font-bold mb-2">Halo lagi! 👋</h2>
                    <p class="text-slate-400 text-sm">Masuk ke akun K-PLAY kamu</p>
                </div>

                {{-- Error umum --}}
                @if($errors->any())
                    <div class="mb-6 bg-red-500/10 border border-red-500/40 text-red-300 p-4 rounded-xl text-sm animate-pulse">
                        <div class="flex items-start gap-2">
                            <span class="text-lg">⚠️</span>
                            <div>
                                @foreach($errors->all() as $e)
                                    <div>{{ $e }}</div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Flash success --}}
                @if(session('success'))
                    <div class="mb-6 bg-emerald-500/10 border border-emerald-500/40 text-emerald-300 p-4 rounded-xl text-sm">
                        ✨ {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-slate-300">Email</label>
                        <div class="relative">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </span>
                            <input type="email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="rina@kplay.com"
                                class="input-neon input-with-icon w-full bg-ink-800/80 border border-neon-violet/30 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500">
                        </div>
                    </div>

                    {{-- Password --}}
                    <div x-data="{ show: false }">
                        <div class="flex justify-between items-center mb-2">
                            <label class="block text-sm font-semibold text-slate-300">Password</label>
                            <a href="#" class="text-xs text-neon-pink hover:text-neon-cyan transition">Lupa password?</a>
                        </div>
                        <div class="relative">
                            <span class="input-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <input :type="show ? 'text' : 'password'" name="password" required
                                placeholder="••••••••"
                                class="input-neon input-with-icon w-full bg-ink-800/80 border border-neon-violet/30 rounded-xl px-4 py-3 text-sm text-white placeholder-slate-500 pr-12">
                            <button type="button" @click="show = !show" class="pw-toggle" tabindex="-1">
                                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Remember --}}
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 cursor-pointer group">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-neon-violet/40 bg-ink-800 text-neon-pink focus:ring-neon-pink">
                            <span class="text-slate-400 group-hover:text-white transition">Ingat saya</span>
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-neon w-full text-white font-bold py-3.5 rounded-xl text-sm flex items-center justify-center gap-2">
                        Masuk
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </button>
                </form>

                {{-- Demo accounts --}}
                <div class="mt-6 p-4 bg-ink-800/40 border border-neon-violet/20 rounded-xl">
                    <p class="text-xs font-bold text-neon-cyan mb-2">🔑 Akun demo:</p>
                    <div class="space-y-1 text-xs text-slate-400 font-mono">
                        <div>rina@kplay.com / password</div>
                        <div>dimas@kplay.com / password</div>
                        <div>sari@kplay.com / password</div>
                    </div>
                </div>

                {{-- Divider --}}
                <div class="flex items-center gap-3 my-6">
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-neon-violet/40 to-transparent"></div>
                    <span class="text-xs text-slate-500">atau</span>
                    <div class="flex-1 h-px bg-gradient-to-r from-transparent via-neon-violet/40 to-transparent"></div>
                </div>

                <p class="text-center text-sm text-slate-400">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-neon-pink font-bold hover:text-neon-cyan transition">
                        Daftar sekarang →
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</body>
</html>