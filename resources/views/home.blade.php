<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Happy Birthday Mu ❤️</title>

<!-- Tailwind CSS -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700&display=swap" rel="stylesheet">
<style>
/* Background */
body {
    background: url('{{ asset("images/birthday-bg.jpg") }}') center/cover no-repeat;
    background-attachment: scroll;
    background-position: center -100px;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    font-family: sans-serif;
}

/* Tabs on top */
.tabs-container {
    position: fixed;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 50;
    background: rgba(255, 228, 240, 0.8);
    border-radius: 30px;
    padding: 8px 12px;
    display: flex;
    gap: 12px;
    box-shadow: 0 0 15px rgba(0,0,0,0.3);
}
.tab-btn {
    background: #ffe0f0;
    border-radius: 20px;
    padding: 8px 20px;
    transition: all 0.3s;
    cursor: pointer;
    font-weight: 600;
}
.tab-btn:hover { background: #ffb6d5; }
.tab-btn.active { background: #ff69b4; color: #fff; }

/* Header */
@font-face {
    font-family: 'Madina Script';
    src: url('{{ asset("fonts/MadinaScript-Regular.woff2") }}') format('woff2'),
         url('{{ asset("fonts/MadinaScript-Regular.woff") }}') format('woff');
    font-weight: normal;
    font-style: normal;
}
.birthday-heading {
    font-family: 'Madina Script', cursive;
    font-size: 3rem;
    color: #000;
    text-align: center;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.4);
    margin: 150px auto 20px auto;
    animation: fadeInDown 2s ease-out;
}
@media (min-width: 768px) { .birthday-heading { font-size: 4rem; } }
@keyframes fadeInDown { from {opacity:0; transform: translateY(-50px);} to {opacity:1; transform:translateY(0);} }

/* Casio Timer */
.casio-watch {
    font-family: 'Orbitron', monospace;
    font-size: 1.2rem;
    color: #00ff9d;
    background: #111;
    border: 3px solid #555;
    border-radius: 10px;
    padding: 10px 15px;
    margin: 20px auto 40px auto;
    text-align: center;
    display: block;
    box-shadow: 0 0 15px rgba(0,255,157,0.4), inset 0 0 8px #000;
    letter-spacing: 2px;
    width: fit-content;
}
@media (min-width: 768px) { .casio-watch { font-size: 2rem; padding: 15px 25px; } }

/* Polaroid Images */
.polaroid { background: #fff; padding: 6px 6px 12px 6px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); text-align: center; flex-shrink: 0; width: 90px; }
.polaroid img { width: 100%; height: 80px; object-fit: cover; border-radius: 4px; }
.polaroid .caption { font-size: 0.65rem; font-style: italic; color: #333; margin-top:4px; }
@media (min-width:768px) { .polaroid { width: 120px; padding: 8px 8px 16px 8px; } .polaroid img { height: 100px; } .polaroid .caption { font-size: 0.8rem; } }

/* Gallery Rows */
.gallery-row { display:flex; justify-content:center; gap:0.5rem; flex-wrap:wrap; }
@media (min-width:768px) { .gallery-row { gap:1rem; } }
.top-photos { margin-top:20px; margin-bottom:40px; }
.bottom-row { margin-top:100px; margin-bottom:40px; }

/* Falling Hearts */
#hearts-container { position:fixed; top:0; left:0; width:100%; height:100%; pointer-events:none; overflow:hidden; }
.heart { position:absolute; width:12px; height:12px; background:#ff69b4; opacity:0.8; transform:rotate(45deg); animation: fall linear infinite; }
.heart::before, .heart::after { content:""; position:absolute; width:12px; height:12px; background:#ff69b4; border-radius:50%; }
.heart::before { top:-6px; left:0; } .heart::after { left:-6px; top:0; }
@keyframes fall { 0%{ transform:translateY(0) rotate(45deg); opacity:1;} 100%{ transform:translateY(100vh) rotate(45deg); opacity:0;} }

/* Tab Content */
.tab-content { display:none; padding-bottom:60px; }
.tab-content.active { display:block; }

/* Editable answer */
#her-answer { contenteditable:true; background:#fff; color:#000; padding:10px; border-radius:10px; width:220px; margin:0 auto; box-shadow:0 0 10px rgba(0,0,0,0.3); min-height:40px; outline:none; text-align:center; }
</style>
</head>
<body>

<!-- Hearts -->
<div id="hearts-container"></div>

<!-- Tabs on top -->
<div class="tabs-container">
    <button class="tab-btn" onclick="goToPage('{{ route('extra.photos') }}')">Special Photos</button>
    <button class="tab-btn" onclick="goToPage('{{ route('extra.videos') }}')">Special Videos</button>
    <button class="tab-btn" onclick="goToPage('{{ route('extra.messages') }}')">Love Letters</button>
    <button class="tab-btn" onclick="goToPage('{{ route('extra.question') }}')">Your Answer ❤️</button>
</div>




<!-- Header & Timer -->
<h1 class="birthday-heading">Happy Birthday Mu ❤️</h1>
<div id="countdown" class="casio-watch"></div>

<!-- Homepage Tab Contents -->
<div class="max-w-6xl mx-auto px-4">

    <!-- Photos Tab (homepage existing images) -->
    <div id="photos" class="tab-content active">
        <div class="gallery-row top-photos">
            @for ($i = 1; $i <= 3; $i++)
            <div class="polaroid">
                <img src="{{ asset('images/photo'.$i.'.jpg') }}" alt="">
                <div class="caption">
                    @switch($i)
                        @case(1) "Your smile makes my world brighter." @break
                        @case(2) "Every moment with you feels like magic." @break
                        @case(3) "I cherish all the memories we create together." @break
                    @endswitch
                </div>
            </div>
            @endfor
        </div>
        <div class="gallery-row bottom-row">
            @for ($i = 4; $i <= 10; $i++)
            <div class="polaroid">
                <img src="{{ asset('images/photo'.$i.'.jpg') }}" alt="">
                <div class="caption">
                    @switch($i)
                        @case(4) "You are my sunshine on cloudy days." @break
                        @case(5) "Life is better with you by my side." @break
                        @case(6) "Happy Birthday, my love. You make everything beautiful." @break
                        @case(7) "Distance means so little when someone means so much." @break
                        @case(8) "Even miles apart, our hearts are connected." @break
                        @case(9) "I miss you more than words can say." @break
                        @case(10) "Counting the days until we are together again." @break
                    @endswitch
                </div>
            </div>
            @endfor
        </div>
    </div>

    <!-- Videos Tab -->
    <div id="videos" class="tab-content">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Our Sweet Videos</h2>
        <div class="flex flex-wrap justify-center gap-4">
            @for ($i=1; $i<=3; $i++)
            <div class="polaroid" style="width:200px;">
                <video src="{{ asset('videos/video'.$i.'.mp4') }}" controls class="rounded"></video>
                <div class="caption">"Our memory #{{ $i }}"</div>
            </div>
            @endfor
        </div>
    </div>

    <!-- Messages Tab -->
    <div id="messages" class="tab-content">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Love Letters</h2>
        <div class="max-w-3xl mx-auto px-4 text-center space-y-4">
            <p class="italic">"Mu, you are the reason my days are brighter and my heart feels full."</p>
            <p class="italic">"I wish we could be together today, but every moment I spend thinking of you is filled with love."</p>
        </div>
    </div>

    <!-- Question Tab -->
    <div id="question" class="tab-content">
        <h2 class="text-2xl md:text-3xl font-bold text-center mb-4">Your Answer ❤️</h2>
        <p class="text-xl mb-6">"Will you spend your next birthday with me?"</p>
        <div id="her-answer">Type your answer here...</div>
    </div>
</div>

<!-- Scripts -->
<script>
// Countdown Timer
const countdownDate = new Date("October 7, 2025 23:30:00 GMT+0530").getTime();
const countdownEl = document.getElementById('countdown');
setInterval(() => {
    const now = new Date().getTime();
    const distance = countdownDate - now;
    if(distance < 0){ countdownEl.innerHTML = "🎉 It's time to celebrate! 🎉"; return; }
    const days = Math.floor(distance / (1000*60*60*24));
    const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
    const minutes = Math.floor((distance % (1000*60*60)) / (1000*60));
    const seconds = Math.floor((distance % (1000*60)) / 1000);
    countdownEl.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
}, 1000);

// Falling Hearts
const heartsContainer = document.getElementById('hearts-container');
function createHeart(){
    const heart = document.createElement('div');
    heart.classList.add('heart');
    heart.style.left = Math.random()*window.innerWidth+'px';
    heart.style.animationDuration = (3 + Math.random()*3)+'s';
    heartsContainer.appendChild(heart);
    setTimeout(()=>{ heart.remove(); }, 6000);
}
setInterval(createHeart, 300);


const tabButtons = document.querySelectorAll('.tab-btn');
const contentContainer = document.getElementById('tab-content-container');

tabButtons.forEach(btn => {
    btn.addEventListener('click', async () => {
        tabButtons.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        // Fetch content dynamically
        const url = btn.getAttribute('data-url');
        if(!url) return;

        try {
            const res = await fetch(url);
            const html = await res.text();
            contentContainer.innerHTML = html;
        } catch (err) {
            contentContainer.innerHTML = "<p class='text-center text-red-500'>Failed to load content.</p>";
        }
    });
});

function goToPage(url){
    window.location.href = url; // Redirect to the page
}

</script>
</body>
</html>
