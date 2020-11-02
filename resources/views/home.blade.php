@extends('layouts.app')

    @section('content')
    
    {{-- <section class="hero w-100">
        <div class="hero-inner">
            <h1>MY AWESOME WEBSITE</h1>
            <p>LOOK AT THIS AMAZING WEBSITE!</p>
            <a href="#" class="btn-see-all btn btn-dark btn-outline-dark">Learn More</a>
        </div>
    </section> --}}

    <section style="height: auto">
        <div class="container">
            <div class="row">
                <div class="col col-lg-6 col-md-6 col-sm-12 col-12 d-flex flex-column justify-content-center text-center pt-5">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                            <div>
                                <h1 class="text-dark p-2 font-2.5">CILMI</h1>
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div>
                                <p class="text-dark font-1.5">Cilmi waa website eey umada soomalida uga faideysan karaan aqoon diini aha. Waxaad 
                                    ka dhageysan karta muxaadarooyin kala duwan. Waxaad sido kale ka heli suaalo iyo jawaabo diini ah.
                                </p>
                            </div>
                        </div>
                        <div class="col col-lg-12 col-md-12 col-sm-12 col-12">
                            <div>
                                <a href="/about" class="btn-see-all btn btn-dark btn-outline-dark my-3 text-center">Learn More</a>
                            </div>
                        </div>
                    </div>



                </div>
                <div class=" d-flex col col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="d-flex justify-content-end align-items-center">
                        <img src="{{asset('images/hero-1.jpg')}}" alt="" class="w-100 py-5 pl-5">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section: Team v.1 -->
<section class="team-section text-center my-5 w-100">

    <!-- Section heading -->
    <div class="container ">
     <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">THE SPEAKERS</h2>
    </div>
  
    <!-- Grid row -->
    <div class="row p-0 m-0">
  
    @forelse ($speakers as $speaker)
      <!-- Grid column -->
      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mb-lg-0 mb-5 p-0 m-0">
        <div class="avatar mx-auto">
          <img src="{{$speaker->url ? $speaker->url : asset('images/placeholder.png')}}" class="speaker-image rounded-circle z-depth-1"
            alt="An Image of {{$speaker->firstname .' ' . $speaker->surname}}">
        </div>
        <a href="/speaker/episodes/{{$speaker->id}}"><p class="font-weight-bold mt-4 mb-3">{{$speaker->firstname .' '. $speaker->surname}}</p></a>
      </div>
      <!-- Grid column -->
  
      @empty
      <div class="text-center">
      <div class="container">
        <p class="text-center font-black m-5"> No items Found </p>
      </div>
        
      </div>

      @endforelse
      
      
    </div>
    
    <a href="/speakers" class="btn-see-all btn btn-dark">See All</a>
    <!-- Grid row -->
  
  </section>
  <!-- Section: Team  -->

  <!-- top topics section -->
  <section class="w-100">
    <div class="container topics-section">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">TOP TOPICS</h2>

        <div class="row">
          @forelse ($topics as $topic)
            <div class="col col-lg-3 col-md-6 col-sm-6 col-xs-12 py-2 d-flex justify-content-center"><a href="/topic/episodes/{{$topic->id}}" class="text-decoration-none"><div class="container-topic text-center rounded py-5">{{$topic->name}}</div></a></div>
          
            @empty
            <div class="text-center">
            <div class="container">
              <p class="text-center font-black m-5"> No items Found </p>
            </div>
              
            </div>

            @endforelse
          </div>
    </div>
  </section>
   <!-- top topics section -->

     <!-- populaar episodes section -->
  {{-- <section>
    <div class="container popular-episodes-section">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">POPULAR EPISODES</h2>

        <div class="row">
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">1. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">2. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">3. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">4. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">5. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">6. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">7. Episode Title - The Topics name - 11/06/2020</a></div></div>
            <div class="col col-12"><div class="list-episodes text-center "><a href="#">8. Episode Title - The Topics name - 11/06/2020</a></div></div>
        </div>
    </div>
  </section> --}}
   <!-- popular episodes section -->
    @endsection