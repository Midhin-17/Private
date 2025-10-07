@extends('layouts.app')

@section('title', 'Our Magical Memories')

@section('content')
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Pacifico|Amatic+SC:700&display=swap" rel="stylesheet">

<style>
    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        overflow-x: hidden;
        background: radial-gradient(circle at center, #000000, #0a0a0a, #141414);
        font-family: 'Amatic SC', cursive;
        color: #fff;
    }

    h1 {
        font-family: 'Pacifico', cursive;
        color: #fff;
        text-align: center;
        margin-top: 40px;
        font-size: 3rem;
        text-shadow: 0 0 10px #ee93ba;
        position: relative;
        z-index: 10;
    }

    /* Full page container to stack effects */
    .page-container {
        position: relative;
        min-height: 100vh;
        width: 100vw;
        overflow-x: hidden;
        z-index: 0;
    }

    /* Sparkling fairy lights */
    .light {
        position: absolute;
        width: 6px;
        height: 6px;
        background: gold;
        border-radius: 50%;
        animation: twinkle 2s infinite alternate;
        box-shadow: 0 0 8px gold, 0 0 15px gold;
        pointer-events: none;
        opacity: 0.8;
        z-index: 1;
    }

    @keyframes twinkle {
        from { opacity: 0.2; transform: scale(0.8); }
        to   { opacity: 1; transform: scale(1.3); }
    }

    /* Floating hearts for entire page */
    .heart {
        position: absolute;
        color: rgba(255, 100, 150, 0.7);
        font-size: 22px;
        animation: floatUp 10s linear infinite;
        pointer-events: none;
        user-select: none;
        z-index: 1;
    }

    @keyframes floatUp {
        from { transform: translateY(100vh) scale(0.8); opacity: 1; }
        to   { transform: translateY(-10vh) scale(1.2); opacity: 0; }
    }

    /* Photo grid styling */
    .photo-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill,minmax(150px,1fr));
        gap: 26px;
        max-width: 1100px;
        margin: 40px auto;
        padding: 0 16px 70px 16px;
        position: relative;
        z-index: 10;
    }

    .photo-card {
        background: #222;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(255, 100, 150, 0.4);
        text-align: center;
        padding-bottom: 16px;
        font-family: 'Pacifico', cursive;
        border: 2px solid #ff6496;
        position: relative;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        transform-origin: center top;
        animation: dropCard 0.7s ease forwards;
        opacity: 0;
        animation-fill-mode: forwards;
    }
    .photo-card:hover {
        transform: scale(1.1) rotate(-3deg);
        box-shadow: 0 18px 48px #ff6496cc;
        z-index: 20;
    }

    .photo-card img {
        width: 100%;
        height: 140px;
        object-fit: cover;
        border-bottom: 2px solid #ff6496;
        border-radius: 12px 12px 0 0;
    }

    .photo-caption {
        font-size: 0.87rem;
        margin-top: 8px;
        color: #ff8cb0;
        letter-spacing: 0.4px;
        padding: 0 12px;
        min-height: 44px;
    }

    .photo-emoji {
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 28px;
        user-select: none;
        pointer-events: none;
        animation: bounceSticker 2.8s infinite alternate;
        color: #ff749a;
        text-shadow: 0 0 5px #ff489a88;
        z-index: 15;
    }

    @keyframes bounceSticker {
        from { transform: scale(0.9) rotate(-9deg); }
        to   { transform: scale(1.18) rotate(10deg); }
    }

    @keyframes dropCard {
        from { transform: translateY(-40px) scale(0.8); opacity: 0; }
        to   { transform: translateY(0) scale(1); opacity: 1; }
    }
</style>

<div>
    <h1>✨ Our Magical Memories ✨</h1>

    <!-- Fairy lights background -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none select-none" style="z-index:0;">
        @for ($i = 0; $i < 50; $i++)
            <div class="light" style="top:{{ rand(5,95) }}%; left:{{ rand(5,95) }}%; animation-delay:{{ rand(0,2) }}s;"></div>
        @endfor

        @for ($i = 0; $i < 20; $i++)
            <div class="heart" style="left:{{ rand(5,95) }}%; animation-delay:{{ rand(0,10) }}s;">❤️</div>
        @endfor
    </div>

    <div class="photo-grid">
        @php
            $files = glob(public_path('images/extra_photos/*.*'));
            $captions = [
                "You light up my life", "Forever and always", "My sunshine on a cloudy day", "You make my heart smile",
                "Endless love and joy", "Together is my favorite place", "You complete me", "All my love, always",
                "Our story, our magic", "Love that grows every day", "My forever valentine", "Sweet moments with you",
                "You make life beautiful", "Just the two of us", "My heart’s home", "Dreaming of you daily",
                "You’re my everything", "Against all odds, us", "The best is with you", "Laughter and love",
                "Our love shines bright", "Moments that matter", "You’re my happy place", "Side by side forever",
                "Pure magic with you", "Each day better with you", "Our lips seal love", "Always your biggest fan",
                "My heart beats for you", "Endless adventures ahead", "Love that lifts me", "Wrapped up in your arms",
                "You’re my safe haven", "To infinity and beyond", "You make dreams real", "Cherished moments shared",
                "Our love story blooms", "Heart full of you", "You & me against the world", "My sweetest addiction",
                "Love is our song", "Warm hugs always", "Two hearts, one beat", "You color my world",
                "Forever in your eyes", "A love like no other", "All the feels for you", "You’re my bright star",
                "Our love, unbreakable", "Home is wherever you are", "You and me, always", "Love grows here",
                "My heart’s compass", "You’re my favorite hello", "Captivated by you", "Always in my thoughts",
                "Soulmates forever", "My heart’s melody", "Bloom where we grow", "You’re my sweetest dream",
                "You light my path", "Together in perfect harmony", "Love writes our story", "Wrapped up in love",
                "You are my fairytale", "With you, forever starts", "Every day with you is magic", "Love beyond words",
                "You make life sparkle", "Warmth of your smile", "Together, unstoppable", "I choose you always",
                "Every moment treasures us", "You’re my heart’s rest", "Endless joy, endless love", "You’re my light in the dark",
                "Love across distances", "Sweet kisses for you", "Our love, a beautiful journey", "You are my forever love",
                "You’re my heart whisper", "Love that never fades", "My heart races for you", "Love’s gentle touch",
                "You hold my heart", "Together through it all"
            ];
            $emojis = [
                "💡", "💞", "☀️", "😊", "💖", "💑", "🧩", "❤️", "📖", "🌱", "💘", "🍬", "🎨", "👩‍❤️‍👨", "🏠", "💭",
                "🌎", "💪", "🏆", "😂❤️", "✨", "⏳", "😍", "🤝", "🪄", "📅", "💋", "🌟", "💓", "🗺️", "🕊️", "🧣",
                "🛡️", "🚀", "🎆", "🎁", "🌺", "💗", "🌍", "🍭", "🎵", "🤗", "💓", "🎨", "👁️❤️", "💎", "😘",
                "🌟", "🔗", "🏡", "🔥", "🌳", "🧭", "👋", "🎯", "💭", "🔥💞", "🎶", "🌸", "🌜", "🕯️", "🎼",
                "✍️", "💝", "📚", "⏰", "🪄", "📝❤️", "💎✨", "😊🔥", "🛡️⚔️", "✔️❤️", "💰❤️", "🛌❤️", "🥳❤️",
                "🌙❤️", "🌍❤️", "😘💋", "🚶‍♂️❤️", "🔒❤️", "🗣️❤️", "🌅❤️", "🏃‍♂️❤️", "🤲❤️", "👐❤️", "🛤️❤️"
            ];
        @endphp

        @forelse($files as $index => $file)
            <div class="photo-card" style="animation-delay: {{ 0.06 * $index }}s;">
                <div class="photo-emoji">{{ $emojis[$index % count($emojis)] }}</div>
                <img src="{{ asset('images/extra_photos/' . basename($file)) }}" alt="Memory photo {{ $index + 1 }}">
                <div class="photo-caption">{{ $captions[$index % count($captions)] }}</div>
            </div>
        @empty
            <p style="text-align:center; font-size:1.25rem; margin-top: 50px; color: #ff8cb0;">
                No photos found yet. Start making beautiful memories!
            </p>
        @endforelse
    </div>
</div>

@endsection
