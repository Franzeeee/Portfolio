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
        <form method="POST" action="{{ route('skill.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
                <img src="{{ asset('img/back.png') }}">
                <p>Go Back</p>
            </div>
            <legend>Portfolio - Skill</legend>
            <div class="group-control">
                <label for="image">Upload Skill Image (Optional)</label>
                <input type="file" name="skill_image" placeholder="Skill Image">
            </div>
            <div class="group-control">
                <label for="image">Skill Name</label>
                <input type="text" name="skill_name" placeholder="Skill Name" autocomplete="off" required>
            </div>
            <button>Add Skill</button>
        </form>

    </div>
</body>
</html>