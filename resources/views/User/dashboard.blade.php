@extends('layouts.dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify – User Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
<style>
    :root {
        --bg-primary: #121212;
        --bg-secondary: #1e1e1e;
        --bg-tertiary: #252525;
        --text-primary: #ffffff;
        --text-secondary: #cfcfcf;
        --text-muted: #999999;
        --accent-color: #3b82f6;
        --accent-hover: #2563eb;
        --border-color: #333333;
    }

    .dashboard-container {
        display: flex;
        flex-wrap: wrap;
        max-width: 1400px;
        margin: 1rem auto;
        padding: 1rem;
        gap: 1.5rem;
    }

.scrollable-posts {
    max-height: 82vh; /* Increased from 70vh */
    overflow-y: auto;
    padding-right: 0.5rem;
    padding-bottom: 1rem;
}


.search-wrapper {
    position: sticky;
    top: 0;
    background-color: var(--bg-secondary);
    z-index: 10;
}

    .main-content {
        flex: 1;
        background-color: var(--bg-secondary);
        border-radius: 16px;
        padding: 2rem;
        border: 1px solid var(--border-color);
        overflow-y: auto;
    }



    .search-input {
        background-color: var(--bg-primary);
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 1rem;
        color: var(--text-primary);
    }

    .section-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin-bottom: 2rem;
    }

    .card {
        background-color: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: 16px;
    }

    .card-header {
        padding: 1.5rem 2rem;
        background-color: #1a1a1a;
        color: white;
    }

    .card-body {
        padding: 2rem;
    }

    .post-card {
        background-color: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        border-radius: 16px;
        padding: 2rem;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .post-card:hover {
        background-color: #2d2d2d;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    .post-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #f5f5f5;
        margin-bottom: 1rem;
    }

    .post-description {
        margin-bottom: 1.5rem;
        font-size: 1rem;
        color: #dddddd;
    }

    .post-link {
        display: inline-block;
        background-color: var(--accent-color);
        color: white;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        margin-bottom: 1.5rem;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .post-link:hover {
        background-color: var(--accent-hover);
    }

    .post-stats {
        margin-bottom: 1.5rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .stat-item {
        background-color: var(--bg-primary);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        color: var(--text-secondary);
    }

    .post-footer {
        padding-top: 1.5rem;
        border-top: 1px solid var(--border-color);
        margin-top: 1rem;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        gap: 1rem;
    }

    .edit-btn,
    .delete-btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.6rem 1.2rem;
        border-radius: 8px;
        font-weight: 600;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .edit-btn {
        background: linear-gradient(135deg, #28a745, #20c997);
    }

    .edit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.4);
    }

    .delete-btn {
        background: linear-gradient(135deg, #dc3545, #c82333);
        border: none;
        cursor: pointer;
    }

    .delete-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.4);
    }

    .not-found {
        text-align: center;
        padding: 3rem 1rem;
        margin-top: 2rem;
        background-color: var(--bg-tertiary);
        border-radius: 16px;
    }

    .not-found img {
        max-width: 250px;
        margin-bottom: 1rem;
        border-radius: 12px;
    }

    .toast {
        background: linear-gradient(135deg, #28a745, #20c997) !important;
        border: none !important;
        border-radius: 12px !important;
        box-shadow: 0 8px 32px rgba(40, 167, 69, 0.3) !important;
    }

    .post-date {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #cccccc; /* lighter than muted */
    font-size: 0.95rem;
    font-weight: 500;
    opacity: 0.9;
}


    @media (max-width: 768px) {
        .dashboard-container {
            flex-direction: column;
            padding: 1rem;
        }

        .sidebar {
            width: 100%;
            padding: 1rem;
        }

        .main-content {
            padding: 1rem;
        }

        .post-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        .post-actions {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>
</head>
<body>

@section('title', 'Dashboard')

@section('content')

<section id="my-posts" class="card" style="height: 80vh; display: flex; flex-direction: column;">
    <div class="card-header">
        <h4 class="section-title" style="color: white; margin: 0;">
            <i class="fas fa-blog"></i>
            My Blog Posts
        </h4>
    </div>

    <div class="card-body" style="flex: 1; display: flex; flex-direction: column; overflow: hidden;">

        {{-- Sticky Search Bar --}}
        <div class="search-wrapper" style="position: sticky; top: 0; background-color: #1e1e1e; z-index: 5; padding-bottom: 1rem;">
            <div class="input-group">
                <span class="input-group-text" style="background: rgba(102, 126, 234, 0.1); border: 2px solid rgba(102, 126, 234, 0.2); border-right: none; border-radius: 12px 0 0 12px;">
                    <i class="fas fa-search" style="color: #667eea;"></i>
                </span>
                <input type="text" id="searchInput" class="form-control search-input" 
                       placeholder="Search posts by title..." onkeyup="filterPosts()" 
                       style="border-left: none; border-radius: 0 12px 12px 0;">
            </div>
        </div>

        {{-- Scrollable Post Container --}}
{{-- Scrollable Post Container --}}
<div id="postContainer" class="scrollable-posts">
    @foreach ($posts as $post)
        <div class="post-card" data-title="{{ strtolower($post->title) }}">
            <h3 class="post-title">{{ $post->title }}</h3>
            <p class="post-description">{{ Str::limit($post->description, 120, '...') }}</p>

            <a href="{{ route('post.page', ['id' => $post->id]) }}" class="post-link">
                <i class="fas fa-eye"></i> View Full Post
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
                <div class="stat-item">
                    <i class="fas fa-comments"></i>
                    <strong>{{ $post->comments }}</strong>
                </div>
            </div>

            <div class="post-footer">
                <div class="post-date">
                    <i class="fas fa-calendar-alt"></i>
                    {{ $post->created_at->format('F j, Y') }}
                </div>

                <div class="post-actions">
                    <a href="{{ route('post.edit.page', $post->id) }}" class="edit-btn">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('post.delete', $post->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this post?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">
                            <i class="fas fa-trash"></i> Delete
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
                    <p style="color: #cccccc;"><i class="fas fa-search me-2" style="color: #3b82f6;"></i>No matching posts found for "${input}"</p>
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
<script src="https://cdn.tailwindcss.com"></script>
@endpush

</body>
</html>