<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\User;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = User::first();
        $intro = Text::first();
        $personalInfo = Text::skip(1)->take(6)->get();
        $hobbiesRows = Text::where('title', 'Hobbies')->get();
        $likes = Text::where('title', 'Likes')->first();
        $dislikes = Text::where('title', 'Dislikes')->first();
        $college = Text::where('title', 'College')->first();
        $senior_high = Text::where('title', 'Senior High Scool')->first();
        $junior_high = Text::where('title', 'Junior High School')->first();
        $elementary = Text::where('title', 'Elementary')->first();
        $skills = Skill::all();

        $PersonalInfo = [];


        // Extract content values into an array
        $hobbiesContent = $hobbiesRows->pluck('content')->toArray();

        foreach ($personalInfo as $index => $introRow) {
            $variableName = Str::of($introRow->title)->snake()->__toString();
            $PersonalInfo[$variableName] = $introRow->content;
        }

        return view('home', [
            'user' => $user,
            'intro' => $intro,
            'personalInfo' => $PersonalInfo,
            'hobbies' => $hobbiesContent,
            'likes' => $likes,
            'dislikes' => $dislikes,
            'college' => $college,
            'senior_high' => $senior_high,
            'junior_high' => $junior_high,
            'elementary' => $elementary,
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('portfolio.edit', ['portfolio' => 1]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $filename = '';

        if ($request->hasFile('profile_picture')) {
            $filename = $request->getSchemeAndHttpHost() . '/img/' . time() . '.' . $request->profile_picture->extension();

            $request->profile_picture->move(public_path('/img/'), $filename);
        }

        $user = User::first();
        $user->profile_picture = $filename;
        $user->save();
        return redirect()
            ->route('home')
            ->with('success', "Profile Picture Updated Successfully!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    //Handle the rest of the update actions

    public function editDescription($intro)
    {
        $intro = Text::find($intro);
        return view('portfolio.edit-intro', compact('intro'));
    }
    public function updateDescription(Request $request)
    {
        $request->validate([
            'intro' => 'required|string',
        ]);

        $intro = Text::findOrFail(1);
        $intro->content = $request->input('intro');
        $intro->save();

        return redirect()->route('home')->with('success', 'Description updated successfully');
    }


    public function editPersonalInfo()
    {
        $personalInfo = Text::skip(1)->take(6)->get();

        $PersonalInfo = [];

        foreach ($personalInfo as $index => $introRow) {
            $variableName = Str::of($introRow->title)->snake()->__toString();
            $PersonalInfo[$variableName] = $introRow->content;
        }

        return view('portfolio.edit-peronal_info', ['personalInfo' => $PersonalInfo]);
    }

    public function updatePersonalInfo(Request $request)
    {
        $personalInfo = Text::skip(1)->take(6)->get();

        foreach ($personalInfo as $introRow) {
            $inputName = Str::of($introRow->title)->snake();
            $content = $request->input($inputName);
            // Update the content column based on the title
            $introRow->update(['content' => $content]);
        }

        return redirect()->route('home')->with('success', 'Personal Info updated successfully');
    }


    public function editHobbies()
    {

        $hobbiesRows = Text::where('title', 'Hobbies')->get();
        $hobbiesContent = $hobbiesRows->pluck('content')->toArray();

        return view('portfolio.edit-hobbies', ['hobbiesContent' => $hobbiesContent]);
    }


    public function updateHobbies(Request $request)
    {
        // Validate the request, if needed
        $request->validate([
            'hobbies' => 'required|string',
        ]);

        // Get the existing hobbies from the database
        $existingHobbies = Text::where('title', 'Hobbies')->pluck('content')->toArray();

        // Get the hobbies from the textarea and explode them into an array
        $newHobbies = explode(PHP_EOL, $request->input('hobbies'));

        // Remove any empty entries
        $newHobbies = array_filter($newHobbies, 'strlen');

        // Find deleted hobbies
        $deletedHobbies = array_diff($existingHobbies, $newHobbies);

        // Find added hobbies
        $addedHobbies = array_diff($newHobbies, $existingHobbies);

        // Update the database with the added hobbies
        foreach ($addedHobbies as $hobby) {
            Text::create(['title' => 'Hobbies', 'content' => $hobby]);
        }

        // Remove deleted hobbies from the database
        Text::where('title', 'Hobbies')->whereIn('content', $deletedHobbies)->delete();

        return redirect()->route('home')->with('success', 'Hobbies updated successfully');
    }



    // --> Controllers For LIKES AND DISLIKES CONTENT <-- \\
    public function editLikesAndDislikes()
    {

        $likes = Text::where('title', 'Likes')->first();
        $dislikes = Text::where('title', 'Dislikes')->first();

        return view('portfolio.edit-likes_dislikes', [
            'likes' => $likes,
            'dislikes' => $dislikes
        ]);
    }

    public function udpateLikesAndDislikes(Request $request)
    {
        // Validate the inputs
        $request->validate([
            'likes' => 'required|string',
            'dislikes' => 'required|string',
        ]);
        // Update Likes
        $likes = Text::updateOrCreate(
            ['title' => 'Likes'],
            ['content' => $request->input('likes')]
        );

        // Update Dislikes
        $dislikes = Text::updateOrCreate(
            ['title' => 'Dislikes'],
            ['content' => $request->input('dislikes')]
        );

        return redirect()->route('home')->with('success', 'Likes and Dislikes updated successfully');
    }

    // --> Controllers For EDUCATION CONTENT <-- \\

    public function editEducation()
    {
        $college = Text::where('title', 'College')->first();
        $senior_high = Text::where('title', 'Senior High Scool')->first();
        $junior_high = Text::where('title', 'Junior High School')->first();
        $elementary = Text::where('title', 'Elementary')->first();

        return view('portfolio.edit-education', compact('college', 'senior_high', 'junior_high', 'elementary'));
    }

    public function updateEducation(Request $request)
    {
        $college = Text::where('title', 'College')->first();
        $senior_high = Text::where('title', 'Senior High Scool')->first();
        $junior_high = Text::where('title', 'Junior High School')->first();
        $elementary = Text::where('title', 'Elementary')->first();


        // Validate the request
        $request->validate([
            'college_year' => 'required|string',
            'college_content' => 'required|string',
            'senior_high_year' => 'required|string',
            'senior_high_content' => 'required|string',
            'junior_high_year' => 'required|string',
            'junior_high_content' => 'required|string',
            'elementary_year' => 'required|string',
            'elementary_content' => 'required|string',
        ]);

        // Update College
        $college->update([
            'year' => $request->input('college_year'),
            'content' => $request->input('college_content'),
        ]);

        // Update Senior High
        $senior_high->update([
            'year' => $request->input('senior_high_year'),
            'content' => $request->input('senior_high_content'),
        ]);

        // Update Junior High
        $junior_high->update([
            'year' => $request->input('junior_high_year'),
            'content' => $request->input('junior_high_content'),
        ]);

        // Update Elementary
        $elementary->update([
            'year' => $request->input('elementary_year'),
            'content' => $request->input('elementary_content'),
        ]);

        return redirect()->route('home')->with('success', 'Education information updated successfully');
    }



    // --> Controllers For SKILLS CONTENT <-- \\

    public function editSkill()
    {
        return view('portfolio.edit-skill');
    }

    public function storeSkill(Request $request)
    {
        $filename = '';

        if ($request->hasFile('skill_image')) {
            $filename = $request->getSchemeAndHttpHost() . '/img/' . time() . '.' . $request->skill_image->extension();

            $request->skill_image->move(public_path('/img/'), $filename);
        }

        Skill::create([
            'image' => $filename,
            'skill' => $request->skill_name
        ]);

        return redirect()
            ->route('home')
            ->with('success', "Skill Added Successfully!");
    }

    public function deleteSkill($id)
    {

        $skill = Skill::find($id);
        $skill->delete();

        return redirect()
            ->route('home')
            ->with('success', "Deleted Successfully!");
    }
}
