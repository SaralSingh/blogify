@extends('layouts.dashboard')
@section('title', 'Comments for Post ' . $post->id)

@section('content')
<div style="padding: 20px; background-color: #fdfefe ;">
    <h2>📝 Comments for: <strong>{{ $post->title }}</strong></h2>
    <hr>

    @php
        $authId = auth()->id();

        function renderReplies($replies, $authId, $margin = 30) {
            foreach ($replies as $reply) {
                $replyId = 'reply-' . $reply->id;
                echo '<div style="margin-left: ' . $margin . 'px; margin-top: 10px; padding: 10px; border-left: 3px solid #007bff;">';

                echo '<div style="display: flex; justify-content: space-between; align-items: center;">';
                echo '<div style="font-weight: bold; ' . ($reply->user_id === $authId ? 'color: #dc3545;' : 'color: #28a745;') . '">';
                echo e($reply->user->username ?? 'Unknown User');
                if ($reply->user_id === $authId) {
                    echo ' <span style="font-size: 0.8rem; color: #dc3545;">(You)</span>';
                }
                echo '</div>';

                if ($reply->user_id === $authId) {
                    echo '<form action="' . route('comment.delete', $reply->id) . '" method="POST" style="margin: 0;">' .
                            csrf_field() .
                            method_field('DELETE') .
                            '<button type="submit" style="border: none; background: none; color: red; cursor: pointer;">🗑️ Delete</button>' .
                         '</form>';
                }
                echo '</div>';

                echo '<p style="margin-top: 5px; color: #333;">' . e($reply->comment) . '</p>';
                echo '<small style="color: #888;">🕒 ' . $reply->created_at->diffForHumans() . '</small>';

                // Nested replies
                if ($reply->repliesRecursive && $reply->repliesRecursive->count()) {
                    $count = $reply->repliesRecursive->count();
                    echo '<button onclick="toggleReplies(\'' . $replyId . '\', this)" class="toggle-btn">Show (' . $count . ') Replies ⬇️</button>';
                    echo '<div id="' . $replyId . '" style="display: none; margin-top: 10px;">';
                    renderReplies($reply->repliesRecursive, $authId, $margin + 30);
                    echo '</div>';
                }

                echo '</div>';
            }
        }
    @endphp

    <style>
    .toggle-btn {
        background-color: #e0e7ff;
        color: #1e40af;
        border: none;
        padding: 8px 16px;
        font-weight: 600;
        font-size: 0.95rem;
        border-radius: 8px;
        cursor: pointer;
        margin-top: 10px;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .toggle-btn:hover {
        background-color: #c7d2fe;
        color: #1e3a8a;
        transform: translateY(-1px);
    }

    .toggle-btn:focus {
        outline: 2px solid #1e40af;
        outline-offset: 2px;
    }
</style>


    @if ($comments->count())
        @foreach ($comments as $comment)
            <div style="padding: 15px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div style="font-weight: bold; {{ $comment->user_id === $authId ? 'color: #dc3545;' : 'color: #007bff;' }}">
                        {{ $comment->user->username ?? 'Unknown User' }}
                        @if($comment->user_id === $authId)
                            <span style="font-size: 0.8rem; color: #dc3545;">(You)</span>
                        @endif
                    </div>

                    @if($comment->user_id === $authId)
                        <form action="{{ route('comment.delete', $comment->id) }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; color: red; cursor: pointer;">🗑️ Delete</button>
                        </form>
                    @endif
                </div>

                <p style="margin-top: 5px; color: #333;">{{ $comment->comment }}</p>
                <small style="color: #888;">🕒 {{ $comment->created_at->diffForHumans() }}</small>

                @if ($comment->repliesRecursive && $comment->repliesRecursive->count())
                    @php $replyId = 'reply-' . $comment->id; @endphp
                    <button onclick="toggleReplies('{{ $replyId }}', this)" class="toggle-btn">
                        Show ({{ $comment->repliesRecursive->count() }}) Replies ⬇️
                    </button>
                    <div id="{{ $replyId }}" style="display: none; margin-top: 10px;">
                        @php renderReplies($comment->repliesRecursive, $authId); @endphp
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <p>No comments yet for this post.</p>
    @endif

    <a href="{{ route('user.post.view',[$post->id]) }}" style="text-decoration: none; color: #007bff;">← Go to Post</a>
</div>

{{-- Toggle Replies JS --}}
<script>
    function toggleReplies(id, btn) {
        const el = document.getElementById(id);
        if (el.style.display === 'none') {
            el.style.display = 'block';
            btn.innerText = btn.innerText.replace("Show", "Hide").replace("⬇️", "⬆️");
        } else {
            el.style.display = 'none';
            btn.innerText = btn.innerText.replace("Hide", "Show").replace("⬆️", "⬇️");
        }
    }
</script>
@endsection
