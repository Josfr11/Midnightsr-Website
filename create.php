<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Account</title>
 </head>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Calibri', sans-serif;
      background: url('assets/img/416328080_389790163457371_7215092823150995465_n.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .card {
      background-color: rgba(23, 22, 22, 0.8);
      border-radius: 20px;
      padding: 30px;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      z-index: 2;
      position: relative;
    }

    h2 {
      text-align: center;
      color: orange;
      margin-bottom: 24px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: white;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 1px solid #ccc;
      outline: none;
      font-size: 16px;
    }

    .input-group input:focus {
      border-color: rgb(255, 77, 0);
    }

    .error {
      color: orange;
      font-size: 14px;
      margin-top: 6px;
    }

    .submit-btn {
      background-color: orange;
      color: white;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s;
      margin-top: 10px;
    }

    .submit-btn:hover {
      background-color: darkorange;
    }

    .toggle-link {
      text-align: center;
      margin-top: 15px;
      color: rgb(230, 228, 228);
      cursor: pointer;
    }

    .hidden {
      display: none;
    }

    #fireCanvas {
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 1;
    }
  </style>
</head>
<body>
  <canvas id="fireCanvas"></canvas>

  <div class="card">
    <h2 id="formTitle">Create Account</h2>

    <form id="signupForm" novalidate>
      <div class="input-group">
        <label for="signupUsername">Username</label>
        <input type="text" id="signupUsername" placeholder="Username" />
        <div class="error" id="signupUsernameError"></div>
      </div>
      <div class="input-group">
        <label for="signupEmail">Email</label>
        <input type="email" id="signupEmail" placeholder="Email" />
        <div class="error" id="signupEmailError"></div>
      </div>
      <div class="input-group">
        <label for="signupPassword">Password</label>
        <input type="password" id="signupPassword" placeholder="Password" />
        <div class="error" id="signupPasswordError"></div>
      </div>
      <button type="submit" class="submit-btn">Create Account</button>
    </form>

    <div class="toggle-link" id="toggleLink" style="display: none;">Already have an account? Login</div>
  </div>

  <script>
    const signupForm = document.getElementById('signupForm');

    signupForm.addEventListener('submit', function (e) {
      e.preventDefault();

      const username = document.getElementById('signupUsername');
      const email = document.getElementById('signupEmail');
      const password = document.getElementById('signupPassword');

      const usernameError = document.getElementById('signupUsernameError');
      const emailError = document.getElementById('signupEmailError');
      const passwordError = document.getElementById('signupPasswordError');

      usernameError.textContent = '';
      emailError.textContent = '';
      passwordError.textContent = '';

      let valid = true;

      if (username.value.trim() === '') {
        usernameError.textContent = 'Username is required.';
        valid = false;
      }

      if (email.value.trim() === '') {
        emailError.textContent = 'Email is required.';
        valid = false;
      } else if (!/\S+@\S+\.\S+/.test(email.value.trim())) {
        emailError.textContent = 'Enter a valid email address.';
        valid = false;
      }

      if (password.value.trim() === '') {
        passwordError.textContent = 'Password is required.';
        valid = false;
      } else if (password.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters.';
        valid = false;
      }

      if (valid) {
        alert('Account created successfully!');
        window.location.href = "index.html";
      }
    });

    // Fire particle effect
    const canvas = document.getElementById('fireCanvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    let particles = [];

    function createParticle(x, y) {
      particles.push({
        x,
        y,
        size: Math.random() * 5 + 2,
        speedX: Math.random() * 2 - 1,
        speedY: Math.random() * -2 - 1,
        opacity: 1
      });
    }

    function handleParticles() {
      for (let i = 0; i < particles.length; i++) {
        const p = particles[i];
        p.x += p.speedX;
        p.y += p.speedY;
        p.opacity -= 0.02;
        p.size *= 0.96;

        ctx.beginPath();
        ctx.fillStyle = `rgba(255, ${Math.floor(Math.random() * 100 + 100)}, 0, ${p.opacity})`;
        ctx.arc(p.x, p.y, p.size, 0, Math.PI * 2);
        ctx.fill();

        if (p.opacity <= 0) {
          particles.splice(i, 1);
          i--;
        }
      }
    }

    window.addEventListener('mousemove', (e) => {
      for (let i = 0; i < 5; i++) {
        createParticle(e.clientX, e.clientY);
      }
    });

    function animate() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);
      handleParticles();
      requestAnimationFrame(animate);
    }

    animate();

    window.addEventListener('resize', () => {
      canvas.width = window.innerWidth;
      canvas.height = window.innerHeight;
    });
  </script>
</body>
</html>
