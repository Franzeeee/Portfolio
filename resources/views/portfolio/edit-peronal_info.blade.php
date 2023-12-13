@extends('portfolio.edit-layout')

@section('form')
<form method="POST" action="{{ route('personal_info.update') }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="back" onclick="window.location.href='{{ route('home') }}'" title="Back to Home">
        <img src="{{ asset('img/back.png') }}">
        <p>Go Back</p>
    </div>
    <legend>Portfolio - Personal Information</legend>
    <div class="group-control">
        <label for="name">Complete Name</label>
        <input type="text" autocomplete="off" name="name" value="{{ $personalInfo['name'] }}">
    </div>
    <div class="group-control">
        <label for="date_and_place">Birth Date and Place</label>
        <input type="text" autocomplete="off" name="date_and_place" value="{{ $personalInfo['date_and_place'] }}">
    </div>
    <div class="group-control">
        <label for="gender">Gender</label>
        <input type="text" autocomplete="off" name="gender" value="{{ $personalInfo['gender'] }}">
    </div>
    <div class="group-control">
        <label for="nationality">Nationality</label>
        <input type="text" autocomplete="off" name="nationality" value="{{ $personalInfo['nationality'] }}">
    </div>
    <div class="group-control">
        <label for="ethnicity">Ethnicity</label>
        <input type="text" autocomplete="off" name="ethnicity" value="{{ $personalInfo['ethnicity'] }}">
    </div>
    <div class="group-control">
        <label for="marital_status">Marital Status</label>
        <input type="text" autocomplete="off" name="marital_status" value="{{ $personalInfo['marital_status'] }}">
    </div>
    <button type="submit">Update Personal Info</button>
</form>

@endsection