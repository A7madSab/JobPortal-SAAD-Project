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

class RegisterController extends Controller
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
    protected $redirectTo = '/home';

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

    /**
     * Create a new seeker user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function createSeeker(array $data)
    {
        // dd($data);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Shows the provider registration form.
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('Auth.registerAs');
    }

    /**
     * Shows the seeker registration form.
     * @return \Illuminate\Http\Response
     */
    public function registerSeekerform()
    {
        return view('seeker.registerform');
    }

    /**
     * Handles seeker registration requests for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSeeker(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->createSeeker([
            'name' => request('name'),
            'email' => request('email'),
            'phone' =>  request('phone'),
            'address' =>  request('address'),
            'password' => request('password')
        ])));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }



















    //    /**
    //     * Create a new provider user instance after a valid registration.
    //     *
    //     * @param  array  $data
    //     * @return \App\User
    //     */
    //    protected function createProvider(array $data)
    //    {
    //        return Provider::create([
    //            'name' => $data['name'],
    //            'email' => $data['email'],
    //            'password' => Hash::make($data['password']),
    //        ]);
    //    }
    //
    //    /**
    //     * Create a new seeker user instance after a valid registration.
    //     *
    //     * @param  array  $data
    //     * @return \App\User
    //     */
    //    protected function createJobProvider(array $data)
    //    {
    //        // dd($data);
    //
    //        return JobProvider::create([
    //            'name' => $data['name'],
    //            'email' => $data['email'],
    //            'password' => Hash::make($data['password']),
    //        ]);
    //    }
    //    /**
    //    * Shows the provider registration form.
    //    *
    //    * @param  \Illuminate\Http\Request  $request
    //    * @return \Illuminate\Http\Response
    //    */
    //   public function registerProviderform()
    //   {
    //       return view('provider.registerform');
    //   }
    //
    //
    //   public function registerJobProviderfrom()
    //   {
    //       return view('provider.registerform');
    //   }
    // /**
    //  * Handles seeker registration requests for the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function registerJobProvider(Request $request)
    // {
    //     $this->validator($request->all())->validate();

    //     // return $request;

    //     event(new Registered($JobProvider = $this->createJobProvider([
    //         'name' => request('name'),
    //         'email' => request('email'),
    //         'password' => request('password')
    //     ])));

    //     // dd($JobProvider);

    //     $this->guard()->login($JobProvider);

    //     return $this->registered($request, $JobProvider)
    //         ?: redirect($this->redirectPath('JobProvider'));
    // }

    // /**
    //  * Handles seeker registration requests for the application.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function registerProvider(Request $request)
    // {
    //     $this->validator($request->all())->validate();
    //     // dd($request->password);
    //     // event(new Registered($user = $this->createProvider([
    //     //     'name' => request('name'),
    //     //     'email' => request('email'),
    //     //     'password' => request('password')
    //     // ])));

    //     $provider = new Provider();
    //     $provider->name = $request->name;
    //     $provider->email = $request->email;
    //     $provider->password = Hash::make($request->password);
    //     $provider->save();



    //     $this->guard('provider')->login($provider);

    //     return $this->registered($request, $provider)
    //         ?: redirect($this->redirectPath('/main'));
    // }

    protected function registered(Request $request, $user)
    {
        //
    }
}
