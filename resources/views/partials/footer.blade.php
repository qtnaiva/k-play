<footer class="mt-20 border-t border-neon-violet/20 relative overflow-hidden">
    {{-- Glow --}}
    <div class="absolute -top-20 left-1/4 w-96 h-96 bg-neon-violet/20 blur-3xl rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 py-12 relative">
        <div class="grid md:grid-cols-3 gap-10">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-neon-pink to-neon-violet flex items-center justify-center font-display font-bold">K</div>
                    <span class="text-2xl font-display font-bold gradient-text">K-PLAY</span>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed">Komunitas kreatif pecinta K-Pop. Fanart, cover dance, edit video, dan banyak lagi. 💜</p>
            </div>
            <div>
                <h4 class="font-display font-bold mb-4 text-sm uppercase tracking-wider text-neon-pink">Menu</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="{{ route('idols.index') }}" class="hover:text-neon-pink transition">Idol & Groups</a></li>
                    <li><a href="{{ route('community.index') }}" class="hover:text-neon-pink transition">Community</a></li>
                    <li><a href="{{ route('news.index') }}" class="hover:text-neon-pink transition">News</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="hover:text-neon-pink transition">Gallery</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-display font-bold mb-4 text-sm uppercase tracking-wider text-neon-cyan">Fitur</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li><a href="{{ route('news.calendar') }}" class="hover:text-neon-cyan transition">Comeback Calendar</a></li>
                    <li><a href="{{ route('profile.playlist') }}" class="hover:text-neon-cyan transition">Playlist</a></li>
                    <li><a href="{{ route('profile.bias') }}" class="hover:text-neon-cyan transition">My Bias</a></li>
                </ul>
            </div>
        </div>
        <div class="mt-10 pt-6 border-t border-neon-violet/10 flex flex-col md:flex-row justify-between items-center gap-3 text-xs text-slate-500">
            <div>© {{ date('Y') }} K-PLAY — Stay purple, stay creative 💜</div>
            <div class="flex gap-4">
                <a href="#" class="hover:text-neon-pink transition">Instagram</a>
                <a href="#" class="hover:text-neon-pink transition">TikTok</a>
                <a href="#" class="hover:text-neon-pink transition">Twitter</a>
            </div>
        </div>
    </div>
</footer>