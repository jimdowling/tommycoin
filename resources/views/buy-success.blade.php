@extends('layouts.app')

@section('title', 'Application Submitted — TommyCoin')

@section('content')
<section class="min-h-screen flex items-center justify-center py-20">
    <div class="max-w-2xl mx-auto px-6 text-center">

        {{-- Celebration SVG --}}
        <div style="animation: float 3s ease-in-out infinite; display:inline-block;">
            <svg viewBox="0 0 200 200" width="180" height="180" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="95" fill="#F5A623" filter="drop-shadow(0 0 30px #F5A623)"/>
                <text x="100" y="125" text-anchor="middle" font-size="80">🎉</text>
            </svg>
        </div>
        <style>
            @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-15px)} }
        </style>

        <h1 class="text-5xl font-black mt-8 mb-4">
            <span class="gold-text">Application Received!</span>
        </h1>

        <p class="text-tommy-cream text-2xl font-bold mb-2">
            Welcome to the future, {{ session('name') }}! 🚀
        </p>

        <div class="card-dark rounded-3xl p-8 my-8">
            <p class="text-tommy-cream/60 mb-2">You're about to receive approximately</p>
            <div class="text-6xl font-black gold-text mb-2">{{ session('tommy_amount') }}</div>
            <div class="text-tommy-gold font-bold text-xl mb-4">TOMMY Tokens</div>
            <p class="text-tommy-cream/40 text-sm">
                (pending Tommy's personal review, blockchain confirmation, and whether Mercury is in retrograde)
            </p>
        </div>

        <p class="text-tommy-cream/60 mb-2">A confirmation email will be sent shortly.</p>
        <p class="text-tommy-cream/40 text-sm mb-10">
            Or it won't. Tommy is working on the email system. It's on the roadmap (Q3, probably Q4).
        </p>

        <div class="flex gap-4 justify-center">
            <a href="{{ route('home') }}" class="btn-tommy px-8 py-3 rounded-full text-tommy-dark font-black">
                ← Back to Home
            </a>
            <a href="#" onclick="navigator.share ? navigator.share({title:'I bought TommyCoin!', url: window.location.origin}) : alert('Copy the URL and tell everyone!')"
               class="px-8 py-3 rounded-full font-bold border-2 border-tommy-gold/40 text-tommy-gold hover:bg-tommy-gold/10 transition-all">
                Share 📢
            </a>
        </div>
    </div>
</section>
@endsection
