<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Vacancy;

class ManageApplicatoinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:provider');
    }

    public function RejectJob($app_id)
    {
        $app = Application::findorfail($app_id);

        $app->status = 'Rejected';
        $app->save();

        return redirect('JobProvider/profile');
    }

    public function AcceptJob($app_id)
    {
        $app = Application::findorfail($app_id);

        $vac = Vacancy::findorfail($app->vac_id);
        $vac->status = "Hired";
        $vac->save();

        $app->status = 'Accepted';
        $app->save();

        return redirect('JobProvider/profile');
    }
}
