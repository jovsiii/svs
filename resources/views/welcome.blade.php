<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SVS - School Violence System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #000;
            position: relative;
            overflow: hidden;
        }
        
        .galaxy {
            position: absolute;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, #1a1a2e 0%, #0a0a0f 40%, #000 100%);
        }
        
        .stars {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .star {
            position: absolute;
            background: white;
            border-radius: 50%;
            animation: twinkle 3s infinite;
        }
        
        .shooting-star {
            position: absolute;
            height: 2px;
            animation: shoot 3s linear infinite;
        }
        
        .shooting-star.blue {
            background: linear-gradient(to right, transparent, #4FC3F7, transparent);
        }
        
        .shooting-star.yellow {
            background: linear-gradient(to right, transparent, #FFD54F, transparent);
        }
        
        .shooting-star.purple {
            background: linear-gradient(to right, transparent, #BA68C8, transparent);
        }
        
        @keyframes twinkle {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
        
        @keyframes shoot {
            0% {
                transform: translateX(-100px) translateY(0) rotate(-45deg);
                opacity: 1;
                width: 0;
            }
            10% {
                width: 100px;
            }
            100% {
                transform: translateX(calc(100vw + 100px)) translateY(100vh) rotate(-45deg);
                opacity: 0;
                width: 100px;
            }
        }
        
        .content {
            position: relative;
            z-index: 10;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .svs-logo {
            font-size: 6rem;
            font-weight: bold;
            color: #000;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 255, 255, 0.6), 0 0 60px rgba(255, 255, 255, 0.3);
            letter-spacing: 0.2em;
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        .svs-subtitle {
            font-size: 1.2rem;
            color: #aaa;
            margin-top: 1rem;
            letter-spacing: 0.1em;
        }
        
        @keyframes glow {
            from { text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 60px rgba(255, 255, 255, 0.4); }
            to { text-shadow: 0 0 40px rgba(255, 255, 255, 1), 0 0 80px rgba(255, 255, 255, 0.6); }
        }
        
        .nav-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
            display: flex;
            gap: 10px;
        }
        
        .nav-btn {
            padding: 12px 24px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(0, 0, 0, 0.7);
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-size: 16px;
            backdrop-filter: blur(10px);
        }
        
        .nav-btn:hover {
            background: rgba(0, 0, 0, 0.9);
            border-color: rgba(255, 255, 255, 0.4);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.8);
            transform: translateY(-2px);
        }
        
        .nav-btn.primary {
            background: rgba(0, 0, 0, 0.8);
            border-color: rgba(255, 255, 255, 0.3);
        }
        
        .nav-btn.primary:hover {
            background: rgba(0, 0, 0, 0.95);
            border-color: rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="galaxy"></div>
    <div class="stars" id="stars"></div>
    
    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        @if (Route::has('login') && Route::has('register'))
            <a href="{{ route('login') }}" class="nav-btn">Login</a>
            <a href="{{ route('register') }}" class="nav-btn primary">Register</a>
        @endif
    </div>
    
    <div class="content">
        <div class="svs-logo">SVS</div>
        <div class="svs-subtitle">SCHOOL VIOLENCE SYSTEM</div>
    </div>

    <script>
        // Generate random stars
        function createStars() {
            const starsContainer = document.getElementById('stars');
            const numberOfStars = 150;
            
            for (let i = 0; i < numberOfStars; i++) {
                const star = document.createElement('div');
                star.className = 'star';
                
                // Random position
                star.style.left = Math.random() * 100 + '%';
                star.style.top = Math.random() * 100 + '%';
                
                // Random size
                const size = Math.random() * 2 + 1;
                star.style.width = size + 'px';
                star.style.height = size + 'px';
                
                // Random animation delay
                star.style.animationDelay = Math.random() * 3 + 's';
                
                starsContainer.appendChild(star);
            }
        }
        
        // Create shooting stars
        function createShootingStar() {
            const shootingStar = document.createElement('div');
            
            // Random color selection
            const colors = ['', 'blue', 'yellow', 'purple'];
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            shootingStar.className = 'shooting-star ' + randomColor;
            
            // Random starting position at top
            const startX = Math.random() * window.innerWidth;
            const startY = Math.random() * (window.innerHeight / 2);
            
            shootingStar.style.left = startX + 'px';
            shootingStar.style.top = startY + 'px';
            
            document.body.appendChild(shootingStar);
            
            // Remove shooting star after animation
            setTimeout(() => {
                shootingStar.remove();
            }, 3000);
        }
        
        // Initialize stars when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createStars();
            
            // Create shooting stars periodically
            setInterval(createShootingStar, 2000);
            
            // Create initial shooting stars
            setTimeout(createShootingStar, 500);
            setTimeout(createShootingStar, 1500);
        });
    </script>
</body>
</html>