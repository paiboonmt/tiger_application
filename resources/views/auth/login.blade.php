<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>ยิงเสือ - มวยไทย Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700;800&family=Kanit:wght@600;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Sarabun', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #8B0000 0%, #DC143C 25%, #FF6347 50%, #FFD700 100%);
            position: relative;
            overflow: hidden;
        }

        /* Thai Pattern Background */
        body::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(255, 215, 0, 0.1) 35px, rgba(255, 215, 0, 0.1) 70px),
                repeating-linear-gradient(-45deg, transparent, transparent 35px, rgba(139, 0, 0, 0.1) 35px, rgba(139, 0, 0, 0.1) 70px);
            animation: patternShift 20s linear infinite;
        }

        @keyframes patternShift {
            0% {
                transform: translate(0, 0);
            }

            100% {
                transform: translate(70px, 70px);
            }
        }

        /* Tiger Stripes Effect */
        .tiger-stripes {
            position: absolute;
            inset: 0;
            opacity: 0.15;
            background:
                repeating-linear-gradient(90deg, transparent, transparent 20px, #000 20px, #000 25px),
                repeating-linear-gradient(120deg, transparent, transparent 15px, rgba(0, 0, 0, 0.8) 15px, rgba(0, 0, 0, 0.8) 18px),
                repeating-linear-gradient(60deg, transparent, transparent 18px, rgba(0, 0, 0, 0.6) 18px, rgba(0, 0, 0, 0.6) 21px);
            mix-blend-mode: multiply;
        }

        .login-container {
            position: relative;
            width: 450px;
            padding: 20px;
            z-index: 10;
        }

        .login-card {
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow:
                0 25px 60px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 215, 0, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.1);
            position: relative;
            overflow: hidden;
            animation: cardFloat 3s ease-in-out infinite;
        }

        @keyframes cardFloat {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        /* Golden Border Decoration */
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FFD700, #FFA500, #FFD700);
            animation: shimmer 5s linear infinite;
        }

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        /* Thai Pattern Overlay */
        .card-pattern {
            position: absolute;
            top: 0;
            right: 0;
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            filter: blur(40px);
        }

        .logo-container {
            text-align: center;
            margin-bottom: 40px;
            position: relative;
        }

        /* Tiger SVG */
        .tiger-icon {
            width: 120px;
            height: 120px;
            margin: 0 auto 20px;
            position: relative;
            animation: tigerBreathe 4s ease-in-out infinite;
        }

        @keyframes tigerBreathe {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .tiger-svg {
            filter: drop-shadow(0 10px 30px rgba(255, 140, 0, 0.6));
        }

        .logo-title {
            font-family: 'Kanit', sans-serif;
            font-size: 42px;
            font-weight: 800;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 50%, #FF6347 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 10px;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
        }

        .logo-subtitle {
            font-family: 'Sarabun', sans-serif;
            font-size: 16px;
            color: rgba(255, 215, 0, 0.8);
            letter-spacing: 4px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            color: #FFD700;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 2px solid rgba(255, 215, 0, 0.3);
            border-radius: 15px;
            color: #fff;
            font-size: 16px;
            font-family: 'Sarabun', sans-serif;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-input:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: #FFD700;
            box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255, 215, 0, 0.6);
            cursor: pointer;
            padding: 5px;
            transition: color 0.3s ease;
        }

        .toggle-password:hover {
            color: #FFD700;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
        }

        .remember-me input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #FFD700;
        }

        .forgot-link {
            color: #FFD700;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: #FFA500;
            text-decoration: underline;
        }

        .login-button {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%);
            border: none;
            border-radius: 15px;
            color: #000;
            font-size: 18px;
            font-weight: 800;
            font-family: 'Kanit', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(255, 215, 0, 0.4);
            position: relative;
            overflow: hidden;
        }

        .login-button::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.3) 50%, transparent 100%);
            transform: translateX(-100%);
            transition: transform 0.6s ease;
        }

        .login-button:hover::before {
            transform: translateX(100%);
        }

        .login-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(255, 215, 0, 0.6);
        }

        .login-button:active {
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 30px 0;
            gap: 15px;
        }

        .divider-line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.3), transparent);
        }

        .divider-text {
            color: rgba(255, 255, 255, 0.5);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .social-login {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .social-button {
            padding: 14px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 215, 0, 0.3);
            border-radius: 12px;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .social-button:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #FFD700;
            transform: translateY(-2px);
        }

        .register-link {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .register-link a {
            color: #FFD700;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #FFA500;
            text-decoration: underline;
        }

        /* Floating Muay Thai Elements */
        .floating-elements {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .floating-element {
            position: absolute;
            opacity: 0.15;
            animation: float 15s ease-in-out infinite;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 5%;
            font-size: 60px;
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 70%;
            right: 10%;
            font-size: 80px;
            animation-delay: -5s;
        }

        .floating-element:nth-child(3) {
            bottom: 15%;
            left: 15%;
            font-size: 70px;
            animation-delay: -10s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            25% {
                transform: translateY(-30px) rotate(5deg);
            }

            50% {
                transform: translateY(-60px) rotate(-5deg);
            }

            75% {
                transform: translateY(-30px) rotate(5deg);
            }
        }
    </style>
</head>

<body>
    <!-- Tiger Stripes Background -->
    <div class="tiger-stripes"></div>

    <!-- Floating Muay Thai Elements -->
    <div class="floating-elements">
        <div class="floating-element">🥊</div>
        <div class="floating-element">🐅</div>
        <div class="floating-element">🥋</div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="card-pattern"></div>

            <div class="logo-container">
                <div class="tiger-icon">
                    <svg class="tiger-svg" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <!-- Tiger Head -->
                        <circle cx="100" cy="100" r="80" fill="url(#tigerGradient)" />

                        <!-- Tiger Stripes -->
                        <path d="M70 60 Q65 70 70 80" stroke="#000" stroke-width="6" stroke-linecap="round" fill="none" />
                        <path d="M130 60 Q135 70 130 80" stroke="#000" stroke-width="6" stroke-linecap="round" fill="none" />
                        <path d="M60 90 Q55 100 60 110" stroke="#000" stroke-width="5" stroke-linecap="round" fill="none" />
                        <path d="M140 90 Q145 100 140 110" stroke="#000" stroke-width="5" stroke-linecap="round" fill="none" />

                        <!-- Ears -->
                        <path d="M50 50 L40 30 L70 40 Z" fill="#FFA500" />
                        <path d="M150 50 L160 30 L130 40 Z" fill="#FFA500" />

                        <!-- Eyes -->
                        <circle cx="80" cy="90" r="12" fill="#FFD700" />
                        <circle cx="120" cy="90" r="12" fill="#FFD700" />
                        <circle cx="80" cy="90" r="6" fill="#000" />
                        <circle cx="120" cy="90" r="6" fill="#000" />
                        <circle cx="82" cy="88" r="2" fill="#fff" />
                        <circle cx="122" cy="88" r="2" fill="#fff" />

                        <!-- Nose -->
                        <path d="M100 105 L95 115 L100 118 L105 115 Z" fill="#000" />

                        <!-- Mouth -->
                        <path d="M100 118 Q85 125 75 120" stroke="#000" stroke-width="3" stroke-linecap="round" fill="none" />
                        <path d="M100 118 Q115 125 125 120" stroke="#000" stroke-width="3" stroke-linecap="round" fill="none" />

                        <!-- Whiskers -->
                        <line x1="40" y1="100" x2="65" y2="95" stroke="#fff" stroke-width="2" />
                        <line x1="40" y1="110" x2="65" y2="105" stroke="#fff" stroke-width="2" />
                        <line x1="160" y1="100" x2="135" y2="95" stroke="#fff" stroke-width="2" />
                        <line x1="160" y1="110" x2="135" y2="105" stroke="#fff" stroke-width="2" />

                        <!-- Muay Thai Headband -->
                        <path d="M30 85 Q100 75 170 85" stroke="#DC143C" stroke-width="8" fill="none" />
                        <circle cx="100" cy="77" r="8" fill="#FFD700" />

                        <defs>
                            <linearGradient id="tigerGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#FFA500;stop-opacity:1" />
                                <stop offset="50%" style="stop-color:#FF8C00;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FF6347;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <h1 class="logo-title">ไทเกอร์ มวยไทย</h1>
                <p class="logo-subtitle">tiger muay thai</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
            <div style="background: rgba(34, 197, 94, 0.2); border: 2px solid #22c55e; border-radius: 12px; padding: 15px; margin-bottom: 25px; color: #22c55e; text-align: center; font-size: 14px;">
                {{ session('status') }}
            </div>
            @endif

            <form id="loginForm" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label" for="email">อีเมล / Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-input"
                        placeholder="กรอกอีเมล"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        autocomplete="username">
                    @error('email')
                    <div style="color: #ef4444; font-size: 12px; margin-top: 8px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">รหัสผ่าน / Password</label>
                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="กรอกรหัสผ่าน"
                            required
                            autocomplete="current-password">
                        <button type="button" class="toggle-password" onclick="togglePassword()">
                            <span id="eyeIcon">👁️</span>
                        </button>
                    </div>
                    @error('password')
                    <div style="color: #ef4444; font-size: 12px; margin-top: 8px;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="remember-forgot">
                    <label class="remember-me">
                        <input type="checkbox" id="remember" name="remember">
                        <span>จำฉันไว้</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">ลืมรหัสผ่าน?</a>
                    @endif
                </div>

                <button type="submit" class="login-button">
                    เข้าสู่ระบบ
                </button>
            </form>

            <!-- <div class="divider">
                <div class="divider-line"></div>
                <span class="divider-text">หรือ</span>
                <div class="divider-line"></div>
            </div>

            <div class="social-login">
                <button class="social-button">
                    <span>📱</span>
                    Facebook
                </button>
                <button class="social-button">
                    <span>🔵</span>
                    Google
                </button>
            </div>

            <div class="register-link">
                ยังไม่มีบัญชี? <a href="#">สมัครสมาชิก</a>
            </div> -->

        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                eyeIcon.textContent = '👁️';
            }
        }

        // Add entrance animation
        window.addEventListener('load', function() {
            const card = document.querySelector('.login-card');
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';

            setTimeout(() => {
                card.style.transition = 'all 0.8s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100);
        });
    </script>
</body>

</html>