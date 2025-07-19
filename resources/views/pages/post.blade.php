<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogify – Post</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            color: #1a1a1a;
        }

        .container {
            max-width: 900px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .post-title {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 20px;
            border-left: 6px solid #007bff;
            padding-left: 16px;
            line-height: 1.3;
        }

        /* Post Content */
        .post-image {
            margin: 2rem 0;
            border-radius: 0.5rem;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .post-image img {
            width: 100%;
            height: auto;
            display: block;
            max-height: 500px;
            object-fit: cover;
        }

        .author-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 0.95rem;
            color: #555;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 12px;
        }

        .author-box .author-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .author-box .author-info img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .post-body {
            font-size: 1.1rem;
            line-height: 1.75;
            color: #2d2d2d;
            margin-bottom: 40px;
            white-space: pre-line;
        }

        .engagement-buttons {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .reaction-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            background-color: #e9ecef;
            color: #333;
        }

        .reaction-btn:hover {
            background-color: #dee2e6;
            transform: translateY(-2px);
        }

        .reaction-btn.active-like {
            background-color: #28a745;
            color: white;
        }

        .reaction-btn.active-dislike {
            background-color: #dc3545;
            color: white;
        }

        .reaction-count {
            font-weight: 600;
            min-width: 24px;
            text-align: center;
        }

        .action-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .action-btn.outline {
            background-color: transparent;
            color: #007bff;
            border: 2px solid #007bff;
        }

        .action-btn.outline:hover {
            background-color: #007bff;
            color: white;
        }

        #comment-section {
            margin-top: 40px;
        }

        #comment-section h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .comment-container {
            margin-top: 20px;
        }

        .comment-input-area {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .user-avatar img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-input-wrapper {
            flex: 1;
        }

        .comment-input-wrapper textarea {
            border-color: #ced4da;
            transition: border-color 0.3s ease;
        }

        .comment-input-wrapper textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .comment-input-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 8px;
        }

        .comment-input-buttons {
            display: flex;
            gap: 10px;
        }

        .comment-sort {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .comment-sort select {
            padding: 6px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            font-size: 0.95rem;
        }

        .comment-card {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            border-left: 4px solid #007bff;
            transition: transform 0.3s ease;
        }

        .comment-card.reply {
            margin-left: 40px;
            border-left-color: #6c757d;
        }

        .comment-card:hover {
            transform: translateY(-3px);
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .comment-header img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
        }

        .comment-content {
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .comment-meta {
            font-size: 0.85rem;
            color: #6c757d;
        }

        .comment-actions {
            display: flex;
            gap: 15px;
            font-size: 0.9rem;
        }

        .comment-actions button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .comment-actions button:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .reply-toggle {
            color: #007bff;
            cursor: pointer;
            font-weight: 600;
            margin-top: 10px;
            display: inline-block;
        }

        .reply-toggle:hover {
            text-decoration: underline;
        }

        .reply-form {
            margin-top: 15px;
            margin-left: 40px;
            display: flex;
            gap: 15px;
        }

        .reply-form textarea {
            flex: 1;
        }

        .reply-form-buttons {
            display: flex;
            gap: 10px;
            margin-top: 8px;
        }

        textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ced4da;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            resize: vertical;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #007bff;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        .loading-spinner {
            border: 3px solid #f3f3f3;
            border-top: 3px solid #007bff;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                max-width: 95%;
                padding: 30px;
            }

            .post-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 20px;
            }

            .post-title {
                font-size: 1.75rem;
                padding-left: 12px;
            }

            .post-body {
                font-size: 1rem;
            }

            .author-box {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .engagement-buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .comment-input-area {
                flex-direction: column;
            }

            .user-avatar {
                display: none;
            }

            .comment-card.reply {
                margin-left: 20px;
            }

            .reply-form {
                margin-left: 20px;
                flex-direction: column;
            }

            .comment-sort select {
                width: 100%;
            }

            .comment-input-footer {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .comment-input-buttons {
                width: 100%;
                justify-content: flex-end;
            }
        }

        @media (max-width: 480px) {
            .post-title {
                font-size: 1.5rem;
            }

            .comment-card {
                padding: 12px;
            }

            .comment-header img {
                width: 30px;
                height: 30px;
            }

            .action-btn {
                padding: 8px 16px;
                font-size: 0.9rem;
            }
        }

        .author-link {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            color: inherit;
            padding: 8px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .author-link:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .author-link .author-name {
            font-weight: bold;
            color: #333;
            transition: color 0.2s ease;
        }

        .author-link:hover .author-name {
            color: #007bff;
            /* blue on hover */
            text-decoration: underline;
        }

        .author-avatar {
            width: 100px;
            height: 100px;
            border-radius: 20%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    @php
        $auth = Auth::check();
    @endphp

    <div class="container">
        <!-- Post Title -->
        <h1 class="post-title">{{ $post->title }}</h1>

        <div class="author-box">
            <a href="{{ route('user.page', ['id' => $post->user->id]) }}" class="author-link">
                <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="Avatar" class="author-avatar">
                <div>
                    <div class="author-name">{{ $post->user->name }}</div>
                    <span class="comment-meta">{{ '@' . ($post->user->username ?? 'unknown') }}</span>
                </div>
            </a>

            <div class="comment-meta" style="margin-top: 10px;">
                🗓️ {{ $post->created_at->format('F j, Y') }}
            </div>
        </div>


        @if ($post->picture)
            <div class="post-image">
                <img src="{{ asset('storage/' . $post->picture) }}" alt="Post Image">
            </div>
        @endif

        <!-- Post Content -->
        <div class="post-body">
            {{ $post->description }}
        </div>

        <!-- Engagement Buttons -->
        <div class="engagement-buttons">
            <button id="like-btn-{{ $post->id }}" class="reaction-btn" onclick="handleReact({{ $post->id }}, 1)"
                aria-label="Like this post">
                <i class="fas fa-thumbs-up"></i>
                <span class="reaction-count" id="likes-{{ $post->id }}">0</span>
            </button>
            <button id="dislike-btn-{{ $post->id }}" class="reaction-btn"
                onclick="handleReact({{ $post->id }}, 0)" aria-label="Dislike this post">
                <i class="fas fa-thumbs-down"></i>
                <span class="reaction-count" id="dislikes-{{ $post->id }}">0</span>
            </button>
            <button class="reaction-btn" onclick="sharePost('{{ url("/post/{$post->id}") }}')"
                aria-label="Share this post">
                <i class="fas fa-share"></i> Share
            </button>
        </div>

        <!-- Comment Section -->
        <div id="comment-section">
            <h3>Comments (<span id="comment-count-{{ $post->id }}">0</span>)</h3>
            <div id="comment-section-{{ $post->id }}" class="comment-container">
                <!-- Comment Input Area -->
                <div class="comment-input-area">
                    @if ($auth)
                        <div class="user-avatar">
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover; object-position: center;"
                                alt="Avatar">
                        </div>
                        <div class="comment-input-wrapper">
                            <textarea id="commentInput" rows="3" placeholder="Add a public comment..." aria-label="Add a comment"
                                maxlength="500"></textarea>
                            <div class="comment-input-footer">
                                <span id="comment-char-count" class="comment-meta">0/500</span>
                                <div class="comment-input-buttons" style="display: none;" id="comment-input-buttons">
                                    <button class="action-btn outline" onclick="cancelComment()">Cancel</button>
                                    <button class="action-btn"
                                        onclick="handleCommentSubmit({{ $post->id }})">Comment</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <p style="color: #6c757d;">Please <a href="{{ route('login.page') }}"
                                class="action-btn outline">log in</a> to comment.</p>
                    @endif
                </div>

                <!-- Sort By Dropdown -->
                {{-- <div class="comment-sort">
                    <label for="sort-comments" class="comment-meta">Sort by:</label>
                    <select id="sort-comments" onchange="fetchComments({{ $post->id }})" aria-label="Sort comments">
                        <option value="newest">Newest first</option>
                        <option value="oldest">Oldest first</option>
                    </select>
                </div> --}}

                <!-- Comment List -->
                <div class="comments-list" id="comments-list-{{ $post->id }}"></div>
                <div id="loading-comments" class="loading-spinner" style="display: none;"></div>
            </div>
        </div>

        <!-- Back Link -->
        {{-- <a class="back-link" href="{{ url('/') }}">← Back to Home</a> --}}
    </div>

    <script>
        // const url = 'http://127.0.0.1:8000'; // Change in production
        const url = 'https://blogify-912d.onrender.com';
        const token = localStorage.getItem('token');
        const isLoggedIn = @json($auth);

        // Auto-clear localStorage if backend auth is lost
        if (!isLoggedIn) {
            localStorage.clear();
        }

        // Character counter for comment input
        document.addEventListener('DOMContentLoaded', () => {
            const commentInput = document.getElementById('commentInput');
            const charCount = document.getElementById('comment-char-count');
            const commentButtons = document.getElementById('comment-input-buttons');

            if (commentInput) {
                commentInput.addEventListener('input', () => {
                    const count = commentInput.value.length;
                    charCount.textContent = `${count}/500`;
                    commentButtons.style.display = count > 0 ? 'flex' : 'none';
                });
            }

            const postId = {{ $post->id }};
            isLoggedIn ? updateReactionCount(postId) : loadReactionCountsForVisitor(postId);
            fetchComments(postId);
        });

        function cancelComment() {
            const commentInput = document.getElementById('commentInput');
            commentInput.value = '';
            document.getElementById('comment-char-count').textContent = '0/500';
            document.getElementById('comment-input-buttons').style.display = 'none';
        }

        function handleCommentSubmit(postId) {
            if (!isLoggedIn) {
                alert('Please login to comment!');
                return;
            }

            const commentInput = document.getElementById('commentInput');
            const commentData = commentInput.value.trim();
            if (!commentData) {
                alert('Comment cannot be empty!');
                return;
            }

            document.getElementById('loading-comments').style.display = 'block';
            fetch(`${url}/api/post/comment`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        post_id: postId,
                        comment: commentData
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('loading-comments').style.display = 'none';
                    if (data.status) {
                        cancelComment();
                        fetchComments(postId);
                    } else {
                        alert('Something went wrong while saving your comment.');
                    }
                })
                .catch(err => {
                    document.getElementById('loading-comments').style.display = 'none';
                    console.error(err);
                    alert('Something went wrong.');
                });
        }

        function handleReact(postId, reaction) {
            if (!isLoggedIn) {
                alert('Please login to react!');
                return;
            }

            fetch(`${url}/api/posts/${postId}/react`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': `Bearer ${token}`
                    },
                    body: JSON.stringify({
                        reaction
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status) updateReactionCount(postId);
                })
                .catch(err => console.error('React Error:', err));
        }

        function updateReactionCount(postId) {
            fetch(`${url}/api/posts/${postId}/reactions`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById(`likes-${postId}`).innerText = data.likes;
                    document.getElementById(`dislikes-${postId}`).innerText = data.dislikes;
                    updateActiveButtons(postId, data.userReaction);
                });
        }

        function updateActiveButtons(postId, reaction) {
            const likeBtn = document.getElementById(`like-btn-${postId}`);
            const dislikeBtn = document.getElementById(`dislike-btn-${postId}`);
            likeBtn.classList.remove('active-like');
            dislikeBtn.classList.remove('active-dislike');

            if (reaction === 1) {
                likeBtn.classList.add('active-like');
            } else if (reaction === 0) {
                dislikeBtn.classList.add('active-dislike');
            }
        }

        function loadReactionCountsForVisitor(postId) {
            fetch(`${url}/api/public/post/reaction/${postId}`)
                .then(res => res.json())
                .then(data => {
                    if (data.status) {
                        document.getElementById(`likes-${postId}`).innerText = data.likes;
                        document.getElementById(`dislikes-${postId}`).innerText = data.dislikes;
                    }
                });
        }

        function fetchComments(postId) {
            const sortBy = document.getElementById('sort-comments')?.value || 'newest';
            document.getElementById('loading-comments').style.display = 'block';
            fetch(`${url}/api/public/post/comment/${postId}?sort=${sortBy}`, {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('loading-comments').style.display = 'none';
                    const listEl = document.getElementById(`comments-list-${postId}`);
                    const countEl = document.getElementById(`comment-count-${postId}`);

                    if (data.status && Array.isArray(data.comments)) {
                        countEl.innerText = data.comments.length;
                        listEl.innerHTML = '';

                        // Group comments by parent_id for threading
                        const commentTree = buildCommentTree(data.comments);
                        renderComments(commentTree, listEl, postId);
                    } else {
                        listEl.innerHTML = `<div style="color: #6c757d;">No comments yet.</div>`;
                        countEl.innerText = 0;
                    }
                })
                .catch(error => {
                    document.getElementById('loading-comments').style.display = 'none';
                    console.error('Error fetching comments:', error);
                });
        }

        function buildCommentTree(comments) {
            const commentMap = {};
            const tree = [];

            // Create a map of comments by ID
            comments.forEach(comment => {
                comment.replies = [];
                commentMap[comment.id] = comment;
            });

            // Build the tree structure
            comments.forEach(comment => {
                if (comment.parent_id) {
                    if (commentMap[comment.parent_id]) {
                        commentMap[comment.parent_id].replies.push(comment);
                    }
                } else {
                    tree.push(comment);
                }
            });

            return tree;
        }

        function renderComments(comments, container, postId, level = 0) {
            comments.forEach(comment => {
                const commentItem = document.createElement('div');
                commentItem.className = `comment-card ${level > 0 ? 'reply' : ''}`;
                const hasReplies = comment.replies.length > 0;
                const replyId = `replies-${comment.id}`;

                commentItem.innerHTML = `
                    <div class="comment-header">
                        <img src="/storage/${comment.user?.avatar ?? 'default.png'}"
                            alt="Avatar"
                            style="width: 35px; height: 35px; border-radius: 50%; object-fit: cover; object-position: center;">

                        <div>
                            <a href="{{ url('/user/profile') }}/${comment.user?.id}" style="color: var(--accent-color); font-weight: bold;">
                            ${comment.user?.username ?? 'guest'}</a>
                            <div class="comment-meta">${new Date(comment.created_at).toLocaleString()}</div>
                        </div>
                    </div>
                    <div class="comment-content">${comment.comment}</div>
                    <div class="comment-actions">
                        <button onclick="toggleReplyForm(${comment.id})" aria-label="Reply to comment">Reply</button>
                        ${isLoggedIn && comment.user?.id === {{ Auth::id() ?? 0 }} ?
                            `<button onclick="deleteComment(${comment.id}, ${postId})" aria-label="Delete comment">Delete</button>` : ''}
                    </div>
                    <div class="reply-form" id="reply-form-${comment.id}" style="display: none;">
                        <div class="user-avatar">
                           <img src="{{ Auth::check() ? asset('storage/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" style="width: 35px; height: 35px; border-radius: 50%;">
                        </div>
                        <div class="comment-input-wrapper">
                            <textarea rows="2" placeholder="Add a reply..." class="reply-input" id="reply-input-${comment.id}" maxlength="500" aria-label="Add a reply"></textarea>
                            <div class="reply-form-buttons">
                                <button class="action-btn outline" onclick="cancelReply(${comment.id})">Cancel</button>
                                <button class="action-btn" onclick="submitReply(${comment.id}, ${postId})">Reply</button>
                            </div>
                        </div>
                    </div>
                    ${hasReplies ? `
                    <div class="reply-toggle" onclick="toggleReplies(${comment.id})" id="toggle-${comment.id}" aria-label="Toggle replies">
                    Show ${comment.replies.length} repl${comment.replies.length > 1 ? 'ies' : 'y'}
                    </div>
                    <div id="${replyId}" style="display: none;"></div>
                    ` : ''}
                `;

                container.appendChild(commentItem);

                // Render replies recursively
                if (hasReplies) {
                    const replyContainer = document.getElementById(replyId);
                    renderComments(comment.replies, replyContainer, postId, level + 1);
                }
            });
        }

        function toggleReplyForm(commentId) {
            if (!isLoggedIn) {
                alert("Oops! Please log in to reply.");
                return;
            }
            const replyForm = document.getElementById(`reply-form-${commentId}`);
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        }

        function cancelReply(commentId) {
            const replyInput = document.getElementById(`reply-input-${commentId}`);
            replyInput.value = '';
            toggleReplyForm(commentId);
        }

        function submitReply(commentId, postId) {
            const replyInput = document.getElementById(`reply-input-${commentId}`);
            const replyData = replyInput.value.trim();
            if (!replyData) {
                alert('Reply cannot be empty!');
                return;
            }

            document.getElementById('loading-comments').style.display = 'block';
            fetch(`${url}/api/post/comment`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        post_id: postId,
                        comment: replyData,
                        parent_id: commentId
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('loading-comments').style.display = 'none';
                    if (data.status) {
                        cancelReply(commentId);
                        fetchComments(postId);
                    } else {
                        alert('Something went wrong while saving your reply.');
                    }
                })
                .catch(err => {
                    document.getElementById('loading-comments').style.display = 'none';
                    console.error(err);
                    alert('Something went wrong.');
                });
        }

        function toggleReplies(commentId) {
            const replyContainer = document.getElementById(`replies-${commentId}`);
            const toggleButton = document.getElementById(`toggle-${commentId}`);
            const isHidden = replyContainer.style.display === 'none';

            replyContainer.style.display = isHidden ? 'block' : 'none';
            toggleButton.textContent = isHidden ?
                `Hide replies` :
                `Show ${replyContainer.querySelectorAll('.comment-card').length} repl${replyContainer.querySelectorAll('.comment-card').length > 1 ? 'ies' : 'y'}`;
        }

        function deleteComment(commentId, postId) {
            if (confirm('Are you sure you want to delete this comment?')) {
                document.getElementById('loading-comments').style.display = 'block';
                fetch(`${url}/api/post/comment/delete/${commentId}`, {
                        method: 'DELETE',
                        headers: {
                            'Authorization': `Bearer ${token}`
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        document.getElementById('loading-comments').style.display = 'none';
                        if (data.status) {
                            fetchComments(postId);
                        } else {
                            alert('Something went wrong while deleting the comment.');
                        }
                    })
                    .catch(err => {
                        document.getElementById('loading-comments').style.display = 'none';
                        console.error('Delete Error:', err);
                    });
            }
        }

        function sharePost(postUrl) {
            if (navigator.share) {
                navigator.share({
                    title: '{{ $post->title }}',
                    url: postUrl
                }).catch(err => console.error('Share Error:', err));
            } else {
                alert('Copy this link to share: ' + postUrl);
            }
        }
    </script>
</body>

</html>
