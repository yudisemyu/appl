<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> SkillHub Login </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(to right, #e8ebf8, #f4f6fb);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Background image overlay */
        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1607746882042-944635dfe10e?auto=format&fit=crop&w=1470&q=80') no-repeat center center;
            background-size: cover;
            opacity: 0.8;
            z-index: 0;
        }

        .login-box {
            background-color: #ffffff;
            width: 100%;
            max-width: 430px;
            padding: 45px 35px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
            opacity: 0.8
        }

        .login-box:hover {
            transform: translateY(-4px);
        }

        .header-title {
            font-size: 1.9rem;
            font-weight: 600;
            background: linear-gradient(to right, #000000, #3755cc);
            opacity: 0.8;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
            color: #333;
            display: block;
            margin-bottom: 6px;
        }

        .input-icon-group {
            position: relative;
        }

        .input-icon-group input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            border: 1px solid #ccd2e3;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        .input-icon-group input:focus {
            border-color: #1d3b98;
            outline: none;
        }

        .input-icon-group .icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.1rem;
            color: #94a3b8;
        }

        .error-message {
            color: #e63946;
            font-size: 0.88rem;
            margin-top: 5px;
        }

        .status-message {
            background: #def7e5;
            color: #2d7a46;
            padding: 12px;
            border-radius: 8px;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 0.95rem;
            margin-bottom: 25px;
        }

        .remember-me input {
            margin-right: 8px;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(to right, #1d3b98, #263fa0);
            color: #fff;
            font-weight: 600;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #162e76, #1d3b98);
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 30px 20px;
                border-radius: 12px;
            }
        }
    </style>
</head>
<body>
    <div class="login-box">
        <div class="header-title">Masuk ke SkillHub</div>

        @if(session('status'))
            <div class="status-message">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <div class="input-icon-group">
                    <span class="icon">📧</span>
                    <input id="email" type="email" name="email" required autofocus>
                </div>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Kata Sandi</label>
                <div class="input-icon-group">
                    <span class="icon">🔒</span>
                    <input id="password" type="password" name="password" required>
                </div>
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="remember-me">
                <label><input type="checkbox" name="remember"> Ingat saya</label>
            </div>

            <button type="submit" class="btn-login">Masuk</button>
        </form>
        <div style="text-align: center; margin-top: 20px;">
            <span style="font-size: 0.95rem; color: #555;">Belum punya akun?</span>
            <a href="{{ route('register') }}" class="btn-register">Daftar</a>
        </div>

    </div>
</body>
</html>
