<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use Illuminate\Support\Facades\Validator;
use Auth;


class EducationController extends Controller
{

    /**
     * @param void
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
            'place' => ['required', 'string', 'max:255'],
            'degree' => ['required', 'string', 'max:255'],
            'detail' => ['required', 'string', 'max:255'],
            'grade' => ['required'],
        ]);
    }

    /**
     * @param void
     * @return Add Education Form
     */
    public function ShowAddEducationForm()
    {
        return view('seeker.AddEducationForm')->with('user', Auth::user());
    }

    /**
     *  Adds a new Education Instance
     * 
     * @param void
     * @return redirect to profile
     */
    public function AddEducation(Request $request)
    {
        $this->validator($request->all())->validate();

        Education::create([
            'place' => request('place'),
            'degree' => request('degree'),
            'detail' => request('detail'),
            'grade' => request('grade'),
            'user_id' => request('user_id'),
        ]);

        $redirectLink = '/seeker/profile/' . Auth::user()->id;
        return redirect($redirectLink);
    }


    /**
     * Opens Edit education form
     * 
     * @param education ID
     * @return redirect to profile 
     */
    public function EditEducationForm($id)
    {
        $edu = Education::findorfail($id);
        return view('seeker.editeducation')->with('edu', $edu);
    }

    /**
     * Edits an instance of Education
     * 
     * @param education ID
     * @return redirect to profile 
     */
    public function EditEducation(Request $request)
    {
        $this->validator($request->all())->validate();

        Education::where('id', request('id'))->update([
            'place' => request('place'),
            'degree' =>  request('degree'),
            'detail' => request('detail'),
            'grade' => request('grade'),
        ]);

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }

    /**
     * Deletes an instance of education
     * 
     * @param education ID
     * @return redirect to profile 
     */
    public function DeleteEducation($id)
    {
        Education::where('id', $id)->delete();

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }
}
