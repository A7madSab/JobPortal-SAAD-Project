@extends('layouts.app')

@section('content')



<div class="container">
  <section class="justify-content-center">
    <div class="row">
      <div class="col-10">
        <h1 style="margin-left: 20px;">{{ $user->name }}</h1>
      </div>
      <div class="col-2">
        <a href="#">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="#">
          <i class="fab fa-github"></i>
        </a>
        <a href="#">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#">
          <i class="fab fa-facebook-f"></i>
        </a>
      </div>
    </div>


    <br>

    <div>
      {{ $user->address }} · {{ $user->phone }} · <a>{{ $user->email }}</a>
    </div>

    <br>

    {{-- Show and add the short bio  --}}
    <div class="row">
      <div class="col-10">
        <h4>Bio</h4>
        <p>{{ $user->short_bio }}</p>
      </div>
    </div>

    
    <br>
    
    {{-- show and add long bio --}}
    <div class="row">
      <div class="col-10">
        <h4>Interests</h4>
        <p>{{ $user->long_bio }}</p>
      </div>
    </div>

    <br>
  </section>


  <hr class="m-0">

  <section class="justify-content-center">
    <br>
    <div class="row">
      <div class="col-10">
        <h2>Experience</h2>
      </div>
    </div>  


    @foreach ($experiences as $ex)
      <br>
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-10">
              {{ $ex->title }}- <small>{{ $ex->Location }}</small>
            </div>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $ex->subtitle }}</h5>
          <p class="card-text">{{ $ex->description }}</p>
        </div>
        <div class="card-footer text-muted">
          From: {{ $ex->from }} - To: {{ $ex->to }}
        </div>
      </div>
      <br>
    @endforeach 
  </section>

  <hr class="m-0">


  <section class="justify-content-center">
    <br>
    <div class="row">
        <div class="col-10">
          <h2>Education</h2>
        </div>
      </div>  

      <div class="row">

        @foreach ($education as $edu)

          <div class="card" style="width: 20rem; margin-right: 25px; margin-bottom: 25px;">
            <h1 style="text-align: center; margin-top: 30px;">{{ $edu->grade }}</h1>
            <div class="card-body">
              <h5 class="card-title">{{ $edu->degree}} - <small>{{ $edu->place }}</small></h5>
              <hr>
              <p class="card-text">Description: {{ $edu->detail}} </p>
            </div>
          </div>

        @endforeach
        
        
        <br>

      </div>
      
  <hr class="m-0">
    </div>
  </section>
  



  <section class="justify-content-center">
    <br>
    <div class="container">

      <div class="row">
        <div class="col-10">
          <h2>Skill</h2>
        </div>
      </div>  
      <ul class="fa-ul mb-0">
        <br>
        @foreach ($skills as $skill) 
          <li style="padding-bottom: 2px;">
            <div class="row">
              <div class="col-1" style="text-align: left">
                <i class="fa-li fa fa-check"></i> {{ $skill->name }}:
              </div>
              <div class="col-4">
                  {{ $skill->description }} 
              </div>
              <div class="col-5">
              </div>
            </div>
          </li>
        @endforeach
      </ul>
  <hr class="m-0">

    </div>
  </section>




  <section class="justify-content-center">
    <br>
    <div class="container">
      <div class="row">

        <div class="col-10">
          <h2>Awards & Certifications</h2>
        </div>
      </div> 

      <ul class="fa-ul mb-0">
        @foreach ($Certification as $cer)
          <li style="padding-bottom: 5px">
            <div class="row">
              <div class="col-4">
                <i class="fa-li fa fa-trophy text-warning"></i>
                {{ $cer->name }}
              </div>
            </div>
          </li>
        @endforeach
      </ul>
      <hr class="m-0">
      <br>
    </div>


  </section>

  <br>
  <br>
  <br>

@endsection
