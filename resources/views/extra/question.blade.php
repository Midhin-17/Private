<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Will You Marry Me Game</title>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Comic Sans MS', cursive, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    background: url("https://images.unsplash.com/photo-1506744038136-46273834b3fb") no-repeat center center/cover;
    position: relative;
    overflow: hidden;
    color: #fff;
  }

  /* Soft overlay */
  body::before {
    content: "";
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    background: rgba(214, 51, 108, 0.5);
    z-index: 0;
  }

  #game {
    position: relative;
    z-index: 1;
    max-width: 700px;
    padding: 30px;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 20px;
    backdrop-filter: blur(8px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.3);
    animation: fadeIn 1s ease-in-out;
  }

  .question {
    font-size: 2em;
    margin-bottom: 30px;
    animation: bounce 1.5s infinite alternate;
    color: #fffbea;
  }

  button {
    background: linear-gradient(135deg, #ff6f91, #ff9671);
    border: none;
    border-radius: 50px;
    padding: 15px 35px;
    margin: 10px;
    font-size: 1.2em;
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }

  button:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 18px rgba(0,0,0,0.3);
  }

  @keyframes bounce {
    from { transform: translateY(0); }
    to { transform: translateY(-12px); }
  }

  @keyframes fadeIn {
    from { opacity:0; transform: scale(0.9); }
    to { opacity:1; transform: scale(1); }
  }

  /* Floating hearts animation */
  .heart {
    position: absolute;
    color: #ff4e72;
    font-size: 2rem;
    animation: floatUp 6s linear infinite;
    opacity: 0.8;
  }

  @keyframes floatUp {
    from { transform: translateY(100vh) scale(0.8); opacity: 1; }
    to { transform: translateY(-10vh) scale(1.5); opacity: 0; }
  }

</style>
</head>
<body>
  <div id="game">
    <div class="question" id="questionText">Will you please stay with me until the very end?</div>
    <button onclick="answer()">Yes 😊</button>
    <button onclick="answer()">Absolutely Yes 😘</button>
  </div>

<script>
  const questions = [
    "Will you please stay with me until the very end?",
    "Will you walk beside me through every season of life?",
    "Will you hold my hand when the days feel heavy?",
    "Will you laugh with me even when we have nothing?",
    "Will you dream with me and build our future together?",
    "Will you forgive me on the days I am not my best?",
    "Will you share your heart with me, always?",
    "Will you travel through this life with me, side by side?",
    "Will you be my safe place, no matter what happens?",
    "Will you marry me and make forever our story? 💍"
  ];

  let index = 0;
  const questionText = document.getElementById('questionText');

  function answer() {
    index++;
    if (index < questions.length) {
      questionText.textContent = questions[index];
    } else {
      document.getElementById('game').innerHTML =
        `<h1 style="font-size:3em;">💖 I knew you'd say YES! 💍</h1>
         <p style="font-size:1.5em;">Forever starts with us, my love. ❤️</p>`;
      spawnHearts();
    }
  }

  // Floating hearts on final screen
  function spawnHearts() {
    for (let i = 0; i < 20; i++) {
      let heart = document.createElement("div");
      heart.className = "heart";
      heart.innerHTML = "💖";
      heart.style.left = Math.random() * 100 + "vw";
      heart.style.animationDuration = (4 + Math.random() * 4) + "s";
      document.body.appendChild(heart);

      setTimeout(() => heart.remove(), 8000);
    }
    setInterval(spawnHearts, 3000);
  }
</script>
</body>
</html>
