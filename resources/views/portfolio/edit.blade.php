<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>
    <div class="container">
        <form method="POST" action="{{ route('portfolio.update', $portfolio) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" value="{{ $portfolio }}" name="id">
            <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
                <img src="{{ asset('img/back.png') }}">
                <p>Go Back</p>
            </div>
            <legend>Portfolio Main Image</legend>
            <div class="group-control">
                <label for="image">Upload New Image</label>
                <input type="file" name="profile_picture" placeholder="Main Image">
            </div>
            <button>Update Main Image</button>
        </form>

    </div>
</body>
</html>