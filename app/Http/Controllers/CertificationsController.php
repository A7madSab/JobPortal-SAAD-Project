<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Certification;
use Illuminate\Support\Facades\Validator;
use App\User;



class CertificationsController extends Controller
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
     * Get a validator for an incoming add or edit Certification request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * @param void  
     * @return Shows Add Certifications Form
     */
    public function ShowAddCertificationsForm()
    {
        return view('seeker.AddCertificationsForm')->with('user', Auth::user());
    }

    /**
     * @param $request  
     * @return retrun home
     */
    public function AddCertifications(Request $request)
    {
        $this->validator($request->all())->validate();

        Certification::create([
            'name' => request('name'),
            'user_id' => request('user_id'),
        ]);

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }

    /**
     * @param id 
     * @return return home
     */
    public function DeleteCertifications($id)
    {
        Certification::where('id', $id)->delete();

        $redirectLink = '/seeker/profile/' .  Auth::user()->id;
        return redirect($redirectLink);
    }
}
