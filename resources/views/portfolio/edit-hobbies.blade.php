@extends('portfolio.edit-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/hobbies-edit.css') }}">
@endsection

@section('form')
<form method="POST" action="{{ route('hobbies.update') }}">
    @csrf
    @method('PUT')
    <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
        <img src="{{ asset('img/back.png') }}">
        <p>Go Back</p>
    </div>
    <legend>Portfolio - Hobbies</legend>
    <textarea name="hobbies" rows="5">{{ implode(PHP_EOL, $hobbiesContent) }}</textarea>
    <button type="submit">Save Updated Hobbies</button>
</form>
@endsection
