<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blogify – Dashboard')</title>

    <!-- Google Fonts + Bootstrap + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }

        /* Header Styles */
        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 0 2rem;
            height: 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-weight: 500;
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            border: none;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4);
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #333;
            cursor: pointer;
        }

        /* Dashboard Container */
        .dashboard-container {
            display: flex;
            height: calc(100vh - 70px);
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem;
            gap: 1rem;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow-y: auto;
        }

        .sidebar h3 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: #333;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 1rem;
            color: #666;
            text-decoration: none;
            margin-bottom: 0.5rem;
            font-weight: 500;
            padding: 1rem;
            border-radius: 12px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .sidebar a::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: left 0.3s ease;
            z-index: -1;
        }

        .sidebar a:hover::before,
        .sidebar a.active::before {
            left: 0;
        }

        .sidebar a:hover,
        .sidebar a.active {
            color: white;
            transform: translateX(5px);
        }

        .nav-icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            overflow-y: auto;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }

            .dashboard-container {
                flex-direction: column;
                padding: 0.5rem;
            }

            .sidebar {
                position: fixed;
                top: 70px;
                left: -100%;
                height: calc(100vh - 70px);
                z-index: 999;
                transition: left 0.3s ease;
                width: 280px;
            }

            .sidebar.active {
                left: 0;
            }

            .header {
                padding: 0 1rem;
            }

            .user-info {
                display: none;
            }

            .main-content {
                margin-top: 0;
                padding: 1rem;
            }
        }
    </style>
</head>

<body>

@auth
    <!-- Header -->
    <header>
        <div class="logo">Blogify</div>
        <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
        <div class="header-right">
            <div class="user-info">
                <i class="fas fa-user-circle"></i>
                <span>Welcome, {{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: inline;">
                @csrf
                <button class="logout-btn" type="submit">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Sidebar + Main Content -->
    <div class="dashboard-container">
        <aside class="sidebar" id="sidebar">
            <h3>
                <i class="fas fa-user-circle"></i>
                Welcome, {{ Auth::user()->name }}
            </h3>

            <a href="{{ route('home.page') }}" class="{{ Request::is('/') ? 'active' : '' }}">
                <i class="fas fa-home nav-icon"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('dashboard.page') }}" class="{{ Request::is('user/account/posts') ? 'active' : '' }}">
                <i class="fas fa-file-alt nav-icon"></i>
                <span>My Posts</span>
            </a>
            <a href="{{ route('post.add.page') }}" class="{{ Request::is('user/account/create/post') ? 'active' : '' }}">
                <i class="fas fa-plus-circle nav-icon"></i>
                <span>Create Post</span>
            </a>
            <a href="#profile">
                <i class="fas fa-user nav-icon"></i>
                <span>Profile</span>
            </a>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
    </div>
@endauth

@stack('scripts')

<script>
    // Mobile menu toggle
    function toggleMobileMenu() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('active');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.querySelector('.mobile-menu-toggle');
        
        if (window.innerWidth <= 768 && 
            !sidebar.contains(e.target) && 
            !toggleBtn.contains(e.target) && 
            sidebar.classList.contains('active')) {
            sidebar.classList.remove('active');
        }
    });

    // Handle window resize
    window.addEventListener('resize', function() {
        const sidebar = document.getElementById('sidebar');
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
        }
    });

    // Enhanced logout functionality
    const logoutForm = document.getElementById('logout-form');
    if (logoutForm) {
        logoutForm.addEventListener('submit', function (e) {
            // Optional: Add confirmation dialog
            if (!confirm('Are you sure you want to logout?')) {
                e.preventDefault();
                return false;
            }
            
            // Clear local storage
            localStorage.removeItem('token');
            sessionStorage.clear();
        });
    }
</script>

</body>

</html>