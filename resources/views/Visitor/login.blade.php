<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f0f4ff, #e6eaff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            flex: 1;
            min-height: 100vh;
        }

        .left-section {
            flex: 1;
            background: linear-gradient(135deg, #4a6cfa, #8a4af3);
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .left-section::before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 200px;
            height: 200px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .left-section h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            z-index: 1;
        }

        .left-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 30px;
            z-index: 1;
        }

        .features {
            list-style: none;
            z-index: 1;
        }

        .features li {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            font-size: 1rem;
        }

        .features li::before {
            content: '✓';
            margin-right: 10px;
            color: #aaffaa;
            font-weight: bold;
        }

        .right-section {
            flex: 1;
            background: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .login-container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
        }

        .login-container h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #444;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4a6cfa;
            outline: none;
        }

        .btn {
            width: 100%;
            background: linear-gradient(90deg, #4a6cfa, #8a4af3);
            color: white;
            padding: 12px;
            border: none;
            margin-top: 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 600;
            transition: opacity 0.3s ease;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .error {
            color: #e63946;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .flash {
            color: #e63946;
            text-align: center;
            margin-bottom: 15px;
            font-size: 0.9rem;
        }

        .footer {
            background: #1a1a2e;
            color: #ccc;
            padding: 40px 20px;
            text-align: center;
        }

        .footer h3 {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: white;
        }

        .blog-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .blog-links a {
            color: #aaffaa;
            text-decoration: none;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .blog-links a:hover {
            color: white;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #444;
        }

        .register-link a {
            color: #4a6cfa;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .register-link a:hover {
            color: #8a4af3;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .left-section {
                padding: 40px 20px;
                min-height: 50vh;
            }

            .right-section {
                padding: 20px;
            }

            .login-container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h1>Welcome to Blogify</h1>
            <p>Discover a platform where your ideas come to life. Blogify empowers you to create, share, and connect through powerful blogging tools.</p>
            <ul class="features">
                <li>Create stunning blogs with ease</li>
                <li>Connect with a global community</li>
                <li>Customize your blog's look and feel</li>
                <li>Analytics to grow your audience</li>
            </ul>
        </div>
        <div class="right-section">
            <div class="login-container">
                <h2>Login to Blogify</h2>

                @if(session('error'))
                    <div class="flash">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login.check') }}">
                    @csrf

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" required value="{{ old('email') }}">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn">Login</button>
                </form>

                <p class="register-link">
                    Don't have an account? 
                    <a href="{{ route('register.page') }}">Register here</a>
                </p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <h3>Explore Blogify's Blogging Tips</h3>
        <div class="blog-links">
            <a href="#">How to Write Engaging Blog Posts</a>
            <a href="#">Top 10 Blogging Trends for 2025</a>
            <a href="#">SEO Tips for Bloggers</a>
            <a href="#">Grow Your Audience with Blogify</a>
        </div>
    </footer>
</body>
</html>