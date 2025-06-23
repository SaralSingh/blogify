    @extends('layouts.dashboard')
    @section('title', 'Comments for Post' . $post->id)

    @section('content')
        <div style="padding: 20px;">
            <h2>📝 Comments for: <strong>{{ $post->title }}</strong></h2>

            <hr>

            @if ($comments->count())
                @foreach ($comments as $comment)
                    <div
                        style="padding: 15px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 8px; background: #f9f9f9;">
                        <div style="font-weight: bold; color: #007bff;">
                            {{ $comment->user->username ?? 'Unknown User' }}
                        </div>
                        <p style="margin-top: 5px; color: #333;">
                            {{ $comment->comment }}
                        </p>
                        <small style="color: #888;">🕒 {{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            @else
                <p>No comments yet for this post.</p>
            @endif

            <a href="{{ route('user.post.view',[$post->id]) }}" style="text-decoration: none; color: #007bff;">← Go to Post</a>
        </div>
    @endsection
