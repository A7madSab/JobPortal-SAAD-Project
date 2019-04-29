<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vacancy;
use Auth;
use App\Application;
use App\User;
use PharIo\Manifest\Application as PharIoApplication;
use App\Experience;
use App\Education;
use App\Skill;
use App\Certification;

class VacancyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:provider');
    }

    public function GetAddVacancyForm()
    {
        return view('provider.Vacancy.add');
    }

    public function AddVacancy(Request $request)
    {
        Vacancy::create([
            'title' => request('title'),
            'position' => request('position'),
            'body' => request('body'),
            'provider_id' => Auth::user()->id,
            'status' => "hiring",
        ]);

        return redirect('JobProvider/profile');
    }

    public function DeleteVacancy($id)
    {
        Vacancy::findorfail($id)->delete();
        return redirect('JobProvider/profile');
    }
    public function GetEditVacancyForm($id)
    {
        return view('provider.Vacancy.edit')
            ->with('vacancy', Vacancy::findorfail($id));
    }

    public function EditVacancy(Request $request)
    {
        $vac = Vacancy::findorfail(request('id'));
        $vac->title = request('title');
        $vac->position = request('position');
        $vac->body = request('body');

        $vac->save();
        return redirect('JobProvider/profile');
    }

    public function ViewAllApplication($id)
    {
        $applications = Application::where('vac_id', $id)->get();
        return view('provider.Applications.ViewApplications')->with('applications', $applications);
    }

    public function ViewApplicantProfile($id)
    {
        return view('seeker.Preview')
            ->with('user', User::findorfail($id))
            ->with('experiences', Experience::where('user_id', $id)->get())
            ->with('education', Education::where('user_id', $id)->get())
            ->with('skills', Skill::where('user_id', $id)->get())
            ->with('Certification', Certification::where('user_id', $id)->get());
    }
}
