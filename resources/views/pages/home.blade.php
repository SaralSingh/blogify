<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blogify – Discover Stories</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f9fafb;
            min-height: 100vh;
            color: #1f2a44;
        }

        /* Top Navigation */
        .navbar {
            background: linear-gradient(180deg, #2c3e50 0%, #1a252f 100%);
            color: white;
            padding: 1.5rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1100;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 600;
            color: #00d1b2;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: #d1d5db;
            text-decoration: none;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-links a:hover {
            background: #00d1b2;
            color: #1f2a44;
        }

        .menu-toggle {
            display: none;
            background: #00d1b2;
            border: none;
            padding: 0.5rem;
            border-radius: 8px;
            color: white;
            font-size: 1.2rem;
        }

        /* Search Bar */
        .search-bar {
            flex: 1;
            /* Allow search bar to take available space */
            max-width: 300px;
            /* Limit width for balance */
            margin-left: 1rem;
            /* Space from nav links */
        }

        #searchInput {
            width: 100%;
            padding: 0.5rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 20px;
            font-size: 0.9rem;
            background: #ffffff;
            color: #1f2a44;
            transition: all 0.3s ease;
        }

        #searchInput:focus {
            border-color: #00d1b2;
            box-shadow: 0 0 0 3px rgba(0, 209, 178, 0.1);
            outline: none;
        }

        #searchInput::placeholder {
            color: #6b7280;
        }

        /* Main Content */
        .main-content {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(90deg, #00d1b2, #007bff);
            color: white;
            padding: 4rem 2rem;
            border-radius: 16px;
            text-align: left;
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            animation: slideIn 1s ease-out;
        }

        .hero-text {
            max-width: 50%;
        }

        .hero-text h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .hero-text p {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }

        .hero-text .cta-btn {
            background: #1f2a44;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .hero-text .cta-btn:hover {
            background: #2c3e50;
            transform: translateY(-2px);
        }

        .hero-image img {
            max-width: 300px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Posts Container */
        .posts-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .post-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: row;
            align-items: center;
            animation: fadeInUp 0.6s ease-out;
            position: relative;
        }

        .post-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .post-image {
            width: 600px;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            margin-right: 1.5rem;
            flex-shrink: 0;
            /* Prevent image from shrinking */
        }

        .post-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .post-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: #00d1b2;
            margin-bottom: 0.75rem;
        }

        .post-description {
            font-size: 1rem;
            color: #4b5563;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .author-info {
            font-size: 0.9rem;
            color: #6b7280;
            border-top: 1px solid #e5e7eb;
            padding-top: 1rem;
        }

        .author-info span {
            display: block;
            margin: 0.3rem 0;
        }

        .post-stats {
            display: flex;
            gap: 1.5rem;
            font-size: 0.95rem;
            font-weight: 500;
            color: #1f2a44;
            margin-top: 1rem;
        }

        /* Footer */
        footer {
            background: #1f2a44;
            color: #d1d5db;
            padding: 2rem;
            text-align: center;
            margin-top: 3rem;
            border-radius: 16px 16px 0 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        footer a {
            color: #00d1b2;
            text-decoration: none;
            font-weight: 500;
            margin: 0 0.5rem;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Toast */
        .toast {
            border-radius: 12px;
            background: #00d1b2;
            color: #1f2a44;
            font-weight: 500;
        }

        .toast-header {
            background: #1f2a44;
            color: white;
        }

        .toast-body {
            background: white;
        }

/* Remove unwanted box and spacing around the input */
.search-wrapper {
    background: transparent;
    border: none;
    padding: 0;
    margin: 0;
    box-shadow: none;
}

/* Clean rounded input */
.custom-search {
    border: none !important;
    border-radius: 50px !important;
    padding: 0.6rem 1.2rem !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
    font-size: 1rem !important;
    background: white;
}

.custom-search:focus {
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(0, 209, 178, 0.2) !important;
}



        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .post-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .post-image {
                width: 100%;
                height: 300px;
                /* Reduced height for medium screens */
                margin-right: 0;
                margin-bottom: 1rem;
            }

            .hero-section {
                flex-direction: column;
                text-align: center;
                gap: 2rem;
            }

            .hero-text {
                max-width: 100%;
            }

            .hero-image img {
                max-width: 200px;
            }
        }

        @media (max-width: 768px) {
            .navbar-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-links {
                flex-direction: column;
                width: 100%;
                display: none;
                align-items: center;
                /* Center items in mobile view */
            }

            .nav-links.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }

            .search-bar {
                width: 100%;
                max-width: 100%;
                /* Full width on mobile */
                margin-left: 0;
                padding: 0 1rem;
                /* Padding for alignment */
            }

            #searchInput {
                font-size: 0.95rem;
            }

            .hero-text h1 {
                font-size: 2rem;
            }

            .post-image {
                height: 200px;
                /* Further reduced for smaller screens */
            }

            .post-title {
                font-size: 1.4rem;
            }

            .post-description {
                font-size: 0.95rem;
            }
        }

        @media (max-width: 576px) {
            .hero-text h1 {
                font-size: 1.5rem;
            }

            .hero-text p {
                font-size: 0.95rem;
            }

            .post-image {
                height: 150px;
                /* Smallest size for very small screens */
            }

            .post-title {
                font-size: 1.2rem;
            }

            .post-description {
                font-size: 0.9rem;
            }

            #searchInput {
                font-size: 0.9rem;
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>
    {{-- resources/views/home.blade.php --}}
    @extends(Auth::check() ? 'layouts.dashboard' : 'layouts.guest')

    @section('title', 'Home Page')

    @section('content')
        @guest
            <div class="hero-section">
                <div class="hero-text">
                    <h1>Share Your Story</h1>
                    <p>Join our community of writers and readers to explore diverse perspectives and ideas.</p>
                    <a href="{{ route('register.page') }}" class="cta-btn">Get Started</a>
                </div>
                <div class="hero-image">
                    <img src="https://picsum.photos/seed/hero/600/400" alt="Hero image">
                </div>
            </div>
        @endguest

        {{-- Search Bar --}}
{{-- Search Bar --}}
<div class="search-wrapper mb-4"
     style="position: sticky; top: 0; z-index: 1000; background: #f5f7fa; padding-bottom: 15px;">
    <input type="text" id="searchInput"
        class="form-control custom-search shadow-sm"
        placeholder="🔍 Search posts by title or @username..." onkeyup="filterPosts()">
</div>


        {{-- Posts Section --}}
        <div class="posts-container" id="body">
            <!-- Posts will be injected here -->
        </div>
        <div id="noUserFound" style="display: none; text-align: center; margin-top: 3rem;">
            <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3FpbW44eGdxMDZoMjdwazR2dWQ4MnM3MXQxMzF1cXBrYnVtMXNtOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/SDUiharA58JhGCwDqP/giphy.gif"
                alt="No User Found" width="250">
            <h4 style="margin-top: 1rem; color: #888;">No user found with that username 🕵️‍♂️</h4>
        </div>

        <div id="noResults" style="display: none; text-align: center; margin-top: 3rem;">
            <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3FpbW44eGdxMDZoMjdwazR2dWQ4MnM3MXQxMzF1cXBrYnVtMXNtOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/SDUiharA58JhGCwDqP/giphy.gif"
                alt="No Posts Found" width="250">
            <h4 style="margin-top: 1rem; color: #888;">No posts found matching your search 😕</h4>
        </div>


        {{-- Toast --}}
        <div class="position-fixed top-0 end-0 p-3" style="top: 1rem; left: 1rem; z-index: 1055">
            <div id="newPostToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true"
                style="cursor: pointer;">
                <div class="toast-header">
                    <strong class="me-auto">New Post 🚀</strong>
                    <button type="button" class="btn-close ms-2 mb-1" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body" id="toastContent"></div>
            </div>
        </div>

        {{-- Footer
        <footer>
            <p>© 2025 Blogify. Crafted with ❤️.
                <a href="/about">About</a> |
                <a href="/contact">Contact</a> |
                <a href="/privacy">Privacy Policy</a> |
                <a href="/terms">Terms of Service</a>
            </p>
        </footer> --}}
    @endsection

    @push('scripts')
        <script>
            let latestPostId = 0;
            let allPosts = [];
            let currentToastPostId = null;
            let url = '{{ url('/') }}';
            // let url = 'https://cf40-103-77-2-8.ngrok-free.app';

            function showToast(title, author, postId) {
                const content = `"${title}" by ${author}`;
                document.getElementById('toastContent').innerText = content;
                currentToastPostId = postId;
                const toast = new bootstrap.Toast(document.getElementById('newPostToast'), {
                    delay: 2000
                });
                toast.show();
            }

            document.getElementById('newPostToast').addEventListener('click', function(e) {
                if (!e.target.classList.contains('btn-close') && currentToastPostId) {
                    window.location.href = `/post/${currentToastPostId}`;
                }
            });

            function renderPosts(posts, isUserSearch = false) {
                const container = document.getElementById('body');
                const noResults = document.getElementById('noResults');
                const noUserFound = document.getElementById('noUserFound');

                container.innerHTML = '';
                noResults.style.display = 'none';
                noUserFound.style.display = 'none';

                if (!posts.length) {
                    if (isUserSearch) {
                        noUserFound.style.display = 'block';
                    } else {
                        noResults.style.display = 'block';
                    }
                    return;
                }

                posts.forEach(post => {
                    const shortDesc = (post.description || '').substring(0, 100) + '...';
                    const postDate = new Date(post.created_at.slice(0, 19));
                    const formattedDate = postDate.toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    container.innerHTML += `
            <div class="post-card position-relative">
                <a href="/post/${post.id}" class="stretched-link"></a>
                <img src="https://picsum.photos/seed/${post.id}/600/400" alt="Post image" class="post-image">
                <div class="post-content">
                    <div class="post-title">${post.title}</div>
                    <div class="post-description">${shortDesc}</div>
                    <div class="author-info">
                        <span><strong>Author:</strong> ${post.user.name}</span>
                        <span><strong>Username:</strong> @${post.user.username}</span>
                        <span><strong>🗓️ Posted:</strong> ${formattedDate}</span>
                    </div>
                    <div class="post-stats">
                        <div><i class="fas fa-thumbs-up"></i> ${post.likes}</div>
                        <div><i class="fas fa-thumbs-down"></i> ${post.dislikes}</div>
                    </div>
                </div>
            </div>`;
                });
            }

            function filterPosts() {
                const query = document.getElementById('searchInput').value.toLowerCase().trim();

                let filtered = [];

                let isUserSearch = false;

                if (query.startsWith('@')) {
                    isUserSearch = true;
                    const usernameQuery = query.slice(1); // remove '@'
                    filtered = allPosts.filter(post => post.user.username.toLowerCase().includes(usernameQuery));
                } else {
                    filtered = allPosts.filter(post =>
                        post.title.toLowerCase().includes(query) ||
                        post.user.name.toLowerCase().includes(query)
                    );
                }

                renderPosts(filtered, isUserSearch);
            }



            function fetchInitialPosts() {
                fetch(`${url}/api/public/posts`)
                    .then(res => res.json())
                    .then(data => {
                        allPosts = data.data.posts;
                        if (allPosts.length) {
                            latestPostId = allPosts[0].id;
                            renderPosts(allPosts);
                        }
                    })
                    .catch(err => console.error('Initial fetch error:', err));
            }

            function checkForNewPost() {
                fetch(`${url}/api/public/posts`)
                    .then(res => res.json())
                    .then(data => {
                        const newPosts = data.data.posts;
                        if (newPosts.length && newPosts[0].id > latestPostId) {
                            allPosts = newPosts;
                            showToast(newPosts[0].title, newPosts[0].user.name, newPosts[0].id);
                            latestPostId = newPosts[0].id;
                        }
                    })
                    .catch(err => console.error('Toast check error:', err));
            }


            fetchInitialPosts();
            setInterval(checkForNewPost, 10000);
        </script>
    @endpush
</body>

</html>
