<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use App\Application;
use Auth;

class ApplicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowAvailableJobs()
    {
        $vacancies = Vacancy::where(['status' => 'Hiring'])->get();
        return view('seeker.apply')->with('vacancies', $vacancies);
    }

    public function GetApplicationForm($vac_id)
    {
        $arr = Application::where('user_id', Auth::user()->id)->where('vac_id', $vac_id)->get();
        if (count($arr) == 0) {
            return view('seeker.ApplyToJobForm')->with('vac', Vacancy::findorfail($vac_id));
        } else {
            return redirect('/seeker/apply');
        }
    }

    public function Apply($vac_id, Request $request)
    {
        // dd($vac_id, $request);
        // return $vac_id;

        $arr = Application::where('user_id', Auth::user()->id)->where('vac_id', $vac_id)->get();
        // return $arr;
        if (count($arr) == 0) {
            Application::create([
                'user_id' => Auth::user()->id,
                'vac_id' => $vac_id,
                'body' => request('body'),
            ]);
        }
        return redirect('/seeker/apply');
    }


    public function ShowMyApplications()
    {
        return view('seeker.MyApplications')
            ->with('application', Application::where('user_id', Auth::user()->id)->get());
    }


    public function DeleteApplications($app_id)
    {
        Application::findorfail($app_id)->delete();
        return redirect('/seeker/apply');
    }
}
