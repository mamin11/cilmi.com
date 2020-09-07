@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold mt-5 text-center py-5" style="color: rgb(59, 59, 59);"></h2>

            {{-- @forelse ($episodes as $episode) --}}

            <div class="container text-center">
                <div class="row">
                    <div class="col-0 col-lg-4 col-md-4 col-sm-0"></div>
                    <div class="col-12 col-lg-4 col-md-12 col-sm-12 mb-lg-0 mb-5 p-0 m-0">
                        <div class="avatar mx-auto">
                        <img src="{{$speaker->url}}" class="speaker-image rounded-circle z-depth-1"
                            alt="an Image of {{$speaker->firstname .' '. $speaker->surname}} " style="width: 250px; height:250px;">
                        </div>
                        <a href="#"><p class="font-weight-bold mt-4 mb-3 font-color-black">{{$speaker->firstname .' '. $speaker->surname}}</p></a>
                    </div>
                    <div class="col-0 col-lg-4 col-md-4 col-sm-0"></div>
                </div>
            </div>

            <div class="container table">
                     <div class="row border-top border-bottom py-2">
                         <div class="col col-12 col-lg-3 col-md-3"></div>
                        <div class="col col-12 col-lg-3 col-md-3 text-center">{{$speaker->firstname .' '. $speaker->surname}}</div>
                        <div class="col col-12 col-lg-3 col-md-3 text-center"> - {{$episode->getTopic()->name}} - </div>
                        <div></div>

                     </div>
                     <div class="row">
                        <div class="col col-12 text-center py-4">
                            <audio controls>
                                <source src="{{$episode->url}}" type="audio/ogg">
                                <source src="{{$episode->url}}" type="audio/mpeg">
                                Your browser does not support the audio element.
                              </audio>
                        </div>
                    </div>

                    
                {{-- @empty
                <div class="text-center">
                    No items Found
                </div>
          
                @endforelse --}}

            </div>

            <!-- Similar episodes starts here -->

            <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">SIMILAR EPISODES</h2>

                <div class="container table">
                    <div class="row border-top border-bottom py-2">
                        <div class="col col-4 bold">#</div>
                        <div class="col col-4 bold">Speaker</div>
                        <div class="col col-4"></div>
                    </div>
    
                    <a href="/episode">
                         <div class="row border-top border-bottom py-2">
                            <div class="col col-4">1</div>
                            <div class="col col-4">Abubakar Mohamed</div>
                            <div class="col col-4"></div>
                        </div>
                    </a>
    
                    <a href="#">
                        <div class="row border-top border-bottom py-2">
                            <div class="col col-4">2</div>
                            <div class="col col-4">Said Ragge</div>
                            <div class="col col-4"></div>
                        </div>
                    </a>
    
                    <a href="#">                
                        <div class="row border-top border-bottom py-2">
                            <div class="col col-4">3</div>
                            <div class="col col-4">Sheikh Umal</div>
                            <div class="col col-4"></div>
                        </div>
                    </a>
                
    
                </div>

            <!-- Similar episodes ends here -->
            
  </section>
   <!-- top topics section -->

    @endsection