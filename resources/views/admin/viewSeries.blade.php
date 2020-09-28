@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">VIEW SERIES</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-2 bold">#</div>
                    <div class="col col-2 bold">Speaker</div>
                    <div class="col col-2 bold">Title</div>
                    <div class="col col-2 bold">Episodes</div>
                    <div class="col col-2 bold"></div>
                    <div class="col col-2 bold"></div>
                </div>

                @forelse ($series as $serie)
                     <div class="row border-top border-bottom py-2">
                        <div class="col col-2">&bull;</div>
                        <div class="col col-2">{{$serie->getSpeaker()->firstname .' '. $serie->getSpeaker()->surname}}</div>
                        <div class="col col-2 ">{{$serie->title}}</div>
                        <div class="col col-2">{{$serie->getNumberOfEpisodes()}}</div>
                        <div class="col col-2"><a href="/admin/series/edit/{{$serie->id ? $serie->id : ''}}" class="btn btn-dark ml-2">EDIT</a></div>
                        <div class="col col-2"> <a href="/admin/series/delete/{{$serie->id ? $serie->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
                    </div>
                

                @empty
                <div class="text-center">
                    No items Found
                </div>
            
                @endforelse

            <div class="container text-center pagination">
                {{$series->links()}}
            </div>
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            </div>
            


  </section>
   <!-- top topics section -->

    @endsection