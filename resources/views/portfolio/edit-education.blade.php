@extends('portfolio.edit-layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/hobbies-edit.css') }}">
@endsection

@section('form')
<form method="POST" action="{{ route('education.update') }}">
    @csrf
    @method('PUT')

    <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
        <img src="{{ asset('img/back.png') }}">
        <p>Go Back</p>
    </div>

    <legend>Portfolio - Education</legend>
    
    <div class="group-control">
        <label for="college">College</label>
        <input type="text" placeholder="College Year" name="college_year" value="{{ $college->year }}" autocomplete="off" required>
        <input type="text" placeholder="School" name="college_content" value="{{ $college->content }}" autocomplete="off" required>
    </div>
    
    <div class="group-control">
        <label for="senior">Senior High</label>
        <input type="text" placeholder="Senior High Year" name="senior_high_year" value="{{ $senior_high->year }}" autocomplete="off" required>
        <input type="text" placeholder="School" name="senior_high_content" value="{{ $senior_high->content }}" autocomplete="off" required>
    </div>
    
    <div class="group-control">
        <label for="junior">Junior High</label>
        <input type="text" placeholder="Junior High Year" name="junior_high_year" value="{{ $junior_high->year }}" autocomplete="off" required>
        <input type="text" placeholder="School" name="junior_high_content" value="{{ $junior_high->content }}" autocomplete="off" required>
    </div>
    
    <div class="group-control">
        <label for="elementary">Elementary</label>
        <input type="text" placeholder="Elementary Year" name="elementary_year" value="{{ $elementary->year }}" autocomplete="off" required>
        <input type="text" placeholder="School" name="elementary_content" value="{{ $elementary->content }}" autocomplete="off" required>
    </div>
    
    <button type="submit">Save Updated Hobbies</button>
</form>
@endsection
