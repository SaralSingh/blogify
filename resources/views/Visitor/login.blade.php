<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 360px;
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
        }

        .flash {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

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
    </div>

</body>
</html>
