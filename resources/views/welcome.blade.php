<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>For You ❤️</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.3/dist/tailwind.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        :root{
            --soft-pink: #ffe8ee;
            --rose: #ff6b9a;
            --gold: #ffd27a;
        }

        html, body{
            height: 100%;
            margin: 0;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg, #fff7fb 0%, #fff0f4 40%, #fff7ee 100%);
            overflow-x: hidden;
        }

        /* Container */
        #stage {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 50px;
            min-height: 100vh;
            position: relative;
        }

        .message-box {
            max-width: 600px;
            text-align: center;
            z-index: 50;
        }

        h1{ letter-spacing: -1px; }

        /* Falling items */
        .fall {
            position: absolute;
            top: -10vh;
            pointer-events: none;
            animation-name: fallDown;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            opacity: 0.95;
            transform-origin: center;
        }
        @keyframes fallDown {
            0%   { transform: translateY(-10vh) rotate(0deg) scale(0.9); opacity: 0; }
            5%   { opacity: 1; }
            90%  { opacity: 1; }
            100% { transform: translateY(110vh) rotate(360deg) scale(0.9); opacity: 0; }
        }

        /* Balloons float up */
        .balloon {
            position: absolute;
            bottom: -20vh;
            cursor: pointer;
            transform-origin: center;
            animation-name: floatUp;
            animation-timing-function: ease-in;
            animation-iteration-count: infinite;
        }
        @keyframes floatUp {
            0%   { transform: translateY(0) translateX(0) rotate(0deg) scale(1); opacity: 0; }
            5%   { opacity: 1; }
            80%  { opacity: 1; }
            100% { transform: translateY(-130vh) translateX(20px) rotate(20deg) scale(0.9); opacity: 0; }
        }

        .string {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: -4vh;
            height: 36vh;
            width: 2px;
            background: linear-gradient(#f2c1d3, transparent);
            opacity: 0.6;
        }

        /* Confetti */
        .confetti {
            position: absolute;
            top: -10vh;
            width: 8px;
            height: 12px;
            opacity: 0.95;
            border-radius: 2px;
            transform-origin: center;
            animation: confettiFall linear infinite;
        }
        @keyframes confettiFall {
            0% { transform: translateY(-10vh) rotate(0deg) }
            100% { transform: translateY(110vh) rotate(720deg) }
        }

        /* Sparkle */
        .sparkle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: radial-gradient(circle at 30% 30%, #fff, rgba(255,255,255,0.6) 30%, transparent 60%);
            border-radius: 50%;
            opacity: 0.9;
            animation: glimmer 2.5s ease-in-out infinite;
        }
        @keyframes glimmer {
            0% { transform: scale(0.8); opacity: 0.6 }
            50% { transform: scale(1.4); opacity: 1 }
            100% { transform: scale(0.8); opacity: 0.6 }
        }

        /* Polaroid thread */
        #rope-thread {
            position: fixed;
            inset: 0;
            z-index: 40;
            pointer-events: none;
        }
        .rope-container {
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        .rope-container img.polaroid {
            width: 120px;
            height: 120px;
            border: 4px solid white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            object-fit: cover;
            animation: floatSwing 4s ease-in-out infinite;
        }
        @keyframes floatSwing {
            0% { transform: rotate(-4deg) translateX(0); }
            50% { transform: rotate(4deg) translateX(6px); }
            100% { transform: rotate(-4deg) translateX(0); }
        }

        .left-side { left: 10px; top: 20px; }   /* move closer to top */
        .right-side { right: 10px; top: 20px; }

        #thread-center-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2.5rem;
            font-weight: 800;
            color: #ff6b9a;
            z-index: 50;
        }

        @media (max-width:640px){
            .message-box{ padding: 22px; border-radius: 14px; }
            h1{ font-size: 1.8rem; }
        }

    </style>
</head>
<body>
    <div class="stage" id="stage">
        <div class="message-box animate__animated animate__zoomIn">
            <h1 class="text-5xl font-extrabold text-rose mb-3">🌷 For My Beautiful Girl 🌻</h1>
            <p class="text-lg text-gray-700 mb-5">
                A garden of flowers and sky full of balloons,<br>
                just like the happiness you bring me every day 💕
            </p>
            <div class="flex justify-center gap-4">
                <a href="{{ url('/home') }}" class="inline-block bg-rose hover:bg-red-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg transform transition hover:scale-105">
                    🎁 See your birthday gift
                </a>
            </div>
        </div>
    </div>

    <div id="rope-thread">
        <div class="rope-container left-side"></div>
        <div class="rope-container right-side"></div>
        <h2 id="thread-center-text"></h2>
    </div>

    <script>
        const stage = document.getElementById('stage');
        const leftContainer = document.querySelector(".left-side");
        const rightContainer = document.querySelector(".right-side");
        const centerText = document.getElementById("thread-center-text");

        function rnd(min,max){ return Math.random()*(max-min)+min; }

        // Falling flowers/hearts
        function createFalling(count){
            const emojis = ['🌸','🌻','💮','🌼','💐','🌺','🌷','❤️'];
            for(let i=0;i<count;i++){
                const el = document.createElement('div');
                el.className = 'fall';
                el.style.left = rnd(0,100)+'%';
                el.style.animationDuration = rnd(6,16)+'s';
                el.style.animationDelay = rnd(0,8)+'s';
                el.style.fontSize = rnd(20,48)+'px';
                el.style.opacity = rnd(0.7,1);
                el.innerText = emojis[Math.floor(rnd(0,emojis.length))];
                el.style.transform = `translateY(-10vh) rotate(${rnd(-30,30)}deg)`;
                stage.appendChild(el);
            }
        }

        // Balloons
        function createBalloons(count){
            for(let i=0;i<count;i++){
                const el = document.createElement('div');
                el.className = 'balloon';
                el.style.left = rnd(5,95)+'%';
                el.style.animationDuration = rnd(10,22)+'s';
                el.style.animationDelay = rnd(0,8)+'s';
                el.style.fontSize = rnd(32,64)+'px';
                el.style.opacity = rnd(0.85,1);
                el.innerText = '🎈';
                const string = document.createElement('div');
                string.className='string';
                 string.style.height = rnd(22,40)+'vh';
                el.appendChild(string);
                stage.appendChild(el);
            }
        }

        // Confetti
        function createConfetti(count){
            const colors = ['#ff9aa2','#ffb7b2','#fde2b6','#c7ceea','#b8f2e6','#ffd27a'];
            for(let i=0;i<count;i++){
                const c = document.createElement('div');
                c.className='confetti';
                c.style.left = rnd(0,100)+'%';
                c.style.background=colors[Math.floor(rnd(0,colors.length))];
                c.style.width = rnd(6,12)+'px';
                c.style.height = rnd(8,16)+'px';
                c.style.top = rnd(-20,-5)+'vh';
                c.style.opacity = rnd(0.7,1);
                c.style.animationDuration = rnd(6,14)+'s';
                c.style.animationDelay = rnd(0,8)+'s';
                stage.appendChild(c);
            }
        }

        // Sparkles
        function createSparkles(count){
            for(let i=0;i<count;i++){
                const s=document.createElement('div');
                s.className='sparkle';
                s.style.left=rnd(5,95)+'%';
                s.style.top=rnd(5,80)+'%';
                s.style.animationDelay=rnd(0,2)+'s';
                s.style.width=rnd(4,10)+'px';
                s.style.height=rnd(4,10)+'px';
                stage.appendChild(s);
            }
        }

        // Polaroids
        const polaroids = @json($images ?? []);
        async function wait(ms){ return new Promise(r=>setTimeout(r, ms)); }
        async function typeWords(words, el){
            el.textContent="";
            for(let i=0;i<words.length;i++){
                el.textContent += (i>0?" ":"")+words[i];
                await wait(500);
            }
        }
        async function addPolaroids(){
            for(let i=0;i<polaroids.length;i++){
                const imgL=document.createElement("img");
                imgL.src=polaroids[i];
                imgL.className="polaroid";
                leftContainer.appendChild(imgL);

                const imgR=document.createElement("img");
                imgR.src=polaroids[i];
                imgR.className="polaroid";
                rightContainer.appendChild(imgR);

                await wait(600);
            }
            await wait(300);
            typeWords("Happy Birthday to My World".split(" "), centerText);
        }

        // initialize animations
        createFalling(26);
        createConfetti(26);
        createSparkles(12);
        createBalloons(10);

        window.addEventListener("load", ()=>{ setTimeout(addPolaroids, 2000); });
    </script>
</body>
</html>
