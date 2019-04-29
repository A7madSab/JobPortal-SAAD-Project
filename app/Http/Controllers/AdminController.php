<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Experience;
use App\Education;
use App\Skill;
use App\Certification;
use App\JobProvider;
use App\Vacancy;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }

    public function GetDashBoard()
    {
        $seekers = User::all();
        $posts = Post::all();
        // return $posts;
        return view('admin.Dashboard')
            ->with('providers', JobProvider::all())
            ->with('Jobposts', Vacancy::all())
            ->with('seekers', $seekers)
            ->with('posts', $posts);
    }

    /**
     * @param Seeker id
     * delete seeker account 
     */
    public function DeleteSeeker($id)
    {
        User::findorfail($id)->delete();

        return redirect('/Dashbord');
    }

    /**
     * Shows a preview of the any profile
     * @param Seeker id
     */
    public function ProfilePreview($id)
    {
        return view('seeker.Preview')
            ->with('user', User::findorfail($id))
            ->with('experiences', Experience::where('user_id', $id)->get())
            ->with('education', Education::where('user_id', $id)->get())
            ->with('skills', Skill::where('user_id', $id)->get())
            ->with('Certification', Certification::where('user_id', $id)->get());
    }

    /**
     * Delete User Post
     * @param Post id
     */
    public function DeleteSeekerPost($id)
    {
        Post::findorfail($id)->delete();
        return redirect('/Dashbord');
    }

    public function DeleteProvider($id)
    {
        JobProvider::findorfail($id)->delete();
        return redirect('/Dashbord');
    }

    public function DeleteProviderPost($id)
    {
        Vacancy::findorfail($id)->delete();
        return redirect('/Dashbord');
    }
}
