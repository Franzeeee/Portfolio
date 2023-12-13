@extends('portfolio.edit-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/hobbies-edit.css') }}">
@endsection

@section('form')
<form method="POST" action="{{ route('like-dislike.update') }}">
    @csrf
    @method('POST') <!-- Change to POST method since you want to use POST for the form -->
    <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
        <img src="{{ asset('img/back.png') }}">
        <p>Go Back</p>
    </div>
    <legend>Portfolio - Likes and Dislikes</legend>
    <div class="group-control">
        <label for="likes">Likes</label>
        <textarea name="likes">{{ $likes->content }}</textarea>
    </div>
    <div class="group-control">
        <label for="dislikes">Dislikes</label>
        <textarea name="dislikes">{{ $dislikes->content }}</textarea>
    </div>
    <button type="submit">Save Updated Hobbies</button>
</form>
@endsection
