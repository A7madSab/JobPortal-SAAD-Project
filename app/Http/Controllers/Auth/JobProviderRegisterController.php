<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Provider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\JobProvider;
use SebastianBergmann\Environment\Console;
use function Psy\debug;

class JobProviderRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/JobProvider';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // /**
    //  * Create a new seeker user instance after a valid registration.
    //  *
    //  * @param  array  $data
    //  * @return \App\User
    //  */
    // protected function createJobProvider(array $data)
    // {
    //     // dd($data);

    //     return
    // }


    public function registerJobProviderfrom()
    {
        return view('provider.registerform');
    }

    /**
     * Handles seeker registration requests for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerJobProvider(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($JobProvider = JobProvider::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ])));


        $this->guard()->login($JobProvider);

        return $this->registered($request, $JobProvider)
            ?: redirect($this->redirectPath('JobProvider'));
    }

    protected function registered(Request $request, $user)
    {
        //
    }
}
