<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TommyCoin — The Future of Funny Money')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        tommy: {
                            gold:   '#F5A623',
                            orange: '#E8721C',
                            dark:   '#1A0A00',
                            cream:  '#FFF8ED',
                        }
                    },
                    fontFamily: {
                        display: ['Georgia', 'serif'],
                    },
                    animation: {
                        'spin-slow':   'spin 8s linear infinite',
                        'bounce-slow': 'bounce 3s ease-in-out infinite',
                        'pulse-gold':  'pulseGold 2s ease-in-out infinite',
                    },
                    keyframes: {
                        pulseGold: {
                            '0%, 100%': { boxShadow: '0 0 20px #F5A623' },
                            '50%':      { boxShadow: '0 0 60px #F5A623, 0 0 100px #E8721C' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        body { background: #1A0A00; }

        .tommy-gradient {
            background: linear-gradient(135deg, #1A0A00 0%, #2D1500 40%, #1A0A00 100%);
        }
        .gold-text {
            background: linear-gradient(90deg, #F5A623, #FFD700, #E8721C, #F5A623);
            background-size: 300% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 4s linear infinite;
        }
        @keyframes shine {
            to { background-position: 300% center; }
        }
        .coin-glow {
            filter: drop-shadow(0 0 30px #F5A623) drop-shadow(0 0 60px #E8721C);
        }
        .card-dark {
            background: rgba(245,166,35,0.07);
            border: 1px solid rgba(245,166,35,0.2);
            backdrop-filter: blur(10px);
        }
        .ticker-bar {
            background: linear-gradient(90deg, #F5A623, #E8721C);
        }
        input, select, textarea {
            background: rgba(245,166,35,0.08) !important;
            border: 1px solid rgba(245,166,35,0.3) !important;
            color: #FFF8ED !important;
        }
        input::placeholder, textarea::placeholder { color: rgba(255,248,237,0.4); }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #F5A623 !important;
            box-shadow: 0 0 0 2px rgba(245,166,35,0.25);
        }
        .btn-tommy {
            background: linear-gradient(135deg, #F5A623, #E8721C);
            transition: all 0.3s ease;
        }
        .btn-tommy:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(245,166,35,0.5);
        }
        .nav-link {
            position: relative;
            transition: color 0.3s;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: #F5A623;
            transition: width 0.3s;
        }
        .nav-link:hover::after { width: 100%; }
        .nav-link:hover { color: #F5A623; }
        .price-flash { animation: flash 0.4s ease-out; }
        @keyframes flash {
            0%   { background: rgba(245,166,35,0.4); }
            100% { background: transparent; }
        }
        .scroll-fade {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        .scroll-fade.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="tommy-gradient min-h-screen text-tommy-cream font-sans">

    <!-- Ticker Bar -->
    <div class="ticker-bar py-2 overflow-hidden">
        <div class="flex gap-12 animate-marquee whitespace-nowrap" style="animation: marquee 25s linear infinite;">
            @php
                $tickers = ['TOMMY $0.0042 🚀 +420%', 'BTC $94,200 📈 +2.1%', 'ETH $3,200 📈 +1.4%',
                            'TOMMY $0.0042 🌕 TO THE MOON', 'DOGE $0.12 🐶 +8.3%',
                            'TOMMY COIN — SERIOUS MONEY FOR SERIOUS PEOPLE 🎩'];
            @endphp
            @foreach(array_merge($tickers, $tickers) as $t)
                <span class="text-tommy-dark font-bold text-sm mx-8">{{ $t }}</span>
            @endforeach
        </div>
    </div>
    <style>
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        .animate-marquee { display: inline-flex; }
    </style>

    <!-- Navigation -->
    <nav class="sticky top-0 z-50 border-b border-tommy-gold/20 backdrop-blur-md"
         style="background: rgba(26,10,0,0.85);">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-tommy-gold to-tommy-orange flex items-center justify-center text-tommy-dark font-black text-lg shadow-lg" style="box-shadow:0 0 15px #F5A623;">
                    T
                </div>
                <span class="text-xl font-black gold-text tracking-wide">TommyCoin</span>
            </div>
            <div class="hidden md:flex items-center gap-8 text-tommy-cream/80 text-sm font-medium">
                <a href="#price"  class="nav-link">Price</a>
                <a href="#about"  class="nav-link">About</a>
                <a href="#stats"  class="nav-link">Stats</a>
                <a href="#buy"    class="nav-link">Buy</a>
                <a href="#faq"    class="nav-link">FAQ</a>
            </div>
            <a href="#buy" class="btn-tommy px-5 py-2 rounded-full text-tommy-dark font-black text-sm shadow-lg">
                Buy Now 🚀
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-tommy-gold/20 py-12 mt-20">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-tommy-gold to-tommy-orange flex items-center justify-center text-tommy-dark font-black">T</div>
                <span class="text-lg font-black gold-text">TommyCoin</span>
            </div>
            <p class="text-tommy-cream/40 text-sm mb-2">© {{ date('Y') }} TommyCoin. All rights reserved (and then some).</p>
            <p class="text-tommy-cream/25 text-xs max-w-lg mx-auto">
                ⚠️ Not financial advice. TommyCoin is a meme. Do not invest your life savings. Tommy is not responsible for any losses,
                gains, existential crises, or moon landings. DYOR. WAGMI (probably). NFA.
            </p>
        </div>
    </footer>

    <!-- Scroll animation observer -->
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.15 });
        document.querySelectorAll('.scroll-fade').forEach(el => observer.observe(el));
    </script>
</body>
</html>
