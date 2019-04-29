<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobProvider;
use Auth;
use App\Vacancy;

class JobProviderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:provider');
    }

    public function Profile()
    {
        $provider = JobProvider::findorfail(Auth::user()->id);
        $vacancies = Vacancy::where([
            'provider_id' => $provider->id,
            'status' => "Hiring"
        ])->get();

        return view('provider.profile')
            ->with('Provider', $provider)
            ->with('vacancies', $vacancies);
    }

    public function ShowEditProviderFrom()
    {
        $Provider = JobProvider::findorfail(Auth::user()->id);
        return view('provider.edit')->with('Provider', $Provider);
    }

    public function EditProvider(Request $request)
    {
        $provider = JobProvider::findorfail(request('id'));
        $provider->address = request('address');
        $provider->phone = request('phone');
        $provider->bio = request('bio');
        $provider->save();

        return redirect('JobProvider/profile');
    }

    public function Hired()
    {
        $vacancies = Vacancy::where([
            'provider_id' => Auth::user()->id,
            'status' => "Hired"
        ])->get();

        return view('provider.hired')
            ->with('vacancies', $vacancies);
    }
}
