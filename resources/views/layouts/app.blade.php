<!DOCTYPE html>
<html lang="id" class="scroll-smooth dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'K-PLAY — Komunitas Kreatif K-Pop')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        neon: {
                            pink: '#ff2d95',
                            cyan: '#00f0ff',
                            violet: '#8b5cf6',
                            purple: '#d946ef',
                        },
                        ink: {
                            950: '#05030f',
                            900: '#0a0620',
                            800: '#120a2e',
                            700: '#1a0f3d',
                        }
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <style>
        [x-cloak] { display: none !important; }
        * { -webkit-tap-highlight-color: transparent; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
            background: #05030f;
        }
        .font-display { font-family: 'Space Grotesk', sans-serif; letter-spacing: -0.02em; }

        /* ===== AURORA BACKGROUND ===== */
        .aurora-bg {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }
        .aurora-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.35;
            animation: blobFloat 18s ease-in-out infinite;
        }
        .aurora-blob:nth-child(1) {
            width: 500px; height: 500px;
            background: #ff2d95;
            top: -100px; left: -100px;
            animation-delay: 0s;
        }
        .aurora-blob:nth-child(2) {
            width: 600px; height: 600px;
            background: #8b5cf6;
            top: 30%; right: -200px;
            animation-delay: -6s;
        }
        .aurora-blob:nth-child(3) {
            width: 400px; height: 400px;
            background: #00f0ff;
            bottom: -100px; left: 30%;
            animation-delay: -12s;
        }
        @keyframes blobFloat {
            0%, 100% { transform: translate(0, 0) scale(1); }
            33%      { transform: translate(80px, -60px) scale(1.1); }
            66%      { transform: translate(-60px, 80px) scale(0.9); }
        }

        /* Grid pattern overlay */
        .grid-overlay {
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image:
                linear-gradient(rgba(139, 92, 246, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.06) 1px, transparent 1px);
            background-size: 60px 60px;
            pointer-events: none;
            mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);
            -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%);
        }

        /* ===== GRADIENT TEXT ===== */
        .gradient-text {
            background: linear-gradient(135deg, #ff2d95 0%, #d946ef 40%, #8b5cf6 70%, #00f0ff 100%);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientMove 6s ease infinite;
        }
        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        /* ===== GLASS CARD ===== */
        .glass {
            background: rgba(18, 10, 46, 0.55);
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            border: 1px solid rgba(139, 92, 246, 0.18);
        }

        /* Neon glow card */
        .card-neon {
            position: relative;
            transition: transform .35s cubic-bezier(.34,1.56,.64,1), box-shadow .35s;
        }
        .card-neon::before {
            content: '';
            position: absolute;
            inset: -1px;
            border-radius: inherit;
            padding: 1px;
            background: linear-gradient(135deg, rgba(255,45,149,.6), rgba(0,240,255,.6));
            -webkit-mask: linear-gradient(#000 0 0) content-box, linear-gradient(#000 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity .35s;
            pointer-events: none;
        }
        .card-neon:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 60px -15px rgba(255,45,149,.4), 0 0 40px -10px rgba(0,240,255,.3);
        }
        .card-neon:hover::before { opacity: 1; }

        /* ===== ANIMATED BORDER (HERO) ===== */
        .animated-border {
            background: linear-gradient(270deg, #ff2d95, #d946ef, #8b5cf6, #00f0ff, #ff2d95);
            background-size: 400% 400%;
            animation: gradientShift 6s ease infinite;
        }
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50%      { background-position: 100% 50%; }
        }

        /* ===== FLOATING ELEMENTS ===== */
        .float {
            animation: floaty 4s ease-in-out infinite;
        }
        .float-delay-1 { animation-delay: -1s; }
        .float-delay-2 { animation-delay: -2s; }
        .float-delay-3 { animation-delay: -3s; }
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-12px); }
        }

        /* ===== PULSE GLOW ===== */
        .pulse-glow {
            animation: pulseGlow 2s ease-in-out infinite;
        }
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 0 0 rgba(255,45,149,.6); }
            50%      { box-shadow: 0 0 0 12px rgba(255,45,149,0); }
        }

        /* ===== MARQUEE ===== */
        .marquee {
            display: flex;
            overflow: hidden;
            gap: 3rem;
            mask-image: linear-gradient(90deg, transparent, black 10%, black 90%, transparent);
            -webkit-mask-image: linear-gradient(90deg, transparent, black 10%, black 90%, transparent);
        }
        .marquee-content {
            display: flex;
            gap: 3rem;
            flex-shrink: 0;
            animation: scrollX 30s linear infinite;
        }
        .marquee:hover .marquee-content { animation-play-state: paused; }
        @keyframes scrollX {
            from { transform: translateX(0); }
            to   { transform: translateX(-100%); }
        }

        /* ===== SHIMMER (loading skeleton) ===== */
        @keyframes shimmer {
            0%   { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        .skeleton {
            background: linear-gradient(90deg, #1a0f3d 25%, #2a1a5d 50%, #1a0f3d 75%);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
            border-radius: 8px;
        }

        /* ===== SWIPER ===== */
        .swiper-pagination-bullet { background: #ff2d95 !important; opacity: .4; }
        .swiper-pagination-bullet-active { opacity: 1; width: 24px !important; border-radius: 999px !important; }
        .swiper-button-next, .swiper-button-prev {
            color: #ff2d95 !important;
            background: rgba(10, 6, 32, .8);
            width: 44px !important; height: 44px !important;
            border-radius: 50%;
            border: 1px solid rgba(255, 45, 149, .4);
            backdrop-filter: blur(8px);
            transition: all .2s;
        }
        .swiper-button-next:hover, .swiper-button-prev:hover {
            background: #ff2d95;
            color: white !important;
            transform: scale(1.1);
        }
        .swiper-button-next:after, .swiper-button-prev:after { font-size: 16px !important; font-weight: bold; }
        .swiper-slide { height: auto; }

        /* ===== HEART BURST ===== */
        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.3); }
            100% { transform: scale(1); }
        }
        .animate-bounce-in { animation: bounceIn .4s ease-out; }
        @keyframes heartBurst {
            0%   { transform: scale(0.5) translateY(0); opacity: 1; }
            100% { transform: scale(2.5) translateY(-50px); opacity: 0; }
        }
        .heart-burst {
            position: absolute; left: 50%; top: 50%;
            font-size: 1.5rem;
            animation: heartBurst .6s ease-out forwards;
            pointer-events: none;
        }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #05030f; }
        ::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #ff2d95, #8b5cf6);
            border-radius: 999px;
        }
        ::-webkit-scrollbar-thumb:hover { background: #00f0ff; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }

        /* ===== LIGHT MODE ===== */
        html.light body { background: #f8fafc; color: #0a0620; }
        html.light .glass { background: rgba(255,255,255,.75); border: 1px solid rgba(255,45,149,.2); }
        html.light .aurora-blob { opacity: 0.15; }
        html.light .grid-overlay {
            background-image:
                linear-gradient(rgba(139,92,246,.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139,92,246,.08) 1px, transparent 1px);
        }
        html.light .text-white { color: #0a0620 !important; }
        html.light .text-slate-300 { color: #334155 !important; }
        html.light .text-slate-400 { color: #475569 !important; }
        html.light .text-slate-500 { color: #64748b !important; }
        html.light .border-slate-700 { border-color: #cbd5e1 !important; }
        html.light .bg-slate-800\/80 { background: rgba(241,245,249,.9) !important; }
        html.light nav { background: rgba(255,255,255,.85) !important; }
        html.light .skeleton { background: linear-gradient(90deg, #e2e8f0 25%, #cbd5e1 50%, #e2e8f0 75%); background-size: 1000px 100%; }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="bg-ink-950 text-white min-h-screen transition-colors duration-300">

    {{-- AURORA BACKGROUND --}}
    <div class="aurora-bg">
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
        <div class="aurora-blob"></div>
    </div>
    <div class="grid-overlay"></div>

    @include('partials.navbar')

    @if(session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4" data-aos="fade-down">
            <div class="bg-emerald-500/10 border border-emerald-500/40 text-emerald-300 p-3 rounded-xl text-sm">
                ✨ {{ session('success') }}
            </div>
        </div>
    @endif

    <main class="max-w-7xl mx-auto relative">
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- SCROLL TOP --}}
    <button id="scrollTop"
        class="fixed bottom-6 right-6 w-14 h-14 rounded-full bg-gradient-to-br from-neon-pink to-neon-violet text-white shadow-lg opacity-0 pointer-events-none z-40 hover:scale-110 transition flex items-center justify-center">
        <svg class="absolute inset-0 w-full h-full -rotate-90" viewBox="0 0 56 56">
            <circle cx="28" cy="28" r="25" stroke="rgba(255,255,255,0.2)" stroke-width="3" fill="none"/>
            <circle id="progressRing" cx="28" cy="28" r="25" stroke="white" stroke-width="3" fill="none"
                    stroke-dasharray="157" stroke-dashoffset="157"
                    stroke-linecap="round" style="transition: stroke-dashoffset .1s"/>
        </svg>
        <span class="relative text-lg font-bold">↑</span>
    </button>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        AOS.init({ duration: 800, once: true, offset: 60, easing: 'ease-out-cubic' });

        // THEME TOGGLE
        const html = document.documentElement;
        const themeToggle = document.getElementById('themeToggle');
        const iconSun = document.getElementById('iconSun');
        const iconMoon = document.getElementById('iconMoon');

        function applyTheme(theme) {
            if (theme === 'light') {
                html.classList.remove('dark');
                html.classList.add('light');
                document.body.classList.remove('bg-ink-950', 'text-white');
                document.body.classList.add('bg-slate-50', 'text-slate-900');
                if (iconSun) iconSun.classList.remove('hidden');
                if (iconMoon) iconMoon.classList.add('hidden');
            } else {
                html.classList.remove('light');
                html.classList.add('dark');
                document.body.classList.add('bg-ink-950', 'text-white');
                document.body.classList.remove('bg-slate-50', 'text-slate-900');
                if (iconSun) iconSun.classList.add('hidden');
                if (iconMoon) iconMoon.classList.remove('hidden');
            }
            localStorage.setItem('theme', theme);
        }
        applyTheme(localStorage.getItem('theme') || 'dark');
        themeToggle?.addEventListener('click', () => {
            const current = localStorage.getItem('theme') || 'dark';
            applyTheme(current === 'dark' ? 'light' : 'dark');
        });

        // SCROLL TO TOP + PROGRESS
        const scrollBtn = document.getElementById('scrollTop');
        const ring = document.getElementById('progressRing');
        window.addEventListener('scroll', () => {
            const h = document.documentElement;
            const scrolled = h.scrollTop / (h.scrollHeight - h.clientHeight);
            if (window.scrollY > 400) {
                scrollBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollBtn.classList.add('opacity-100');
            } else {
                scrollBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollBtn.classList.remove('opacity-100');
            }
            if (ring) {
                const c = 2 * Math.PI * 25;
                ring.style.strokeDasharray = c;
                ring.style.strokeDashoffset = c * (1 - scrolled);
            }
        });
        scrollBtn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));

        // TOAST
        function showToast(msg, type = 'success') {
            const colors = {
                success: 'from-neon-pink to-neon-violet',
                error: 'from-red-500 to-rose-600',
                info: 'from-neon-cyan to-blue-600',
            };
            const toast = document.createElement('div');
            toast.className = `fixed bottom-20 left-1/2 -translate-x-1/2 bg-gradient-to-r ${colors[type]} text-white px-6 py-3 rounded-full font-bold shadow-2xl z-50 transition-all duration-300 opacity-0 translate-y-4`;
            toast.textContent = msg;
            document.body.appendChild(toast);
            requestAnimationFrame(() => toast.classList.remove('opacity-0', 'translate-y-4'));
            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-4');
                setTimeout(() => toast.remove(), 300);
            }, 2500);
        }
        window.showToast = showToast;

        // PARALLAX AURORA
        document.addEventListener('mousemove', (e) => {
            const blobs = document.querySelectorAll('.aurora-blob');
            const x = (e.clientX / window.innerWidth - 0.5) * 30;
            const y = (e.clientY / window.innerHeight - 0.5) * 30;
            blobs.forEach((blob, i) => {
                const factor = (i + 1) * 0.5;
                blob.style.transform = `translate(${x * factor}px, ${y * factor}px)`;
            });
        });
    </script>

    @stack('scripts')
</body>
</html>