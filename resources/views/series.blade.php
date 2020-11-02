@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100 h-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">SERIES</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-2 bold">#</div>
                    <div class="col col-4 bold">Speaker</div>
                    <div class="col col-4 bold">Title</div>
                    <div class="col col-2 bold">Episodes</div>
                </div>

                @forelse ($series as $serie)
                <a href="/series/view/{{$serie->id}}">
                     <div class="row border-top border-bottom py-2">
                        <div class="col col-2">&bull;</div>
                        <div class="col col-4">{{$serie->getSpeaker()->firstname .' '. $serie->getSpeaker()->surname}}</div>
                        <div class="col col-4 ">{{$serie->title}}</div>
                        <div class="col col-2">{{$serie->getNumberOfEpisodes()}}</div>
                    </div>
                </a>

                @empty
                <div class="text-center">
                    No items Found
                </div>
            
                @endforelse

            <div class="container text-center pagination">
                {{$series->links()}}
            </div>

            </div>
            
  </section>
   <!-- top topics section -->

    @endsection