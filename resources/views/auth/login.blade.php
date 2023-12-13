<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    
</head>
<body>
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
                <img src="{{ asset('img/back.png') }}">
                <p>Go Back</p>
            </div>
            <legend>Login Here</legend>
            <div class="group-control">
                <label for="name">Username</label>
                <input type="text" name="name" placeholder="Username" autocomplete="off" required>
            </div>

            <div class="group-control">
                <label for="password">Password</label>
                <div class="password-container">
                    <input type="password" id="passwordInput" name="password" placeholder="Password" autocomplete="off" required>
                    <img id="eyeToggle" src="{{ asset('img/close-eye.png') }}" title="View Password" onclick="togglePasswordVisibility()">
                </div>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
<script src="{{ asset('js/login.js') }}"></script>
</body>
</html>