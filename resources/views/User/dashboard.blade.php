<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify – User Dashboard</title>
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

        /* Search Wrapper */
        .search-wrapper {
            position: sticky;
            top: -2rem;
            z-index: 100;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            margin: -2rem -2rem 2rem -2rem;
            padding: 2rem 2rem 1rem 2rem;
            border-radius: 16px 16px 0 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-input {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid rgba(102, 126, 234, 0.2);
            border-radius: 12px;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .search-input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        /* Section Styles */
        .section-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            padding: 0;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1.5rem 2rem;
            border-bottom: none;
        }

        .card-body {
            padding: 2rem;
        }

        /* Post Card Styles */
        .post-card {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            border: 1px solid rgba(102, 126, 234, 0.1);
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .post-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.15);
        }

        .post-id {
            display: inline-block;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .post-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: #333;
            margin: 0 0 1rem 0;
            line-height: 1.3;
        }

        .post-description {
            color: #666;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .post-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .post-link:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .post-stats {
            display: flex;
            gap: 1.5rem;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.7);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            color: #333;
        }

        .comments-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .comments-link:hover {
            background: rgba(102, 126, 234, 0.2);
            color: #667eea;
            transform: translateY(-2px);
        }

        .post-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .post-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-weight: 500;
        }

        .post-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .edit-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #28a745, #20c997);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .edit-btn:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
        }

        .delete-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .delete-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
        }

        /* Not Found Styles */
        .not-found {
            text-align: center;
            padding: 3rem 2rem;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            margin-top: 2rem;
        }

        .not-found img {
            max-width: 250px;
            margin-bottom: 1rem;
            border-radius: 12px;
        }

        .not-found p {
            font-size: 1.1rem;
            font-weight: 600;
            color: #666;
        }

        /* Toast Styles */
        .toast {
            background: linear-gradient(135deg, #28a745, #20c997) !important;
            border: none !important;
            border-radius: 12px !important;
            box-shadow: 0 8px 32px rgba(40, 167, 69, 0.3) !important;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                flex-direction: column;
                padding: 0.5rem;
            }

            .sidebar {
                width: 100%;
                padding: 1rem;
            }

            .main-content {
                padding: 1rem;
            }

            .search-wrapper {
                margin: -1rem -1rem 1rem -1rem;
                padding: 1rem;
            }

            .post-stats {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            .post-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .post-actions {
                width: 100%;
                justify-content: space-between;
            }
        }
    </style>
</head>

<body>
@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="search-wrapper">
    <div class="input-group">
        <span class="input-group-text" style="background: rgba(102, 126, 234, 0.1); border: 2px solid rgba(102, 126, 234, 0.2); border-right: none; border-radius: 12px 0 0 12px;">
            <i class="fas fa-search" style="color: #667eea;"></i>
        </span>
        <input type="text" id="searchInput" class="form-control search-input" 
               placeholder="Search posts by title..." onkeyup="filterPosts()" 
               style="border-left: none; border-radius: 0 12px 12px 0;">
    </div>
</div>

<section id="my-posts" class="card">
    <div class="card-header">
        <h4 class="section-title" style="color: white; margin: 0;">
            <i class="fas fa-blog"></i>
            My Blog Posts
        </h4>
    </div>
    <div class="card-body">
        <div id="postContainer">
            @foreach ($posts as $post)
                <div class="post-card" data-title="{{ strtolower($post->title) }}">
                    <div class="post-id">
                        #{{ $post->id }}
                    </div>

                    <h3 class="post-title">
                        {{ $post->title }}
                    </h3>

                    <p class="post-description">
                        {{ Str::limit($post->description, 120, '...') }}
                    </p>

                    <a href="{{ route('user.post.view', ['id' => $post->id]) }}" class="post-link">
                        <i class="fas fa-eye"></i>
                        View Full Post
                    </a>

                    <div class="post-stats">
                        <div class="stat-item">
                            <i class="fas fa-thumbs-up" style="color: #28a745;"></i>
                            <strong>{{ $post->likes }}</strong>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-thumbs-down" style="color: #dc3545;"></i>
                            <strong>{{ $post->dislikes }}</strong>
                        </div>
                        <a href="{{ route('viewComment', ['id' => $post->id]) }}" class="comments-link">
                            <i class="fas fa-comments"></i>
                            <strong>{{ $post->comments }}</strong> Comments
                        </a>
                    </div>

                    <div class="post-footer">
                        <div class="post-date">
                            <i class="fas fa-calendar-alt"></i>
                            {{ $post->created_at->format('F j, Y') }}
                        </div>

                        <div class="post-actions">
                            <a href="{{ route('post.edit.page', $post->id) }}" class="edit-btn">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('post.delete', $post->id) }}" method="POST" style="display: inline;"
                                  onsubmit="return confirm('Are you sure you want to delete this post?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <i class="fas fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@if (session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 9999;">
        <div id="liveToast" class="toast align-items-center border-0" role="alert"
             aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="3000">
            <div class="d-flex">
                <div class="toast-body" style="color: white; font-weight: 600;">
                    <i class="fas fa-check-circle me-2"></i>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const authToken = "{{ session('auth_token') }}";
    if (authToken) {
        localStorage.setItem('token', authToken);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const toastEl = document.getElementById('liveToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });

    function filterPosts() {
        const input = document.getElementById('searchInput').value.trim().toLowerCase();
        const posts = document.querySelectorAll('#postContainer .post-card');
        let found = false;

        posts.forEach(post => {
            const title = post.dataset.title;
            const matches = title.includes(input);
            post.style.display = matches ? "block" : "none";
            if (matches) found = true;
        });

        // Handle "Not Found" display
        const notFoundId = "notFound";
        const container = document.getElementById('postContainer');

        if (!found && input !== '') {
            if (!document.getElementById(notFoundId)) {
                const notFound = document.createElement('div');
                notFound.id = notFoundId;
                notFound.className = 'not-found';
                notFound.innerHTML = `
                    <img src="https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExM3FpbW44eGdxMDZoMjdwazR2dWQ4MnM3MXQxMzF1cXBrYnVtMXNtOCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/SDUiharA58JhGCwDqP/giphy.gif" 
                         alt="Not Found">
                    <p><i class="fas fa-search me-2"></i>No matching posts found for "${input}"</p>
                `;
                container.appendChild(notFound);
            }
        } else {
            const existing = document.getElementById(notFoundId);
            if (existing) existing.remove();
        }
    }

    // Add smooth scroll behavior
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endpush

</body>
</html>