<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Experience;
use App\Education;
use App\Skill;
use App\Certification;
use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Shows a User's profile.
     *
     * @param user id to view
     * @return user profile
     */
    public function showProfile($id)
    {
        $user = User::findorfail($id);
        $experiences = Experience::where('user_id', $id)->get();
        $education = Education::where('user_id', $id)->get();
        $skills = Skill::where('user_id', $id)->get();
        $Certification = Certification::where('user_id', $id)->get();

        return view('seeker.profile')
            ->with('user', $user)
            ->with('experiences', $experiences)
            ->with('education', $education)
            ->with('skills', $skills)
            ->with('Certification', $Certification);
    }

    /**
     * Shows a form to edit a User's Bio.
     *
     * @return user profile
     */
    public function Shortbioform()
    {
        return view('seeker.addshortbio')->with('user', Auth::user());
    }

    /**
     * Adds a Short Bio in database
     *
     * @param request -> short_bio
     * @return user profile
     */
    public function addShortbio()
    {
        $user = User::findorfail(request('id'));

        $user->short_bio = request('short_bio');
        $user->save();

        $redirectLink = '/seeker/profile/' .  $user->id;
        return redirect($redirectLink);
    }

    /**
     * Shows a form to edit a User's Bio.
     *
     * @return user profile
     */
    public function BioForm()
    {
        return view('seeker.addBio')->with('user', Auth::user());
    }


    /**
     * Adds a Short Bio in database
     *
     * @return user profile
     */
    public function addBio()
    {
        $user = User::findorfail(request('id'));

        $user->long_bio = request('long_bio');
        $user->save();

        $redirectLink = '/seeker/profile/' . Auth::user()->id;
        return redirect($redirectLink);
    }

    /**
     * Shows a preview of the any profile
     * @param Seeker id
     */
    public function ProfilePreview($id)
    {
        return view('seeker.Preview')
            ->with('user', User::findorfail($id))
            ->with('experiences', Experience::where('user_id', $id)->get())
            ->with('education', Education::where('user_id', $id)->get())
            ->with('skills', Skill::where('user_id', $id)->get())
            ->with('Certification', Certification::where('user_id', $id)->get());
    }
}
