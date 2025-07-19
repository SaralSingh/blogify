    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @extends('layouts.dashboard')
    @section('title', 'Notifications')
    @section('content')

        <style>
            .notif-container {
                max-width: 100%;
                background-color: #1a1a1a;
                border: 1px solid #2a2a2a;
                border-radius: 10px;
                height: 85vh;
                overflow-y: auto;
                padding: 0;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                position: relative;
            }

            .notif-header {
                position: sticky;
                top: 0;
                background-color: #1a1a1a;
                padding: 1rem;
                border-bottom: 1px solid #333;
                font-size: 1.5rem;
                font-weight: bold;
                color: #fff;
                z-index: 10;
            }

            .notif-list {
                padding: 1rem;
            }

            .notif-card {
                background-color: #1f1f1f;
                border: 1px solid #2a2a2a;
                padding: 1rem;
                border-radius: 8px;
                margin-bottom: 1rem;
                color: #e0e0e0;
            }

            .notif-card a {
                color: #3b82f6;
                text-decoration: none;
                font-weight: 500;
            }

            .notif-card a:hover {
                text-decoration: underline;
            }

            .notif-time {
                font-size: 0.8rem;
                color: #aaa;
                margin-top: 0.5rem;
            }

            .notif-empty {
                text-align: center;
                padding: 3rem 1rem;
                color: #888;
            }

            .notif-empty img {
                width: 160px;
                border-radius: 50%;
                margin-bottom: 1rem;
            }
        </style>

        <div class="notif-container">
            <div class="notif-header">
                <i class="fas fa-bell text-yellow-400 mr-2"></i> Notifications
            </div>

            <div class="notif-list">
                @forelse ($notifications as $notification)
                    <div class="notif-card">
                        <div>
                            <a href="{{ $notification->data['url'] ?? '#' }}">
                                {{ $notification->data['message'] ?? 'No message' }}
                            </a>
                        </div>
                        <div class="notif-time">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center text-center py-10">
                        <img src="https://media.tenor.com/OSO8YozpungAAAAi/bt21-rj.gif" alt="No notifications"
                            class="w-32 h-32 mb-4 object-contain mx-auto">
                        <p class="text-gray-300 text-lg">No notifications yet. 🎉</p>
                    </div>
                @endforelse
            </div>
        </div>
    @endsection
