<?php
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|    ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` 
|           This section deals with seeker 
|    ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` ` `
*/
Auth::routes();
Route::prefix('register/seeker')->group(function () {
    Route::get('', 'Auth\RegisterController@registerSeekerform');       // gets register seeker form
    Route::post('', 'Auth\RegisterController@registerSeeker');          // register new seeker
});

// Nour
Route::get('/home', 'PostController@index')->name('home');              // return seeker homepage
Route::get('/seeker/myposts', 'PostController@ShowMyposts');
Route::post('/seeker/create', 'PostController@store');


// Ayman
Route::prefix('seeker/profile')->group(function () {
    Route::prefix('')->group(function () {
        Route::get('{id}', 'ProfileController@showProfile');
        Route::get('bio/{id}', 'ProfileController@Shortbioform');               // show form to add short bio
        Route::post('bio', 'ProfileController@addShortbio');                    // adds short bio in database and return redirect to profile
        Route::get('longbio/{id}', 'ProfileController@BioForm');                // show form to add long bio
        Route::post('longbio', 'ProfileController@addBio');                     // adds long bio intp database and return redirect to profile
        Route::get('show/{id}', 'ProfileController@ProfilePreview');            // shows a preview of a profile        
        Route::get('preview/{id}', 'AdminController@ProfilePreview');           // shows a preview of a profile
    });
    Route::prefix('experience')->group(function () {
        Route::get('add', 'ExperienceController@ShowExperienceForm');           // show the add new experience form
        Route::post('', 'ExperienceController@AddExperience');                  // adds a new experiance
        Route::get('edit/{id}', 'ExperienceController@EditExperienceForm');     // show the edit new experience form
        Route::post('edit', 'ExperienceController@EditExperience');             // show the edit new experience form
        Route::get('delete/{id}', 'ExperienceController@DeleteExperience');     // delete Experience
    });
    Route::prefix('/education')->group(function () {
        Route::get('add', 'EducationController@ShowAddEducationForm');          // show theform to add new education form
        Route::post('', 'EducationController@AddEducation');                    // adds a new experiance
        Route::get('edit/{id}', 'EducationController@EditEducationForm');       // show the edit new experience form
        Route::post('edit', 'EducationController@EditEducation');               // show the edit new experience form
        Route::get('delete/{id}', 'EducationController@DeleteEducation');       // delete Experience
    });
    Route::prefix('/skill')->group(function () {
        Route::get('add', 'SkillsController@ShowAddSkillForm');                 // Shows the Add Skills form
        Route::post('', 'SkillsController@AddSkill');                           // Adds Skills
        Route::get('{id}', 'SkillsController@DeleteSkill');                     // Delete Skill
    });
    Route::prefix('/certifications')->group(function () {
        Route::get('add', 'CertificationsController@ShowAddCertificationsForm');        // shows the add certification form
        Route::post('', 'CertificationsController@AddCertifications');                  // adds Certification
        Route::get('delete/{id}', 'CertificationsController@DeleteCertifications');     // delete Certification
    });
});



Route::prefix('register/Jobprovider')->group(function () {
    Route::get('', 'Auth\JobProviderRegisterController@registerJobProviderfrom');   // gets register jobprovider form
    Route::post('', 'Auth\JobProviderRegisterController@registerJobProvider');      // register new jobprovider
});

Route::prefix('login/Jobprovider')->group(function () {
    Route::get('', 'Auth\JobProviderLoginController@ShowLoginForm');
    Route::post('', 'Auth\JobProviderLoginController@login')->name('provider.login.submit');
});


Route::prefix('JobProvider')->group(function () {
    Route::get('profile', 'JobProviderController@Profile');
    Route::get('profile/edit', 'JobProviderController@ShowEditProviderFrom');
    Route::post('profile/edit', 'JobProviderController@EditProvider');
    Route::get('MakeJobPost', 'JobProviderController@MakeJobPost');
    Route::prefix('vacancy')->group(function () {
        Route::get('add', 'VacancyController@GetAddVacancyForm');
        Route::post('', 'VacancyController@AddVacancy');
        Route::get('delete/{id}', 'VacancyController@DeleteVacancy');
        Route::get('edit/{id}', "VacancyController@GetEditVacancyForm");
        Route::post('edit', "VacancyController@EditVacancy");
        Route::get('applications/{id}', 'VacancyController@ViewAllApplication');
        Route::get('profile/preview/{id}', 'VacancyController@ViewApplicantProfile');
    });
});

Route::get('/JobProvider/Hired', 'JobProviderController@Hired');

Route::get('/d', function () {
    return Hash::make('admin@admin.com');
});

Route::get('JobProvider/vacancy/accept/applications/{app_id}', 'ManageApplicatoinController@AcceptJob');
Route::get('JobProvider/vacancy/reject/applications/{app_id}', 'ManageApplicatoinController@RejectJob');







Route::get('seeker/apply', 'ApplicationController@ShowAvailableJobs');

Route::get('seeker/apply/{vac_id}', 'ApplicationController@GetApplicationForm');
Route::post('seeker/apply/{vac_id}', 'ApplicationController@Apply');

Route::get('seeker/savedjob', 'SavedJobsController@ViewAllSavedJobs');
Route::get('seeker/savedjob/{vac_id}', 'SavedJobsController@SaveJob');

Route::get('seeker/application', 'ApplicationController@ShowMyApplications');
Route::get('seeker/application/delete/{app_id}', 'ApplicationController@DeleteApplications');

// /seeker/application



Route::get('d', function () {
    return Hash::make('admin@admin.com');
});





Route::get('/Dashbord', 'AdminController@GetDashBoard');

Route::prefix('/admin/seeker')->group(function () {
    Route::get('{id}', 'AdminController@DeleteSeeker');
    Route::get('post/{id}', 'AdminController@DeleteSeekerPost');
});

Route::prefix('/admin/provider')->group(function () {
    Route::get('{id}', 'AdminController@DeleteProvider');
    Route::get('post/{id}', 'AdminController@DeleteProviderPost');
});








Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@Login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');


// momken 3alashan el guard ??? 
// keda fe middleware thwany ashooof

// Route::get('/provider', 'ProviderController@index');
// Route::get('/provider/login', 'Auth\ProviderLoginController@showLoginForm')->name('provider.login');
// Route::get('/test/login', 'Auth\ProviderLoginController@showLoginForm');
// Route::post('/provider/login', 'Auth\ProviderLoginController@login');
// Route::get('/provider', 'ProviderController@index')->name('provider.dashboard');
// Route::get('/home', 'HomeController@index')->name('home');
// Auth::routes();
