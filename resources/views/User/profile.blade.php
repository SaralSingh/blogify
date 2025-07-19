<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Profile</title>
</head>

<body>
    @extends('layouts.dashboard')
    @section('title', 'My Profile')
    @section('content')
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-signin" type="submit">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
    @endsection
</body>

</html>
