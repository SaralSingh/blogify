@extends('layouts.dashboard')

@section('title', $post->title . ' – Blogify')

@section('content')
    <div class="container"
        style="
        max-width: 100%;
        width: 100%;
        background-color: #fff;
        padding: 20px 25px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 20px;
    ">
        <h1 style="
            font-size: 1.6rem;
            color: #333;
            margin-bottom: 10px;
        ">
            {{ $post->title }}</h1>

        <div class="meta"
            style="
            display: flex;
            justify-content: space-between;
            color: #777;
            font-size: 0.9rem;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        ">
            <div>
                👤 {{ $post->user->name }}<br>
                🧾 {{ '@' . $post->user->username }}
            </div>
            <div>
                🗓️ {{ $post->created_at->format('F j, Y') }}
            </div>
        </div>

        <div class="content"
            style="
            font-size: 1.05rem;
            color: #444;
            line-height: 1.7;
            white-space: pre-line;
        ">
            {{ $post->description }}
        </div>

        <div class="actions"
            style="
            margin-top: 20px;
            display: flex;
            gap: 15px;
        ">
            <a href="{{ route('viewComment', ['id' => $post->id]) }}"
                style="display: inline-block; margin-top: 10px; padding: 6px 12px; background-color: #e0f2ff; color: #007bff; border-radius: 6px; font-weight: 500; text-decoration: none; transition: 0.2s;">
                💬 Comments: <strong>{{ $post->comments->count() }}</strong>
            </a>
        </div>
    </div>
@endsection
