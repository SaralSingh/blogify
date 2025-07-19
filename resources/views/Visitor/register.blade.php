<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - Blogify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(135deg, #f0f4ff, #e6eaff);
            margin: 0;
            overflow-x: hidden;
        }

        .container {
            flex: 1;
            display: flex;
            width: 100vw;
            min-height: 100vh;
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

        .login-container {
            transition: transform 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
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
        <!-- Left Promotional Section -->
        <div
            class="left-section flex-1 bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-12 flex flex-col justify-center relative overflow-hidden">
            <h1 class="text-4xl font-bold mb-6 z-10">Join Blogify Today</h1>
            <p class="text-lg mb-8 leading-relaxed z-10">Unleash your creativity with Blogify. Start your blogging
                journey, connect with readers, and build your audience with ease.</p>
            <ul class="space-y-4 z-10">
                <li class="flex items-center">
                    <span class="mr-2 text-green-300">✓</span> Intuitive blog editor
                </li>
                <li class="flex items-center">
                    <span class="mr-2 text-green-300">✓</span> Customizable themes
                </li>
                <li class="flex items-center">
                    <span class="mr-2 text-green-300">✓</span> Powerful SEO tools
                </li>
                <li class="flex items-center">
                    <span class="mr-2 text-green-300">✓</span> Community engagement
                </li>
            </ul>
        </div>

        <!-- Right Registration Form -->
        <div class="right-section flex-1 bg-white flex items-center justify-center p-10 md:p-5">
            <div class="login-container bg-white p-8 rounded-xl shadow-lg max-w-md w-full">
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Create an Account</h2>

                <form method="POST" action="{{ route('register.check') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('name')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" name="username" id="username" value="{{ old('username') }}"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('username')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('email')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" name="password" id="password"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('password')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('password_confirmation')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="avatar" class="block text-sm font-medium text-gray-700">Profile Picture</label>
                        <input type="file" name="avatar" id="avatar" action=".png,.jpg,.jpeg"
                            class="mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('avatar')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="otp" class="block text-sm font-medium text-gray-700 mb-1">OTP</label>

                        <div class="flex">
                            <input type="text" name="otp" id="otp"
                                class="flex-1 px-4 py-3 border border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Enter OTP">

                            <button type="button" id="get-otp"
                                class="px-4 py-3 bg-indigo-600 text-white rounded-r-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Get OTP
                            </button>
                        </div>

                        @error('otp')
                            <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full py-3 px-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 text-white font-semibold rounded-lg transition-opacity duration-300 hover:opacity-90">
                        Register
                    </button>
                </form>

                <p class="text-sm text-center mt-4 text-gray-600">
                    Already have an account?
                    <a href="{{ route('login.page') }}" class="text-indigo-600 font-medium hover:underline">Login
                        here</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-10 text-center">
        <h3 class="text-xl font-semibold text-white mb-4">Get Started with Blogify</h3>
        <div class="flex justify-center gap-6 flex-wrap">
            <a href="#" class="text-green-300 hover:text-white transition-colors">How to Start Blogging</a>
            <a href="#" class="text-green-300 hover:text-white transition-colors">Best Practices for
                Bloggers</a>
            <a href="#" class="text-green-300 hover:text-white transition-colors">SEO for Beginners</a>
            <a href="#" class="text-green-300 hover:text-white transition-colors">Why Choose Blogify?</a>
        </div>
    </footer>
</body>

<script>
    window.BASE_URL = "{{ config('app.url') }}";
</script>
<!-- In your Blade file -->
<script src="{{ secure_asset('js/register.js') }}"></script>
</html>
