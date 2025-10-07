<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Romantic Love Letter 💌</title>
  <style>
    body {
      margin: 0;
      background: radial-gradient(circle at top right, #0f1a2b, #02121f 70%);
      height: 100vh;
      overflow: hidden;
      font-family: 'Times New Roman', Times, serif;
      color: #f0e9db;
      position: relative;
    }

    /* Moon */
    .moon-container {
      position: absolute;
      top: 50px;
      right: 80px;
      width: 200px;
      height: 200px;
      animation: slowRotate 30s linear infinite;
      z-index: 5;
    }
    .moon {
      width: 70%;
      height: 70%;
      background-image: url('https://upload.wikimedia.org/wikipedia/commons/e/e1/FullMoon2010.jpg');
      background-size: cover;
      border-radius: 50%;
      box-shadow: 0 0 50px 20px rgba(255, 255, 255, 0.4),
                  inset 0 0 15px 5px rgba(0, 0, 0, 0.5);
      filter: drop-shadow(0 0 15px #fff9d4);
    }
    .moon::after {
      content: '';
      position: absolute;
      top: -20px; left: -20px; right: -20px; bottom: -20px;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0) 70%);
      border-radius: 50%;
      z-index: -1;
    }
    @keyframes slowRotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Stars */
    .star {
      position: absolute;
      background: white;
      border-radius: 50%;
      opacity: 0.8;
      animation: twinkle 2s infinite alternate;
    }
    @keyframes twinkle {
      from { opacity: 0.2; }
      to { opacity: 1; }
    }

    /* Shooting star */
    .shooting-star {
      position: absolute;
      width: 2px;
      height: 100px;
      background: linear-gradient(-45deg, white, rgba(255,255,255,0));
      opacity: 0.7;
      transform: rotate(45deg);
      animation: shoot 1s linear forwards;
    }
    @keyframes shoot {
      from { transform: translateX(0) translateY(0) rotate(45deg); opacity: 1; }
      to { transform: translateX(-400px) translateY(400px) rotate(45deg); opacity: 0; }
    }

    /* Envelope styling */
    .envelope {
      position: relative;
      width: 320px;
      height: 220px;
      background: #f9c5d1;
      border: 2px solid #d87a9c;
      cursor: pointer;
      perspective: 1000px;
      border-radius: 6px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      overflow: hidden;
      margin: 260px auto 20px;
      z-index: 10;
      transition: transform 1s;
    }
    .envelope:before, .envelope:after {
      content: '';
      position: absolute;
      width: 100%;
      height: 50%;
      background: #f497b6;
      left: 0;
      transition: transform 1s ease;
      z-index: 2;
    }
    .envelope:before { top: 0; border-bottom: 2px solid #d87a9c; transform-origin: top; }
    .envelope:after { bottom: 0; border-top: 2px solid #d87a9c; transform-origin: bottom; }
    .envelope.open:before { transform: rotateX(-180deg); }
    .envelope.open:after { transform: rotateX(180deg); }

    .envelope-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-family: 'Times New Roman', Times, serif;
      font-size: 32px;
      color: #d87a9c;
      text-align: center;
      pointer-events: none;
      z-index: 3;
    }

    /* Letter modal styling */
    .letter {
      position: fixed;
      top: 50%; left: 50%;
      transform: translate(-50%, -50%) scale(0.9);
      width: 700px; max-width: 90vw;
      height: 450px;
      background: linear-gradient(180deg, #fff9e6, #f5e2b8);
      border: 2px solid #c9a66b;
      border-radius: 10px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.25);
      padding: 25px;
      opacity: 0;
      overflow-y: auto;
      transition: opacity 1.5s ease, transform 1.5s ease;
      z-index: 15;
      font-size: 15px;
      line-height: 1.8;
      color: #2d1b07;
      font-family: 'Times New Roman', Times, serif;
      user-select: text;
      pointer-events: none;
    }
    .letter.show-letter {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
      pointer-events: auto;
    }
    .letter h2 { text-align: center; font-size: 32px; margin-bottom: 15px; font-family: 'Times New Roman', Times, serif; }
    .letter p { white-space: pre-wrap; font-family: 'Times New Roman', Times, serif; }

    /* Typing animation */
    .typing span {
      display: inline-block;
      opacity: 0;
      transform: translateY(15px);
      animation: appear 0.04s forwards;
    }
    @keyframes appear { to { opacity: 1; transform: translateY(0); } }
  </style>
</head>
<body>

  <div class="moon-container"><div class="moon"></div></div>
  <div id="stars"></div>

  <div class="envelope" id="envelope" aria-label="Click to open the envelope to read the love letter">
    <div class="envelope-text">❤️</div>
  </div>

 <div class="letter" id="letter">
  <h2>My Dearest MU 💌</h2>
  <p id="fullText">
MU, I still remember the day you called me "Mama" during our video call and took a screenshot of me. That single word, that tiny moment—it made my heart skip in a way I had never felt before. ❤️ It was the very first time in my life I truly fell in love, just for that word. And MU, I will never forget the first time you sent me your photo, our first video call, and your first voice message on my birthday. Those moments were so special to me, because I had never been on the receiving side of love like that before. It made me feel truly seen, loved, and happy in a way I had never experienced. ❤️ MU, when we spend whole nights together, talking endlessly, sharing our stories, our dreams, and every little secret, I feel so close to you. Whenever you ask me to stay a little longer in the midnight, it fills me with pure happiness. 🌙 Even a single day without those moments makes me feel worried and incomplete, because those nights with you are the most special part of my life. MU, even during our misunderstandings, when you go silent, I can’t help but worry. Sometimes when you are with your friends or talking to your seniors and mention other boys, it makes me a little jealous. I’m not thinking that you will ever leave me, but because of my past, I tend to overthink everything. 💔 Yet, every time, you choose me, and that makes me realize how much I want you in my entire life. 💖 MU, I know I’ve hurt you a lot at times, and I’m truly sorry. But trust me, I will never leave you—not now, not ever, in my entire life. 💖 Let’s always keep everything open between us. Don’t hide anything, no secrets, no cheating—though I know we never would. Whatever space or problem comes between us, we will sit, talk, and work through it together. We will love, grow, and face everything side by side. 🌹 Then, when you came to India for your holiday, we spoke a lot, and I even got to meet your family over a video call. You shared everything with me so openly, and those moments made me feel closer to you than ever. 💕 MU, I also sometimes expect little things from you, like sending me images, asking about my day, sending a voice note, a snap of you, an untold video call, or a “love you” message. I don’t say this because you haven’t done these things—I know you love me—but my heart just craves these small gestures sometimes. 💖 They make me feel even closer to you and remind me of your love in little ways. 🌹 MU, I also want us to grow together in love. If I ever do something wrong, please teach me—I want to learn and become better for you. 💖 Let’s learn from each other, love each other stronger, and always support each other. Sometimes, I feel like you’re just replying to my messages, and I miss the warmth of your attention, but I know it’s because you care in your own way. 🌹 We’ve also suffered through each other sometimes. The lie you once told me broke my heart, and some unwanted things happened too—but I don’t want to mention them here to spoil your day. Everything is going to be okay, because I trust you, MU, and I know you love me with all your heart. ❤️ MU, you are not just my love; you are my best friend, my safe place, my happiness, and my forever. Every memory with you is precious, and every moment apart makes me cherish you even more. 🌹 MU, I want you to know that I am not only here for your happy moments, but also for the times when you feel sad, lonely, or in pain. Whenever you feel low, upset, or going through hard times, I will always stay by your side, holding you close in my heart. Happy Birthday, my angel ✨ Even if distance separates us, my love will always reach you like a warm hug. 💌 You will always be the most special part of my life, and I promise to always make you feel loved, cherished, and adored. "நான் இருக்கேன் உனக்காக எப்பவும் எங்கையும்" ❤️🤗
  </p>
  <p style="text-align:right;">Forever Yours, Your Mama ❤️</p>
</div>

  <script>
    const envelope = document.getElementById('envelope');
    const letter = document.getElementById('letter');
    const starsContainer = document.getElementById('stars');

    let opened = false;

    // Generate random stars
    for (let i = 0; i < 120; i++) {
      const star = document.createElement('div');
      const size = Math.random() * 2 + 1;
      star.classList.add('star');
      star.style.width = size + 'px';
      star.style.height = size + 'px';
      star.style.top = Math.random() * 100 + 'vh';
      star.style.left = Math.random() * 100 + 'vw';
      star.style.animationDuration = (Math.random() * 3 + 2) + 's';
      starsContainer.appendChild(star);
    }

    // Shooting stars occasionally
    setInterval(() => {
      const shootingStar = document.createElement('div');
      shootingStar.classList.add('shooting-star');
      shootingStar.style.top = Math.random() * 50 + 'vh';
      shootingStar.style.left = Math.random() * 100 + 'vw';
      document.body.appendChild(shootingStar);
      setTimeout(() => shootingStar.remove(), 1000);
    }, 4000);

    envelope.addEventListener('click', () => {
      if (opened) return;
      opened = true;
      envelope.classList.add('open');

      setTimeout(() => {
        letter.classList.add('show-letter');

        // Typing animation
        const text = document.getElementById('fullText');
        const fullText = text.textContent;
        text.textContent = '';
        [...fullText].forEach((char, i) => {
          const span = document.createElement('span');
          span.textContent = char;
          span.style.animationDelay = `${i * 0.02}s`;
          span.classList.add('typing');
          text.appendChild(span);
        });

        setTimeout(() => { envelope.style.display = 'none'; }, 1200);
      }, 1000);
    });
  </script>
</body>
</html>
