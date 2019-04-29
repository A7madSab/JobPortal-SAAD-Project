<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Skill;
use Auth;

class SkillsController extends Controller
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
     * Get a validator for an incoming add skill request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);
    }

    /**
     * @param  void
     * @return Add Skill Form view 
     */
    public function ShowAddSkillForm()
    {
        return view('seeker.AddSkillForm');
    }

    /**
     * Create a new skill instance.
     *
     * @param  void
     * @return Add Skill Form view 
     */
    public function AddSkill(Request $request)
    {
        $this->validator($request->all())->validate();

        Skill::create([
            'name' => request('name'),
            'description' => request('description'),
            'user_id' => Auth::user()->id,
        ]);

        $redirectLink = '/seeker/profile/' . Auth::user()->id;
        return redirect($redirectLink);
    }

    /**
     * @param Skill id
     *
     * @return delete skill from db
     */
    public function DeleteSkill($id)
    {
        Skill::where('id', $id)->delete();

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }
}
