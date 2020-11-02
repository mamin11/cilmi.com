@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100 h-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">{{$series->title .' - '. $series->getSpeaker()->firstname. ' '.$series->getSpeaker()->surname}}</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-2 bold">#</div>
                    <div class="col col-4 bold">Title</div>
                    <div class="col col-2 bold">Topic</div>
                    <div class="col col-4 bold">Speaker</div>
                </div>

                @forelse ($episodes as $episode)

                <a href="/episode/{{$episode->id}}"></a>
                     <div class="row border-top border-bottom py-2" >
                        <div class="col col-2">
                            <button class="btn btn-sm btn-dark" type="button" data-toggle="collapse" data-target="#collapse{{$episode->id}}" data-toggle="false" aria-expanded="false"aria-controls="collapse{{$episode->id}}">
                                <i class="far fa-play-circle"></i>
                            </button>
                        </div>
                        <div class="col col-4" >{{$episode->title}}</div>
                        <div class="col col-2">{{$episode->getTopic()->name}}</div>
                        <div class="col col-4">{{$episode->getSpeaker()->firstname . ' '. $episode->getSpeaker()->surname}}</div>
                    </div>

                    <div class="row justify-content-center">

                        <div id="collapse{{$episode->id}}" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body font-color-black">
                                <div class=" text-center py-4">
                                    <audio controls>
                                        <source src="{{$episode->url}}" type="audio/ogg">
                                        <source src="{{$episode->url}}" type="audio/mpeg">
                                        Your browser does not support the audio element.
                                    </audio>
                                </div>
                            </div>
                            </div>
                        </div>
               

                @empty
                <div class="text-center">
                    No items Found
                </div>
          
                @endforelse



            </div>
            
  </section>
   <!-- top topics section -->

    @endsection