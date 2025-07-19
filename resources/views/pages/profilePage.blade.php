<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @extends(Auth::check() ? 'layouts.dashboard' : 'layouts.guest')
    @section('title', 'Profile')
    @section('content')
        <style>
            /* Profile-specific styles */
            :root {
                --bg-primary: #121212;
                --bg-secondary: #1a1a1a;
                --bg-tertiary: #1f1f1f;
                --border-color: #2a2a2a;
                --text-primary: #e0e0e0;
                --text-secondary: #a0a0a0;
                --text-muted: #6b7280;
                --accent-color: #3b82f6;
                --accent-hover: #2563eb;
                --premium-color: #d1a054;
            }

            /* Utility Classes */
            .flex {
                display: flex;
            }

            .flex-col {
                flex-direction: column;
            }

            .items-center {
                align-items: center;
            }

            .justify-center {
                justify-content: center;
            }

            .justify-between {
                justify-content: space-between;
            }

            .gap-1 {
                gap: 0.25rem;
            }

            .gap-2 {
                gap: 0.5rem;
            }

            .gap-3 {
                gap: 0.75rem;
            }

            .gap-4 {
                gap: 1rem;
            }

            .gap-5 {
                gap: 1.25rem;
            }

            .gap-6 {
                gap: 1.5rem;
            }

            /* Profile Content */
            .profile-content {
                display: flex;
                width: 100%;
                height: calc(100vh - 70px);
                /* Fixed height to match viewport minus navbar */
            }

            /* User Section */
            .user-section {
                width: 40%;

                background-color: var(--bg-secondary);
                border-radius: 10px;
                border: 1px solid var(--border-color);
                overflow-y: auto;
                -ms-overflow-style: none;
                scrollbar-width: none;
                margin-right: 10px;
            }

            .user-section::-webkit-scrollbar {
                display: none;
            }

            .user-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: clamp(15px, 3vw, 20px);
            }

            /* Profile Info */
            .profile-info {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin-bottom: 25px;
                width: 100%;
            }

            .profile-avatar {
                width: clamp(80px, 15vw, 100px);
                height: clamp(80px, 15vw, 100px);
                border-radius: 50%;
                background-color: var(--border-color);
                display: flex;
                align-items: center;
                justify-content: center;
                overflow: hidden;
                border: 2px solid var(--bg-secondary);
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
                margin-bottom: 15px;
            }

            .profile-avatar img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center;
            }

            .profile-avatar i {
                font-size: clamp(1.5rem, 4vw, 2rem);
                color: var(--text-muted);
            }

            .profile-details {
                width: 100%;
                text-align: center;
            }

            .profile-name {
                font-size: clamp(1.2rem, 2.5vw, 1.6rem);
                font-weight: 700;
                margin-bottom: 8px;
                color: #ffffff;
            }

            .profile-email {
                color: var(--text-secondary);
                font-size: clamp(0.85rem, 2vw, 0.95rem);
            }

            /* Profile Stats */
            .profile-stats {
                display: flex;
                gap: clamp(10px, 2.5vw, 20px);
                margin: 15px 0;
                padding: 15px 0;
                border-top: 1px solid var(--border-color);
                border-bottom: 1px solid var(--border-color);
                justify-content: center;
                width: 100%;
            }

            .stat-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 5px;
            }

            .stat-value {
                font-size: clamp(1rem, 2vw, 1.2rem);
                font-weight: 600;
                color: var(--text-primary);
            }

            .stat-label {
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
                color: var(--text-muted);
            }

            /* Profile Buttons */
            .profile-buttons {
                display: flex;
                gap: 10px;
                justify-content: center;
                margin-bottom: 20px;
                flex-wrap: wrap;
                width: 100%;
            }

            .btn-pill {
                border-radius: 20px;
                padding: 8px 16px;
                min-width: 100px;
                font-size: clamp(0.8rem, 2vw, 0.9rem);
            }

            /* Posts Section */
            .posts-section {
                width: 60%;
                padding: clamp(15px, 3vw, 20px);
                background-color: var(--bg-secondary);
                border-radius: 10px;
                border: 1px solid var(--border-color);
                overflow: hidden;
            }

            .posts-content {
                display: flex;
                flex-direction: column;
                height: 100%;
                /* Fixed height to constrain scrolling */
                overflow: hidden;
                /* Prevent overflow from affecting parent */
            }

            .posts-header {
                padding: clamp(10px, 2.5vw, 15px) clamp(15px, 3vw, 20px);
                border-bottom: 1px solid var(--border-color);
                position: sticky;
                top: 0;
                background-color: var(--bg-secondary);
                z-index: 100;
            }

            /* Tabs */
            .profile-tabs {
                display: flex;
                border-bottom: 1px solid var(--border-color);
            }

            .tab-item {
                padding: clamp(8px, 2vw, 10px) clamp(10px, 2.5vw, 15px);
                cursor: pointer;
                font-weight: 600;
                color: var(--text-secondary);
                position: relative;
                font-size: clamp(0.8rem, 2vw, 0.9rem);
                transition: color 0.2s;
            }

            .tab-item:hover {
                color: var(--text-primary);
            }

            .tab-item.active {
                color: var(--accent-color);
            }

            .tab-item.active::after {
                content: '';
                position: absolute;
                bottom: -1px;
                left: 0;
                width: 100%;
                height: 2px;
                background-color: var(--accent-color);
            }

            /* Content Containers */
            .posts-container,
            .about-container {
                flex: 1;
                overflow-y: auto;
                /* Isolated scrolling for each section */
                padding: clamp(10px, 2.5vw, 15px);
                scrollbar-width: thin;
                scrollbar-color: #3a3a3a var(--bg-secondary);
            }

            .posts-container::-webkit-scrollbar,
            .about-container::-webkit-scrollbar {
                width: 5px;
            }

            .posts-container::-webkit-scrollbar-track,
            .about-container::-webkit-scrollbar-track {
                background: var(--bg-secondary);
            }

            .posts-container::-webkit-scrollbar-thumb,
            .about-container::-webkit-scrollbar-thumb {
                background-color: #3a3a3a;
                border-radius: 3px;
            }

            /* Post Cards */
            .post-card {
                background-color: var(--bg-tertiary);
                border-radius: 8px;
                padding: clamp(10px, 2.5vw, 15px);
                margin-bottom: 15px;
            }

            .post-card:hover {
                background-color: #232323;
            }

            .post-title {
                font-size: clamp(1rem, 2vw, 1.2rem);
                font-weight: 600;
                margin-bottom: 10px;
                color: #ffffff;
                line-height: 1.4;
            }

            .post-excerpt {
                color: var(--text-secondary);
                margin-bottom: 12px;
                line-height: 1.5;
                font-size: clamp(0.8rem, 2vw, 0.9rem);
            }

            .post-tags {
                display: flex;
                gap: 6px;
                margin-bottom: 12px;
                flex-wrap: wrap;
            }

            .post-tag {
                background-color: var(--border-color);
                color: var(--text-secondary);
                padding: 4px 10px;
                border-radius: 16px;
                font-size: clamp(0.65rem, 1.8vw, 0.75rem);
                font-weight: 500;
            }

            .post-meta {
                display: flex;
                justify-content: space-between;
                color: var(--text-muted);
                font-size: clamp(0.7rem, 1.8vw, 0.8rem);
                align-items: center;
            }

            .post-actions {
                display: flex;
                gap: clamp(8px, 2vw, 12px);
            }

            .post-action {
                display: flex;
                align-items: center;
                gap: 5px;
                cursor: pointer;
                transition: color 0.2s;
            }

            .post-action:hover {
                color: var(--accent-color);
            }

            /* Badges */
            .badge {
                padding: 3px 8px;
                border-radius: 4px;
                font-size: clamp(0.6rem, 1.8vw, 0.7rem);
                font-weight: 600;
                display: inline-block;
            }

            .badge-premium {
                background-color: var(--border-color);
                border: 1px solid #3a3a3a;
                color: var(--premium-color);
                margin-bottom: 10px;
            }

            /* About Section */
            .about-content {
                background-color: var(--bg-tertiary);
                border-radius: 8px;
                padding: clamp(10px, 2.5vw, 15px);
            }

            .about-content h3 {
                margin-bottom: 12px;
                color: #ffffff;
                font-size: clamp(0.9rem, 2vw, 1.1rem);
            }

            .about-content p {
                color: var(--text-secondary);
                line-height: 1.5;
                margin-bottom: 10px;
                font-size: clamp(0.8rem, 2vw, 0.9rem);
            }

            /* Responsive Styles */
            @media (max-width: 1200px) {
                .user-section {
                    width: 45%;
                }

                .posts-section {
                    width: 55%;
                }
            }

            @media (max-width: 992px) {
                .profile-content {
                    flex-direction: column;
                    height: auto;
                }

                .user-section,
                .posts-section {
                    width: 100%;
                    padding: clamp(10px, 2.5vw, 15px);
                }

                .user-content {
                    padding: clamp(10px, 2.5vw, 15px);
                }
            }

            @media (max-width: 768px) {
                .profile-content {
                    gap: clamp(0.5rem, 2vw, 0.75rem);
                }

                .user-section,
                .posts-section {
                    padding: clamp(8px, 2vw, 12px);
                }

                .user-content {
                    padding: clamp(8px, 2vw, 12px);
                }

                .profile-buttons .btn {
                    flex: 1;
                    min-width: 80px;
                    padding: 6px 12px;
                }

                .posts-content {
                    height: auto;
                }
            }

            @media (max-width: 576px) {
                .profile-avatar {
                    width: clamp(60px, 12vw, 80px);
                    height: clamp(60px, 12vw, 80px);
                }

                .profile-name {
                    font-size: clamp(1rem, 2vw, 1.2rem);
                }

                .profile-stats {
                    gap: clamp(8px, 2vw, 12px);
                }

                .profile-tabs {
                    overflow-x: auto;
                    -webkit-overflow-scrolling: touch;
                }

                .profile-tabs::-webkit-scrollbar {
                    display: none;
                }

                .tab-item {
                    white-space: nowrap;
                    font-size: clamp(0.75rem, 1.8vw, 0.85rem);
                }
            }

            @media (max-width: 400px) {
                .profile-buttons .btn {
                    padding: 6px 10px;
                    min-width: 70px;
                }

                .posts-header {
                    padding: clamp(6px, 1.8vw, 10px) clamp(8px, 2vw, 12px);
                }

                .post-card {
                    padding: clamp(8px, 2vw, 12px);
                }
            }

            .post-card {
                transition: transform 0.3s;
            }

            a {
                text-decoration: none;
            }

            a:hover .post-card {
                text-decoration: none;
                box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            }


            .stat-item-button {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 10px;
                border-radius: 8px;
                /* bright dark background */
                transition: background-color 0.2s ease;
                color: #ffffff;
            }

            .stat-item-button:hover {
                background-color: #374151;
                /* slightly brighter on hover */
            }

            .stat-value {
                font-size: 1.3rem;
                font-weight: bold;
                color: #ffffff;
            }

            .stat-label {
                font-size: 0.9rem;
                color: #dddddd;
            }

            /* Reset default margins and ensure box-sizing */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Modal Styles */
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                align-items: center;
                justify-content: center;
                overflow-y: auto;
                padding: 20px;
            }

            .modal-content {
                background-color: #ffffff;
                border-radius: 12px;
                max-width: 600px;
                width: 100%;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
                animation: fadeIn 0.3s ease-in-out;
                margin: auto;
            }

            .modal-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 16px 24px;
                border-bottom: 1px solid #e5e7eb;
                background-color: #f8fafc;
                border-top-left-radius: 12px;
                border-top-right-radius: 12px;
            }

            .modal-header h3 {
                margin: 0;
                font-size: 1.5rem;
                font-weight: 600;
                color: #1f2937;
            }

            .close {
                background: none;
                border: none;
                font-size: 1.5rem;
                cursor: pointer;
                color: #6b7280;
                transition: color 0.2s;
            }

            .close:hover {
                color: #1f2937;
            }

            .modal-body {
                padding: 24px;
                max-height: 65vh;
                overflow-y: auto;
            }

            .no-data {
                color: #6b7280;
                font-style: italic;
                text-align: center;
                font-size: 1rem;
            }

            /* User Card Styles */
            .user-card-container {
                display: flex;
                flex-direction: column;
                gap: 16px;
            }

            .user-card {
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 10px;
                padding: 16px 20px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            }

            .user-card:hover {
                transform: translateY(-4px);
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
                border-color: #3b82f6;
            }

            .user-info {
                display: flex;
                flex-direction: column;
            }

            .user-name {
                font-size: 1.2rem;
                font-weight: 600;
                color: #1f2937;
                line-height: 1.4;
            }

            .user-username {
                font-size: 0.9rem;
                color: #6b7280;
                margin-top: 4px;
                font-weight: 400;
            }

            /* Animation */
            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            /* Responsive Design */
            @media (max-width: 600px) {
                .modal-content {
                    max-width: 95%;
                }

                .modal-header {
                    padding: 12px 16px;
                }

                .modal-header h3 {
                    font-size: 1.3rem;
                }

                .modal-body {
                    padding: 16px;
                }

                .user-card {
                    padding: 12px 16px;
                }

                .user-name {
                    font-size: 1.1rem;
                }

                .user-username {
                    font-size: 0.85rem;
                }
            }
        </style>

        <div class="main">
            <div class="profile-content">
                <!-- User Profile Section -->
                <div class="user-section">
                    <div class="user-content">
                        <div class="profile-info">
                            <div class="profile-avatar">
                                @if ($user->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">
                                @else
                                    <i class="fas fa-user"></i>
                                @endif
                            </div>
                            <div class="profile-details">
                                <h1 class="profile-name">{{ $user->name }}</h1>
                                <h3 class="profile-email">username: {{ $user->username }}</h3>
                            </div>
                        </div>

                        <div class="profile-stats">
                            <!-- Clickable Following -->
                            <button class="stat-item-button bright" onclick="showModal('followingModal')">
                                <div class="stat-value">{{ $user->followings_count }}</div>
                                <div class="stat-label">Following</div>
                            </button>

                            <!-- Clickable Followers -->
                            <button class="stat-item-button bright" onclick="showModal('followersModal')">
                                <div class="stat-value">{{ $user->followers_count }}</div>
                                <div class="stat-label">Followers</div>
                            </button>

                            <!-- Non-clickable Posts (same bright style) -->
                            <div class="stat-item-button bright" style="cursor: default; pointer-events: none;">
                                <div class="stat-value">{{ $user->posts->count() }}</div>
                                <div class="stat-label">Posts</div>
                            </div>


                        </div>
                        <div class="profile-buttons">
                            @auth
                                @if (Auth::id() != $user->id)
                                    @if ($isFollowing)
                                        <form method="POST" action="{{ route('unfollow', $user->id) }}">
                                            @csrf
                                            <button class="btn btn-danger btn-pill">Unfollow</button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('follow', $user->id) }}">
                                            @csrf
                                            <button class="btn btn-primary btn-pill">Follow</button>
                                        </form>
                                    @endif
                                @endif
                            @endauth
                        </div>

                    </div>
                </div>

                <!-- Posts Section -->
                <div class="posts-section">
                    <div class="posts-content">
                        <div class="posts-header">
                            <div class="profile-tabs">
                                <div class="tab-item active" data-tab="posts">Posts</div>
                                <div class="tab-item" data-tab="about">About</div>
                            </div>
                        </div>
                        <!-- Posts Container -->
                        <div class="posts-container active">
                            @if ($user->posts->count())
                                @foreach ($user->posts as $post)
                                    <a href="{{ route('post.page', $post->id) }}" class="text-decoration-none text-dark">
                                        <div class="post-card">
                                            <h2 class="post-title">#{{ $post->id }} - {{ $post->title }}</h2>
                                            <p class="post-excerpt">{{ Str::limit($post->description, 120, '...') }}</p>

                                            <div class="post-meta">
                                                <span>{{ $post->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            @else
                                    <div style="display: flex; flex-direction: column; align-items: center; justify-content: center; margin-top: 3rem;">
                                    <img src="https://media0.giphy.com/media/v1.Y2lkPTc5MGI3NjExdmJjeGczOXV5MW4wNmw3dnp6a2l0MmpmMTYyYXBjZWdidGlvd2FldSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/0RAvDxfdksWy39YG4T/giphy.gif"
                                        width="200" height="200" style="border-radius: 50%; object-fit: cover;"
                                        alt="No posts">
                                    <h4 style="margin-top: 1rem; color: #888;">No posts yet.✍️</h4>
                                </div>
                            @endif
                        </div>

                        <!-- About Container -->
                        <div class="about-container" style="display: none;">
                            <div class="about-content">
                                <h3>About</h3>
                                <p>I'm a frontend developer with 5 years of experience...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- Followers Modal -->
<div id="followersModal" class="modal" role="dialog" aria-labelledby="followersModalTitle" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="followersModalTitle">Followers</h3>
            <button class="close" aria-label="Close followers modal" onclick="hideModal('followersModal')">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if ($user->followers->isEmpty())
                <p class="no-data">No followers yet.</p>
            @else
                <div class="user-card-container">
                    @foreach ($user->followers as $follower)
                        <a href="{{ route('user.page', ['id' => $follower->id]) }}" class="user-card" role="listitem" style="text-decoration: none; color: inherit;">
                            <div class="user-info">
                                <span class="user-name">{{ $follower->name }}</span>
                                <span class="user-username">{{ $follower->username ?? 'N/A' }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>


<!-- Following Modal -->
<div id="followingModal" class="modal" role="dialog" aria-labelledby="followingModalTitle" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
            <h3 id="followingModalTitle">Following</h3>
            <button class="close" aria-label="Close following modal" onclick="hideModal('followingModal')">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if ($user->followings->isEmpty())
                <p class="no-data">Not following anyone yet.</p>
            @else
                <div class="user-card-container">
                    @foreach ($user->followings as $following)
                        <a href="{{ route('user.page', ['id' => $following->id]) }}" class="user-card" role="listitem" style="text-decoration: none; color: inherit;">
                            <div class="user-info">
                                <span class="user-name">{{ $following->name }}</span>
                                <span class="user-username">{{ $following->username ?? 'N/A' }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>


        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const tabs = document.querySelectorAll('.tab-item');
                    const postsContainer = document.querySelector('.posts-container');
                    const aboutContainer = document.querySelector('.about-container');

                    tabs.forEach(tab => {
                        tab.addEventListener('click', () => {
                            tabs.forEach(t => t.classList.remove('active'));
                            tab.classList.add('active');

                            if (tab.dataset.tab === 'posts') {
                                postsContainer.style.display = 'block';
                                aboutContainer.style.display = 'none';
                            } else {
                                postsContainer.style.display = 'none';
                                aboutContainer.style.display = 'block';
                            }
                        });
                    });
                });

                // Modal handling
                function showModal(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.style.display = 'flex';
                        modal.setAttribute('aria-hidden', 'false');
                        modal.focus();
                        document.addEventListener('keydown', handleModalKeydown);
                    } else {
                        console.error(`Modal with ID ${modalId} not found.`);
                    }
                }

                function hideModal(modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.style.display = 'none';
                        modal.setAttribute('aria-hidden', 'true');
                        document.removeEventListener('keydown', handleModalKeydown);
                    } else {
                        console.error(`Modal with ID ${modalId} not found.`);
                    }
                }

                // Close modal on Esc key press
                function handleModalKeydown(event) {
                    if (event.key === 'Escape') {
                        const openModals = document.querySelectorAll('.modal[aria-hidden="false"]');
                        openModals.forEach(modal => hideModal(modal.id));
                    }
                }

                // Close modal when clicking outside
                document.addEventListener('click', (event) => {
                    if (event.target.classList.contains('modal')) {
                        hideModal(event.target.id);
                    }
                });

                // Ensure modals are hidden on page load
                document.addEventListener('DOMContentLoaded', () => {
                    document.querySelectorAll('.modal').forEach(modal => {
                        modal.style.display = 'none';
                        modal.setAttribute('aria-hidden', 'true');
                    });
                });
            </script>
        @endpush
    @endsection
</body>

</html>
