@extends('layouts.app')

@section('title', 'Payment Cancelled — TommyCoin')

@section('content')
<section class="min-h-screen flex items-center justify-center py-20">
    <div class="max-w-xl mx-auto px-6 text-center">

        <div style="animation: float 3s ease-in-out infinite; display:inline-block;">
            <svg viewBox="0 0 200 200" width="140" height="140" xmlns="http://www.w3.org/2000/svg">
                <circle cx="100" cy="100" r="95" fill="#374151" filter="drop-shadow(0 0 20px rgba(0,0,0,0.5))"/>
                <text x="100" y="125" text-anchor="middle" font-size="80">😬</text>
            </svg>
        </div>
        <style>
            @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-15px)} }
        </style>

        <h1 class="text-4xl font-black mt-8 mb-4 text-tommy-cream">
            Payment Cancelled
        </h1>

        <p class="text-tommy-cream/60 text-lg mb-3">
            You pulled out right before the moon. Classic.
        </p>
        <p class="text-tommy-cream/40 text-sm mb-10">
            No charge was made. Your wallet remains as empty as before, but at least it's your choice.
            Tommy is not upset. Tommy understands. (Tommy is a little upset.)
        </p>

        <div class="flex gap-4 justify-center flex-wrap">
            <a href="{{ route('home') }}#buy" class="btn-tommy px-8 py-4 rounded-full text-tommy-dark font-black text-lg shadow-2xl">
                Try Again 🚀
            </a>
            <a href="{{ route('home') }}" class="px-8 py-4 rounded-full font-bold border-2 border-tommy-gold/30 text-tommy-gold/70 hover:border-tommy-gold hover:text-tommy-gold transition-all">
                Go Home
            </a>
        </div>
    </div>
</section>
@endsection
