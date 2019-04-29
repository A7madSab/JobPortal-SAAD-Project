<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Experience;
use Auth;

class ExperienceController extends Controller
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
     * Get a validator for an incoming add or edit Experience request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string'],
            'description' => ['required'],
            'from' => ['required'],
        ]);
    }

    /**
     * Create a new controller instance.
     *
     * @return Add Experience Form.
     */
    public function ShowExperienceForm()
    {
        return view('seeker.Addexperienceform')->with('user', Auth::user());
    }

    /**
     * Create a new Experience instance.
     *
     * @param Experience Object
     * @return redirect to home
     */
    public function AddExperience(Request $request)
    {
        $this->validator($request->all())->validate();

        $experience = new Experience($request->all());
        $experience->save();

        $redirectLink = '/seeker/profile/' . Auth::user()->id;
        return redirect($redirectLink);
    }

    /**
     *
     * @param void
     * @return Edit Experience from
     */
    public function EditExperienceForm($id)
    {
        $experience = Experience::findorfail($id);
        return view('seeker.Editexperienceform')->with('exp', $experience);
    }

    /**
     * @param void
     *
     * @return Edit Experience from
     */
    public function EditExperience(Request $request)
    {
        $this->validator($request->all())->validate();

        Experience::where('id', $request->id)->update([
            'title' => request('title'),
            'subtitle' =>  request('subtitle'),
            'description' => request('description'),
            'Location' => request('Location'),
            'from' => request('from'),
            'to' => request('to'),
        ]);

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }


    /**
     * @param Experience id
     *
     * @return delete Experience from db
     */
    public function DeleteExperience($id)
    {
        Experience::where('id', $id)->delete();

        $redirectLink = '/seeker/profile/' . Auth::user()->id;
        return redirect($redirectLink);
    }
}
