@extends('layouts.app')

@section('title', 'TommyCoin — Seriously the Best Coin. Probably.')

@section('content')

{{-- ═══════════════════════ HERO ═══════════════════════ --}}
<section class="relative min-h-screen flex items-center overflow-hidden pt-10">

    {{-- Background sparkles --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden" aria-hidden="true">
        @for($i = 0; $i < 60; $i++)
            <div class="absolute rounded-full bg-tommy-gold"
                 style="
                    width:  {{ rand(1,4) }}px;
                    height: {{ rand(1,4) }}px;
                    top:    {{ rand(0,100) }}%;
                    left:   {{ rand(0,100) }}%;
                    opacity: {{ rand(1,5) / 10 }};
                    animation: twinkle {{ rand(20,60) / 10 }}s ease-in-out infinite;
                    animation-delay: -{{ rand(0,50) / 10 }}s;
                 ">
            </div>
        @endfor
    </div>
    <style>
        @keyframes twinkle {
            0%,100% { opacity:0.1; transform:scale(1); }
            50%      { opacity:0.9; transform:scale(1.8); }
        }
    </style>

    <div class="max-w-7xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-16 items-center w-full">

        {{-- Left: Text --}}
        <div class="text-center md:text-left">
            <div class="inline-block px-4 py-1 rounded-full text-xs font-bold mb-6 text-tommy-dark"
                 style="background: linear-gradient(90deg,#F5A623,#FFD700);">
                🚀 NOW LIVE — GET IN BEFORE IT'S TOO LATE (it's already too late)
            </div>

            <h1 class="text-6xl md:text-7xl font-black mb-4 leading-none">
                <span class="gold-text">Tommy</span><br>
                <span class="text-tommy-cream">Coin</span>
            </h1>

            <p class="text-xl text-tommy-cream/70 mb-2 italic">
                "I put my kid's college fund in. No regrets."
            </p>
            <p class="text-tommy-cream/40 text-sm mb-8">— Definitely a real person</p>

            <p class="text-tommy-cream/80 text-lg mb-10 leading-relaxed">
                The <strong class="text-tommy-gold">world's most serious cryptocurrency</strong>,
                backed by nothing but pure vibes, memes, and Tommy's unwavering confidence.
                Invest today. Tell your mum you're a crypto guy now.
            </p>

            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                <a href="#buy" class="btn-tommy px-8 py-4 rounded-full text-tommy-dark font-black text-lg shadow-2xl">
                    Buy TommyCoin 🚀
                </a>
                <a href="#about" class="px-8 py-4 rounded-full font-bold text-tommy-gold border-2 border-tommy-gold/40
                                        hover:border-tommy-gold hover:bg-tommy-gold/10 transition-all">
                    Learn More
                </a>
            </div>

            <div class="flex gap-6 mt-10 justify-center md:justify-start text-sm text-tommy-cream/50">
                <span>✅ 100% Legit</span>
                <span>✅ Very Safe</span>
                <span>✅ To The Moon</span>
            </div>
        </div>

        {{-- Right: Tommy SVG Illustration --}}
        <div class="flex justify-center items-center">
            <div class="relative" style="animation: float 4s ease-in-out infinite;">
                <style>
                    @keyframes float {
                        0%,100% { transform: translateY(0) rotate(-2deg); }
                        50%     { transform: translateY(-20px) rotate(2deg); }
                    }
                </style>

                {{-- Glow ring --}}
                <div class="absolute inset-0 rounded-full"
                     style="background: radial-gradient(circle, rgba(245,166,35,0.4) 0%, transparent 70%);
                            transform: scale(1.3); animation: pulseGlow 3s ease-in-out infinite;">
                </div>
                <style>
                    @keyframes pulseGlow {
                        0%,100% { opacity:0.5; transform: scale(1.3); }
                        50%     { opacity:1;   transform: scale(1.6); }
                    }
                </style>

                {{-- The Big Tommy Coin SVG --}}
                <svg viewBox="0 0 400 400" width="380" height="380" xmlns="http://www.w3.org/2000/svg" class="coin-glow">
                    <defs>
                        <radialGradient id="coinGrad" cx="38%" cy="35%" r="65%">
                            <stop offset="0%"   stop-color="#FFE066"/>
                            <stop offset="40%"  stop-color="#F5A623"/>
                            <stop offset="100%" stop-color="#A05A00"/>
                        </radialGradient>
                        <radialGradient id="coinEdge" cx="50%" cy="50%" r="50%">
                            <stop offset="85%"  stop-color="transparent"/>
                            <stop offset="100%" stop-color="rgba(0,0,0,0.4)"/>
                        </radialGradient>
                        <radialGradient id="skinGrad" cx="40%" cy="35%" r="60%">
                            <stop offset="0%"   stop-color="#FFDAB9"/>
                            <stop offset="100%" stop-color="#D2955A"/>
                        </radialGradient>
                        <filter id="shadow">
                            <feDropShadow dx="3" dy="6" stdDeviation="8" flood-color="rgba(0,0,0,0.5)"/>
                        </filter>
                    </defs>

                    {{-- Coin body --}}
                    <circle cx="200" cy="200" r="190" fill="url(#coinGrad)" filter="url(#shadow)"/>
                    <circle cx="200" cy="200" r="190" fill="url(#coinEdge)"/>
                    {{-- Coin rim detail --}}
                    <circle cx="200" cy="200" r="182" fill="none" stroke="#A05A00" stroke-width="3" opacity="0.5"/>
                    <circle cx="200" cy="200" r="175" fill="none" stroke="#FFE066" stroke-width="1" opacity="0.4"/>

                    {{-- ═══ TOMMY FACE ═══ --}}

                    {{-- Head --}}
                    <ellipse cx="200" cy="210" rx="105" ry="115" fill="url(#skinGrad)"/>

                    {{-- Ears --}}
                    <ellipse cx="96" cy="210" rx="18" ry="22" fill="#FFDAB9"/>
                    <ellipse cx="96" cy="210" rx="10" ry="13" fill="#E8A882"/>
                    <ellipse cx="304" cy="210" rx="18" ry="22" fill="#FFDAB9"/>
                    <ellipse cx="304" cy="210" rx="10" ry="13" fill="#E8A882"/>

                    {{-- Hair (spiky / chaotic) --}}
                    <g fill="#4A2800">
                        <ellipse cx="200" cy="105" rx="95" ry="28"/>
                        {{-- Spiky bits --}}
                        <polygon points="120,108 110,68 135,100"/>
                        <polygon points="150,98  148,55 165,95"/>
                        <polygon points="200,95  200,50 215,93"/>
                        <polygon points="248,98  252,55 235,95"/>
                        <polygon points="278,108 290,68 265,100"/>
                        {{-- Cowlick --}}
                        <ellipse cx="155" cy="94" rx="12" ry="20" transform="rotate(-15 155 94)"/>
                    </g>

                    {{-- Eyebrows (raised in excitement) --}}
                    <path d="M148 162 Q167 150 186 158" stroke="#4A2800" stroke-width="5" fill="none" stroke-linecap="round"/>
                    <path d="M214 158 Q233 150 252 162" stroke="#4A2800" stroke-width="5" fill="none" stroke-linecap="round"/>

                    {{-- Eyes --}}
                    {{-- Left eye --}}
                    <ellipse cx="167" cy="183" rx="22" ry="24" fill="white"/>
                    <ellipse cx="167" cy="185" rx="13" ry="14" fill="#3D1A00"/>
                    <ellipse cx="167" cy="185" rx="7"  ry="8"  fill="#1A0800"/>
                    <circle  cx="173" cy="179" r="4"   fill="white"/> {{-- catchlight --}}
                    {{-- Monocle on left eye (Tommy is fancy) --}}
                    <circle cx="167" cy="183" r="26" fill="none" stroke="#C8A000" stroke-width="3" opacity="0.8"/>
                    <line   x1="193" y1="195" x2="200" y2="215" stroke="#C8A000" stroke-width="2.5"/>

                    {{-- Right eye (slightly squinting — suspicious/smug) --}}
                    <ellipse cx="233" cy="183" rx="22" ry="20" fill="white"/>
                    <ellipse cx="233" cy="184" rx="12" ry="11" fill="#3D1A00"/>
                    <ellipse cx="233" cy="184" rx="6"  ry="6"  fill="#1A0800"/>
                    <circle  cx="239" cy="179" r="4"   fill="white"/>
                    {{-- Squint lid --}}
                    <path d="M211 175 Q233 168 255 175" fill="#FFDAB9"/>

                    {{-- Nose --}}
                    <ellipse cx="200" cy="215" rx="14" ry="10" fill="#D4956A"/>
                    <circle cx="193" cy="218" r="4" fill="#B87850"/>
                    <circle cx="207" cy="218" r="4" fill="#B87850"/>

                    {{-- Big grinning mouth --}}
                    <path d="M155 248 Q200 295 245 248" fill="#8B2000"/>
                    <path d="M155 248 Q200 295 245 248" fill="none" stroke="#6B1800" stroke-width="2"/>
                    {{-- Teeth --}}
                    <path d="M163 251 Q200 272 237 251 L237 260 Q200 282 163 260 Z" fill="white"/>
                    {{-- Tooth gap --}}
                    <line x1="200" y1="251" x2="200" y2="280" stroke="#E8D5C0" stroke-width="2.5"/>
                    {{-- Gold tooth! --}}
                    <rect x="210" y="251" width="16" height="18" fill="#F5A623" rx="2"/>

                    {{-- Cheeky rosy cheeks --}}
                    <ellipse cx="147" cy="240" rx="22" ry="14" fill="#FF9A9A" opacity="0.5"/>
                    <ellipse cx="253" cy="240" rx="22" ry="14" fill="#FF9A9A" opacity="0.5"/>

                    {{-- Top hat --}}
                    <rect x="145" y="68" width="110" height="15" rx="4" fill="#1A0A00"/>
                    <rect x="160" y="15"  width="80"  height="56" rx="6" fill="#1A0A00"/>
                    {{-- Hat band --}}
                    <rect x="160" y="57"  width="80"  height="10" fill="#F5A623"/>
                    {{-- Hat shine --}}
                    <ellipse cx="193" cy="35" rx="12" ry="20" fill="white" opacity="0.08" transform="rotate(-10 193 35)"/>

                    {{-- "TC" logo on coin (top area) --}}
                    <text x="200" y="360" text-anchor="middle" font-size="28" font-weight="900"
                          fill="#A05A00" font-family="Georgia,serif" opacity="0.7">TOMMY COIN</text>

                    {{-- Stars around face --}}
                    <text x="115" y="175" font-size="22" opacity="0.8">⭐</text>
                    <text x="268" y="165" font-size="18" opacity="0.7">✨</text>
                    <text x="130" y="300" font-size="16" opacity="0.6">💰</text>
                    <text x="258" y="305" font-size="16" opacity="0.6">🚀</text>
                </svg>

                {{-- Price badge floating on coin --}}
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 card-dark px-6 py-3 rounded-2xl text-center shadow-2xl border border-tommy-gold/40">
                    <div class="text-tommy-gold text-2xl font-black" id="hero-price">${{ number_format($price['usd'], 4) }}</div>
                    <div class="text-green-400 text-sm font-bold">+{{ $price['change_24h'] }}% today 🚀</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════ LIVE PRICE ═══════════════════════ --}}
<section id="price" class="py-20 scroll-fade">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-2">
            <span class="gold-text">Live Price</span>
        </h2>
        <p class="text-center text-tommy-cream/50 mb-12">Updated every 5 seconds. Numbers go up (usually).</p>

        <div class="card-dark rounded-3xl p-8 max-w-4xl mx-auto">
            {{-- Big price --}}
            <div class="text-center mb-10">
                <div class="text-tommy-cream/60 text-sm font-medium mb-1">TOMMY / USD</div>
                <div class="text-7xl font-black gold-text" id="live-price">${{ number_format($price['usd'], 6) }}</div>
                <div class="flex items-center justify-center gap-2 mt-3">
                    <span class="text-green-400 text-2xl font-bold" id="live-change">+{{ $price['change_24h'] }}%</span>
                    <span class="text-tommy-cream/50 text-sm">24h</span>
                </div>
            </div>

            {{-- Stats grid --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @php
                    $stats = [
                        ['label' => 'Market Cap',  'value' => $price['market_cap'],  'icon' => '💎', 'id' => 'stat-mcap'],
                        ['label' => '24h Volume',  'value' => $price['volume_24h'],  'icon' => '📊', 'id' => 'stat-vol'],
                        ['label' => 'Holders',     'value' => $price['holders'],     'icon' => '👥', 'id' => 'stat-hold'],
                        ['label' => 'Funniness',   'value' => $price['rank'],        'icon' => '😂', 'id' => 'stat-rank'],
                    ];
                @endphp
                @foreach($stats as $stat)
                    <div class="text-center p-4 rounded-2xl" style="background:rgba(245,166,35,0.05); border:1px solid rgba(245,166,35,0.15);">
                        <div class="text-3xl mb-2">{{ $stat['icon'] }}</div>
                        <div class="text-tommy-gold font-black text-lg" id="{{ $stat['id'] }}">{{ $stat['value'] }}</div>
                        <div class="text-tommy-cream/50 text-xs mt-1">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>

            {{-- Mini chart (CSS-only animated bars) --}}
            <div class="mt-8">
                <div class="text-tommy-cream/40 text-xs mb-3 text-center">Price history (very accurate)</div>
                <div class="flex items-end gap-1 h-16 justify-center" id="chart-bars">
                    @php $heights = [30,45,38,60,42,75,55,80,65,90,70,95,85,100,88]; @endphp
                    @foreach($heights as $i => $h)
                        <div class="flex-1 rounded-t transition-all duration-500"
                             style="height:{{ $h }}%; background: linear-gradient(180deg, #F5A623, #E8721C);
                                    opacity: {{ 0.4 + $i * 0.04 }}; max-width: 24px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════ ABOUT ═══════════════════════ --}}
<section id="about" class="py-20 scroll-fade">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-2">
            About <span class="gold-text">TommyCoin</span>
        </h2>
        <p class="text-center text-tommy-cream/50 mb-16 max-w-2xl mx-auto">
            The whitepaper is 3 pages long. Two of them are pictures of Tommy.
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            @php
                $features = [
                    ['icon'=>'🧠','title'=>'Revolutionary Technology','desc'=>"Built on blockchain, probably. Tommy's nephew looked into it and said it seemed fine."],
                    ['icon'=>'🔒','title'=>'Ultra Secure','desc'=>"Protected by military-grade encryption and Tommy's lucky socks, which have never once failed him."],
                    ['icon'=>'🚀','title'=>'Moon-Bound','desc'=>"Our roadmap shows exponential growth going straight up. The chart is a picture of a rocket. Q4: Moon. Q5: Beyond."],
                    ['icon'=>'💸','title'=>'Low Fees','desc'=>"We only take 0.1% per transaction, which barely covers Tommy's avocado toast habits. Very reasonable."],
                    ['icon'=>'🌍','title'=>'Global Community','desc'=>"Holders in 12 countries. Tommy's mum counts as three because she tells all her book club friends."],
                    ['icon'=>'📈','title'=>'Deflationary','desc'=>"We burn coins every time someone makes a dad joke in the Discord. Supply decreases rapidly."],
                ];
            @endphp
            @foreach($features as $f)
                <div class="card-dark rounded-2xl p-6 hover:border-tommy-gold/50 transition-all hover:-translate-y-1">
                    <div class="text-4xl mb-4">{{ $f['icon'] }}</div>
                    <h3 class="text-tommy-gold font-black text-lg mb-2">{{ $f['title'] }}</h3>
                    <p class="text-tommy-cream/60 text-sm leading-relaxed">{{ $f['desc'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════ STATS TICKER ═══════════════════════ --}}
<section id="stats" class="py-16 scroll-fade">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $bigstats = [
                    ['num' => '420.69%',  'label' => 'All-time Gain',    'sub' => 'from Tommy\'s couch'],
                    ['num' => '12,847',   'label' => 'Believers',        'sub' => 'and counting'],
                    ['num' => '$0.0042',  'label' => 'Current Price',    'sub' => 'per TOMMY'],
                    ['num' => '∞',        'label' => 'Potential',        'sub' => 'trust Tommy on this'],
                ];
            @endphp
            @foreach($bigstats as $s)
                <div class="card-dark rounded-2xl p-8">
                    <div class="text-5xl font-black gold-text mb-2">{{ $s['num'] }}</div>
                    <div class="text-tommy-cream font-bold">{{ $s['label'] }}</div>
                    <div class="text-tommy-cream/40 text-xs mt-1">{{ $s['sub'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════ BUY FORM ═══════════════════════ --}}
<section id="buy" class="py-20 scroll-fade">
    <div class="max-w-3xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-black mb-2">
                Apply to <span class="gold-text">Buy TommyCoin</span>
            </h2>
            <p class="text-tommy-cream/50">
                Fill in the sacred form below. Tommy personally reviews each application (he doesn't).
            </p>
        </div>

        @if(session('error'))
            <div class="bg-red-900/30 border border-red-500/50 text-red-300 rounded-xl p-4 mb-6">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('buy.store') }}" method="POST" class="card-dark rounded-3xl p-10 space-y-6">
            @csrf

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-tommy-gold font-bold text-sm mb-2">Your Name *</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           placeholder="e.g. Big Crypto Barry"
                           class="w-full px-4 py-3 rounded-xl text-sm">
                    @error('name') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-tommy-gold font-bold text-sm mb-2">Email *</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           placeholder="you@moonbound.com"
                           class="w-full px-4 py-3 rounded-xl text-sm">
                    @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label class="block text-tommy-gold font-bold text-sm mb-2">
                    Wallet Address *
                    <span class="text-tommy-cream/40 font-normal">(ERC-20 compatible — or write "don't have one yet")</span>
                </label>
                <input type="text" name="wallet" value="{{ old('wallet') }}" required
                       placeholder="0x... or 'ask Tommy'"
                       class="w-full px-4 py-3 rounded-xl text-sm font-mono">
                @error('wallet') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-tommy-gold font-bold text-sm mb-2">
                    How much USD do you want to invest? *
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-tommy-gold font-bold">$</span>
                    <input type="number" name="amount_usd" value="{{ old('amount_usd', 100) }}"
                           min="10" max="100000" step="any" required
                           class="w-full pl-8 pr-4 py-3 rounded-xl text-sm"
                           id="usd-input">
                </div>
                <p class="text-tommy-cream/40 text-xs mt-2">
                    ≈ <span class="text-tommy-gold font-bold" id="tommy-estimate">23,809</span> TOMMY
                    <span class="text-tommy-cream/30">(at current price of $0.0042)</span>
                </p>
                @error('amount_usd') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-tommy-gold font-bold text-sm mb-2">
                    How serious are you about this? *
                </label>
                <div class="grid grid-cols-2 gap-3" id="serious-options">
                    @php
                        $opts = [
                            ['value'=>'very',           'label'=>'Very Serious 🧐',         'sub'=>'I read the whitepaper (all 3 pages)'],
                            ['value'=>'extremely',       'label'=>'Extremely Serious 💼',    'sub'=>'I quit my job for this'],
                            ['value'=>'moon-or-bust',    'label'=>'Moon or Bust 🌕',         'sub'=>'Wife doesn\'t know yet'],
                            ['value'=>'just-for-laughs', 'label'=>'Just for Laughs 😂',     'sub'=>'But also moon plz'],
                        ];
                    @endphp
                    @foreach($opts as $opt)
                        <label class="cursor-pointer">
                            <input type="radio" name="how_serious" value="{{ $opt['value'] }}" class="hidden peer"
                                   {{ old('how_serious') === $opt['value'] ? 'checked' : '' }}>
                            <div class="p-4 rounded-xl border border-tommy-gold/20 peer-checked:border-tommy-gold
                                        peer-checked:bg-tommy-gold/15 hover:border-tommy-gold/50 transition-all">
                                <div class="font-bold text-sm text-tommy-cream">{{ $opt['label'] }}</div>
                                <div class="text-tommy-cream/40 text-xs mt-0.5">{{ $opt['sub'] }}</div>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('how_serious') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-start gap-3">
                <input type="checkbox" name="agree_nfa" id="agree_nfa" value="1"
                       class="mt-1 w-4 h-4 rounded accent-yellow-500" {{ old('agree_nfa') ? 'checked' : '' }}>
                <label for="agree_nfa" class="text-tommy-cream/60 text-sm cursor-pointer">
                    I understand this is <strong class="text-tommy-gold">Not Financial Advice</strong>,
                    TommyCoin makes no guarantees, and Tommy is not liable if I accidentally become
                    a millionaire or lose everything. I accept the vibes. *
                </label>
            </div>
            @error('agree_nfa') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror

            <button type="submit" class="btn-tommy w-full py-5 rounded-2xl text-tommy-dark font-black text-xl shadow-2xl">
                🚀 Submit My Application to the Moon
            </button>
            <p class="text-center text-tommy-cream/30 text-xs">
                Applications reviewed within 3-5 business vibes.
            </p>
        </form>
    </div>
</section>

{{-- ═══════════════════════ FAQ ═══════════════════════ --}}
<section id="faq" class="py-20 scroll-fade">
    <div class="max-w-3xl mx-auto px-6">
        <h2 class="text-4xl font-black text-center mb-12">
            <span class="gold-text">Frequently Asked</span> Questions
        </h2>

        <div class="space-y-4">
            @php
                $faqs = [
                    ['q' => 'Is TommyCoin a good investment?',
                     'a' => "Tommy says yes. Tommy's financial advisor says 'who is Tommy and why are you calling this number'. Make your own informed decision."],
                    ['q' => 'What blockchain is TommyCoin on?',
                     'a' => "A very good one. Very secure. Tommy's cousin set it up and he works in IT (desktop support, but still — technical person)."],
                    ['q' => 'When moon?',
                     'a' => "Imminently. Tommy has been saying this since Tuesday. It is very nearly imminent. Please hold."],
                    ['q' => 'Is there a vesting schedule?',
                     'a' => "Your coins vest immediately, which is either great news or terrible news depending on what happens next. Tommy prefers to call it 'maximum flexibility'."],
                    ['q' => 'What if the price goes down?',
                     'a' => "Tommy refers to this as 'a dip buying opportunity'. Tommy has been averaging down since $0.08. Tommy is very calm about this."],
                    ['q' => 'Can I get a refund?',
                     'a' => "Ha. Ha ha ha. No. (This is a feature, not a bug. It ensures you HODL. Tommy is protecting you from yourself.)"],
                ];
            @endphp
            @foreach($faqs as $i => $faq)
                <details class="card-dark rounded-2xl group" style="cursor: pointer;">
                    <summary class="px-6 py-5 font-bold text-tommy-cream flex items-center justify-between list-none">
                        <span>{{ $faq['q'] }}</span>
                        <span class="text-tommy-gold text-xl group-open:rotate-45 transition-transform">+</span>
                    </summary>
                    <div class="px-6 pb-5 text-tommy-cream/60 text-sm leading-relaxed border-t border-tommy-gold/10 pt-4">
                        {{ $faq['a'] }}
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════ CTA BANNER ═══════════════════════ --}}
<section class="py-16 scroll-fade">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <div class="rounded-3xl p-12" style="background: linear-gradient(135deg, rgba(245,166,35,0.15), rgba(232,114,28,0.1)); border: 1px solid rgba(245,166,35,0.3);">
            <p class="text-tommy-gold font-bold text-sm mb-4 tracking-widest uppercase">Don't Miss Out</p>
            <h2 class="text-4xl font-black text-tommy-cream mb-4">
                Your nan bought Bitcoin at 10 cents.<br>
                <span class="gold-text">Don't let history repeat itself.</span>
            </h2>
            <p class="text-tommy-cream/60 mb-8">Buy TommyCoin today. Future you will either be very grateful or have excellent character-building material.</p>
            <a href="#buy" class="btn-tommy px-10 py-4 rounded-full text-tommy-dark font-black text-xl inline-block shadow-2xl">
                Get TommyCoin 🚀
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════ LIVE PRICE SCRIPT ═══════════════════════ --}}
<script>
    // Live price updater
    async function fetchPrice() {
        try {
            const res  = await fetch('/api/price');
            const data = await res.json();

            const priceEl  = document.getElementById('live-price');
            const changeEl = document.getElementById('live-change');
            const heroEl   = document.getElementById('hero-price');

            if (priceEl) {
                priceEl.classList.add('price-flash');
                priceEl.textContent = '$' + data.price.toFixed(6);
                setTimeout(() => priceEl.classList.remove('price-flash'), 400);
            }
            if (heroEl)   heroEl.textContent  = '$' + data.price.toFixed(4);
            if (changeEl) {
                const positive = data.change_24h >= 0;
                changeEl.textContent  = (positive ? '+' : '') + data.change_24h + '%';
                changeEl.className    = 'text-2xl font-bold ' + (positive ? 'text-green-400' : 'text-red-400');
            }

            const mcap = document.getElementById('stat-mcap');
            const vol  = document.getElementById('stat-vol');
            const hold = document.getElementById('stat-hold');
            if (mcap) mcap.textContent = data.market_cap;
            if (vol)  vol.textContent  = data.volume_24h;
            if (hold) hold.textContent = data.holders;

        } catch (e) { /* keep showing last value */ }
    }

    // Tommy estimate calculator
    const usdInput = document.getElementById('usd-input');
    const estimate = document.getElementById('tommy-estimate');
    if (usdInput && estimate) {
        usdInput.addEventListener('input', () => {
            const val = parseFloat(usdInput.value) || 0;
            estimate.textContent = Math.round(val / 0.0042).toLocaleString();
        });
    }

    // Start live updates
    setInterval(fetchPrice, 5000);
    fetchPrice();

    // Animate bars
    setInterval(() => {
        document.querySelectorAll('#chart-bars > div').forEach(bar => {
            const h = 20 + Math.random() * 80;
            bar.style.height = h + '%';
        });
    }, 2000);
</script>

@endsection
