<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SavedJobs;
use Auth;

class SavedJobsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ViewAllSavedJobs()
    {
        return view('seeker.savedjobs')->with('savedjobs', SavedJobs::where('user_id', Auth::user()->id)->get());
    }

    public function SaveJob($vac_id)
    {
        $arr = SavedJobs::where('user_id', Auth::user()->id)->where('vac_id', $vac_id)->get();

        if (count($arr) == 0) {
            SavedJobs::create([
                'user_id' => Auth::user()->id,
                'vac_id' => $vac_id
            ]);
        }
        return redirect('/seeker/apply');
    }
}
