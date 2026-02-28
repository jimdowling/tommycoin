@extends('layouts.app')

@section('title', 'Payment Confirmed — TommyCoin')

@section('content')
<section class="min-h-screen flex items-center justify-center py-20">
    <div class="max-w-2xl mx-auto px-6 text-center">

        <div style="animation: float 3s ease-in-out infinite; display:inline-block;">
            <svg viewBox="0 0 200 200" width="160" height="160" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="95" fill="#F5A623" filter="drop-shadow(0 0 30px #F5A623)"/>
                <text x="100" y="125" text-anchor="middle" font-size="80">🎉</text>
            </svg>
        </div>
        <style>
            @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-15px)} }
        </style>

        <h1 class="text-5xl font-black mt-8 mb-4">
            <span class="gold-text">Payment Confirmed!</span>
        </h1>

        <p class="text-tommy-cream text-2xl font-bold mb-2">
            Welcome to the future, {{ $name }}! 🚀
        </p>

        <div class="card-dark rounded-3xl p-8 my-8 space-y-4">
            <div>
                <p class="text-tommy-cream/50 text-sm mb-1">You just bought</p>
                <div class="text-6xl font-black gold-text">{{ $tommy_amount }}</div>
                <div class="text-tommy-gold font-bold text-xl">TOMMY Tokens</div>
            </div>

            <div class="border-t border-tommy-gold/20 pt-4 grid grid-cols-2 gap-4 text-sm">
                <div class="text-left">
                    <p class="text-tommy-cream/40">Amount paid</p>
                    <p class="text-tommy-cream font-bold">${{ $amount_paid }} USD</p>
                </div>
                <div class="text-left">
                    <p class="text-tommy-cream/40">Confirmation sent to</p>
                    <p class="text-tommy-cream font-bold truncate">{{ $email }}</p>
                </div>
            </div>

            <p class="text-tommy-cream/30 text-xs pt-2">
                Tokens will be dispatched to your wallet once Tommy's blockchain team finishes their tea break.
                This may take 3–5 business vibes.
            </p>
        </div>

        <div class="flex gap-4 justify-center flex-wrap">
            <a href="{{ route('home') }}" class="btn-tommy px-8 py-3 rounded-full text-tommy-dark font-black">
                ← Back to Home
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode('I just bought TommyCoin 🚀 To the moon! #TommyCoin #TOMMY #crypto') }}"
               target="_blank" rel="noopener"
               class="px-8 py-3 rounded-full font-bold border-2 border-tommy-gold/40 text-tommy-gold hover:bg-tommy-gold/10 transition-all">
                Brag on Twitter 🐦
            </a>
        </div>
    </div>
</section>
@endsection
