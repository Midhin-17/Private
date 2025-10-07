<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Romantic Video Gallery for Her 🎥</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body {
    background: radial-gradient(circle at center, #2c003e 0%, #0a0012 100%);
    color: #ffcee4;
    font-family: 'Dancing Script', cursive, Arial, sans-serif;
    margin: 0;
    position: relative;
    overflow-x: hidden;
  }

  h1 {
    text-shadow: 2px 2px 8px #ff69b4cc;
    margin: 2rem 0 1rem;
  }

/* Perfect balanced theater container */
.theater-video-container {
  position: relative;
  width: 85vw;             /* a bit wider */
  max-width: 750px;        /* nice balanced width */
  padding-bottom: 50%;     /* shorter height than 16:9 */
  margin: 1rem auto 2rem;  /* add top margin so it clears the heading */
  background: #000;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 0 40px #ff69b4cc, 0 0 80px rgba(0,0,0,0.6) inset;
}

.theater-video-container video {
  position: absolute;
  top: 0; 
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: contain;   /* so portrait videos fit without being cut */
  border-radius: 16px;
  border: 4px solid #ff1493;
  background: #000;      /* black bars if aspect ratio doesn't match */
  transition: box-shadow 0.5s ease, transform 0.3s ease;
}

.theater-video-container video:hover {
  box-shadow: 0 0 70px #ff1493;
  transform: scale(1.01);
}


  /* Gallery grid styling */
  .gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
    gap: 16px;
    max-width: 960px;
    margin: 0 auto 4rem;
  }

  .thumbnail-container {
    text-align: center;
  }

  .thumbnail-img {
    cursor: pointer;
    border-radius: 16px;
    border: 3px solid transparent;
    width: 100%;
    height: 100px;
    object-fit: cover;
    box-shadow: 0 0 12px #ff69b440;
    transition: border-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s;
  }
  .thumbnail-img:hover {
    transform: scale(1.07);
    border-color: #ff1493;
    box-shadow: 0 0 30px #ff1493aa;
  }
  .thumbnail-img.active {
    border-color: #ff1493;
    box-shadow: 0 0 40px #ff1493dd;
  }

  .caption {
    margin-top: 6px;
    font-size: 0.8rem;
    font-style: italic;
    color: #ffc6dd;
  }

  /* Responsive adjustments for mobile */
  @media (max-width: 768px) {
    .gallery {
      grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    }
    .thumbnail-img {
      height: 140px;
    }
    .theater-video-container {
      width: 90vw;
      max-width: 90vw; /* take almost full width on tablet */
    }
  }

  @media (max-width: 480px) {
    .gallery {
      grid-template-columns: 1fr;
      gap: 12px;
    }
    .thumbnail-img {
      height: 180px;
    }
    .theater-video-container {
      width: 95vw;  /* smaller devices = more width */
    }
  }

  /* Floating hearts animation */
  .heart {
    position: absolute;
    bottom: -50px;
    color: #ff69b4aa;
    font-size: 24px;
    animation: floatUp 8s linear infinite;
  }
  @keyframes floatUp {
    0% { transform: translateY(0) scale(1); opacity: 1; }
    100% { transform: translateY(-120vh) scale(1.5); opacity: 0; }
  }
</style>
</head>
<body class="flex flex-col items-center min-h-screen p-6">

<h1 class="text-5xl font-bold text-pink-400">🌹 For My Love, {{ $herName ?? 'Her' }} 🌹</h1>

<div class="theater-video-container">
  <video id="mainVideo" controls autoplay muted playsinline loop></video>
</div>

<div id="gallery" class="gallery"></div>

<!-- Floating hearts container -->
<div id="hearts"></div>

<script>
  const videos = @json($videos);

  const mainVideo = document.getElementById('mainVideo');
  const gallery = document.getElementById('gallery');
  let currentIndex = 0;

  function switchVideo(index) {
    currentIndex = index;
    mainVideo.style.opacity = 0;
    setTimeout(() => {
      mainVideo.src = videos[index];
      mainVideo.play();
      mainVideo.style.opacity = 1;
    }, 400);

    document.querySelectorAll('.thumbnail-img').forEach((vid, i) => {
      vid.classList.toggle('active', i === index);
    });
  }

  videos.forEach((videoUrl, index) => {
    const container = document.createElement('div');
    container.className = 'thumbnail-container';

    const vid = document.createElement('video');
    vid.src = videoUrl;
    vid.muted = true;
    vid.autoplay = true;
    vid.loop = true;
    vid.playsInline = true;
    vid.className = 'thumbnail-img';
    vid.addEventListener('click', () => switchVideo(index));

    const caption = document.createElement('p');
    caption.textContent = "🎥 " + videoUrl.split('/').pop().replace(/\.[^/.]+$/, "");
    caption.className = 'caption';

    container.appendChild(vid);
    container.appendChild(caption);
    gallery.appendChild(container);
  });

  if (videos.length > 0) switchVideo(0);

  mainVideo.addEventListener('ended', () => {
    currentIndex = (currentIndex + 1) % videos.length;
    switchVideo(currentIndex);
  });

  function createHeart() {
    const heart = document.createElement('div');
    heart.className = 'heart';
    heart.innerHTML = '❤️';
    heart.style.left = Math.random() * 100 + 'vw';
    heart.style.fontSize = Math.random() * 20 + 20 + 'px';
    heart.style.animationDuration = (5 + Math.random() * 5) + 's';
    document.getElementById('hearts').appendChild(heart);
    setTimeout(() => heart.remove(), 10000);
  }
  setInterval(createHeart, 800);
</script>

</body>
</html>
