@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">{{$series->title .' - '. $series->getSpeaker()->firstname. ' '.$series->getSpeaker()->surname}}</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-2 bold">#</div>
                    <div class="col col-4 bold">Title</div>
                    <div class="col col-2 bold">Topic</div>
                    <div class="col col-4 bold">Speaker</div>
                </div>

                @forelse ($episodes as $episode)

                <a href="/episode/{{$episode->id}}">
                     <div class="row border-top border-bottom py-2" id="hover-orange-bg">
                        <div class="col col-2">&bull;</div>
                        <div class="col col-4" >{{$episode->title}}</div>
                        <div class="col col-2">{{$episode->getTopic()->name}}</div>
                        <div class="col col-4">{{$episode->getSpeaker()->firstname . ' '. $episode->getSpeaker()->surname}}</div>
                    </div>
                </a>

                @empty
                <div class="text-center">
                    No items Found
                </div>
          
                @endforelse



            </div>
            
  </section>
   <!-- top topics section -->

    @endsection