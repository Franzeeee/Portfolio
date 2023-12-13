@extends('portfolio.edit-layout')

@section('form')
<form method="POST" action="{{ route('intro.update', $intro->id) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
        <img src="{{ asset('img/back.png') }}">
        <p>Go Back</p>
    </div>
    <legend>Portfolio - About Me</legend>
    <div class="group-control">
        <label for="image">Update Introduction</label>
        <textarea name="intro" id="" cols="30" rows="10">{{ $intro->content }}</textarea>
    </div>
    <button>Update Main Image</button>
</form>
@endsection