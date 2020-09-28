@extends('layouts.app')

    @section('content')
    
    <!-- Section: Team -->
<section class="team-section text-center my-5">

    <!-- Section heading -->
    <div class="container ">
     <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">THE SPEAKERS</h2>
    </div>
  
    <!-- Grid row -->
    <div class="row p-0 m-0">
  
      @forelse ($speakers as $speaker)
          
   
      <!-- Grid column -->
      <div class="col-lg-3 col-md-3 col-sm-6 col-6 mb-lg-0 mb-5 p-0 my-3">
        <div class="avatar mx-auto">
          <img src="{{$speaker->url ? $speaker->url : asset('images/placeholder.png')}}" class="speaker-image rounded-circle z-depth-1"
            alt="An image of {{$speaker->firstname}}"> 
        </div>
        <a href="/speaker/episodes/{{$speaker->id}}"><p class="font-weight-bold mt-4 mb-3">{{$speaker->firstname}} {{$speaker->surname}}</p></a>
      </div>
      <!-- Grid column -->

      

      @empty
      <div class="text-center">
      <div class="container">
        <p class="text-center font-black m-5"> No items Found </p>
      </div>
         
      </div>
      <!-- <a href="#" class="btn-see-all btn btn-dark">See All</a> -->
       <!-- this does not show if the result is empty -->

      @endforelse
 
    </div>

    <div class="container ">
    {{$speakers->links()}}
    </div>

    <!--ADD PAGINATION HERE -->
    <!-- <a href="#" class="btn-see-all btn btn-dark">See All</a> -->

    @endsection