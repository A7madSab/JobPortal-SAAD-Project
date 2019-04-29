@extends('layouts\app-admin')

@section('content')


    <div class="container" style="padding-top: 40px;">
        <ul class="nav nav-tabs nav-justified">
            <li class="nav-item">
                <a class="nav-link active" href="#Company_Profile" data-toggle="tab">Company Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Company_Posts" data-toggle="tab">Company Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Seeker_Profile" data-toggle="tab">Seeker Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#Seeker_Posts" data-toggle="tab">Seeker Posts</a>
            </li>
        </ul>
    
    
        <div class="tab-content">
    
            {{-- Accept and delete Companies profile tabs  --}}
            <div class="tab-pane fade active" id="Company_Profile">
                <div class="container" style="margin: 20px;">
                    <div class="table-wrapper">

                        <div class="table-title">
                            <div class="row">
                                <h2>Manage <b>Companies</b></h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
            
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Address</th>
                                    <th>Company Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td><a href="mailto:{{ $p->email }}">{{ $p->email }}</a></td>
                                        <td>{{ $p->address }}</td>
                                        <td>{{ $p->phone }}</td>
                                        <td>
                                            <a href="admin/provider/{{ $p->id }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    
            {{-- Accept and delete Company Posts tabs--}}
            <div class="tab-pane fade" id="Company_Posts">
                <div class="container" style="margin: 20px;">
                    <div>
                        <div class="table-wrapper">
    
                            <div class="table-title">
                                <div class="row">
                                    <h2>Manage <b>Companies Posts</b></h2>
                                </div>
                            </div>
    
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Job Post</th>
                                        <th>Job Detail</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Jobposts as $jp) 
                                    <tr>
                                            <td>{{ App\JobProvider::findorfail( $jp->provider_id)->name }}</td>
                                            <td>{{ $jp->title }} <small>{{ $jp->position }}</small> </td>
                                            <td>{{ $jp->body }}</td>
                                            <td>
                                                <a href="admin/provider/post/{{ $jp->id }}">
                                                    <i class="fa fa-times" aria-hidden="true"></i>                                                
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    
            {{-- Accept and delete Seeker_Profile profile tabs  --}}
            <div class="tab-pane fade" id="Seeker_Profile">
                <div class="container" style="margin: 20px;">
                    <div class="table-wrapper">

                        <div class="table-title">
                            <div class="row">
                                <h2>Manage <b>Seekers Profile</b></h2>
                            </div>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
            
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($seekers as $seeker)
                                    <tr>
                                        <td>
                                            <a href="/seeker/profile/preview/{{ $seeker->id }}">
                                                {{ $seeker->name }}
                                            </a>
                                        </td>
                                        <td>{{ $seeker->email }}</td>
                                        <td>{{ $seeker->address }}</td>
                                        <td>{{ $seeker->phone }}</td>
                                        <td>
                                            {{-- <i class="fa fa-check" aria-hidden="true"></i> --}}
                                            <a href="admin/seeker/{{ $seeker->id }}">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="clearfix">
                            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Previous</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">Next</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
            
            {{-- Accept and delete Seeker_Profile posts tabs  --}}
            <div class="tab-pane fade" id="Seeker_Posts">
                <div class="container" style="margin: 20px;">
                    <div>
                        <div class="table-wrapper">
    
                            <div class="table-title">
                                <div class="row">
                                    <h2>Manage <b>Seeker Posts</b></h2>
                                </div>
                            </div>
    
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Seeker Name</th>
                                        <th>Post Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->auther }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                                <a href="admin/seeker/post/{{ $post->id }}">
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            {{-- <div class="clearfix">
                                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                                <ul class="pagination">
                                    <li class="page-item disabled"><a href="#">Previous</a></li>
                                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection