<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Post – Blogify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        /* Custom transition for inputs */
        input, textarea {
            transition: border-color 0.3s ease-out, border-width 0.3s ease-out;
        }

        /* Smooth label transitions */
        .floating-label {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), scale 0.3s cubic-bezier(0.4, 0, 0.2, 1), color 0.3s ease-out;
        }

        /* Button hover scale */
        .btn-hover {
            transition: transform 0.2s ease-out, background-color 0.2s ease-out, box-shadow 0.2s ease-out;
        }

        /* Form container animation */
        .form-container {
            animation: slide-up 0.5s ease-out;
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translateY(1rem);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
@extends('layouts.dashboard')
@section('title', 'Create Post')

@section('content')
<div class="w-full px-3 sm:px-5 lg:px-8 mt-6">
    <div class="bg-white p-6 sm:p-5 rounded-xl shadow-md">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-800 mb-6">📝 Edit Post</h2>

        <form action="{{ route('post.edit') }}" method="POST" class="space-y-8">
            @csrf

            <input type="hidden" name="post_id" value="{{ $post->id }}">

            <!-- Title Field -->
            <div class="relative">
                <input type="text" name="title" id="title" value="{{$post->title}}" value="{{ old('title') }}" required
                    class="peer w-full border-b-2 border-gray-300 bg-transparent px-1.5 pt-6 pb-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600"
                    placeholder="Enter Title">
                <label for="title"
                    class="absolute left-1.5 top-2 text-gray-500 text-sm transition-all 
                    peer-placeholder-shown:top-6 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 
                    peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600">
                    Post Title
                </label>
                @error('title')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description Field -->
            <div class="relative">
                <textarea name="description" id="description" rows="12" required
                    class="peer w-full border-b-2 border-gray-300 bg-transparent px-1.5 pt-6 pb-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-blue-600"
                    placeholder="Enter Description">{{$post->description}}</textarea>
                <label for="description"
                    class="absolute left-1.5 top-2 text-gray-500 text-sm transition-all 
                    peer-placeholder-shown:top-6 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 
                    peer-focus:top-2 peer-focus:text-sm peer-focus:text-blue-600">
                    Description
                </label>
                @error('description')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-4 pt-4">
                <button type="reset"
                    class="px-4 py-2 text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100 transition">
                    Reset
                </button>
                <button type="submit"
                    class="px-5 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

</body>
</html>