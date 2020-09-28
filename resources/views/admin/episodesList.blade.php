@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100 h-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">EPISODES</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-1 bold">#</div>
                    <div class="col col-2 bold">Title</div>
                    <div class="col col-1 bold">Topic</div>
                    <div class="col col-2 bold">Speaker</div>
                    <div class="col col-2 bold">created at</div>
                    <div class="col col-4"></div>
                    
                </div>

                @forelse ($episodes as $episode)

                    <div class="row border-top border-bottom py-2">
                        <div class="col col-1">&bull;</div>
                        <div class="col col-2" id="hover-orange">{{$episode->title}}</div>
                        <div class="col col-1">{{$episode->getTopic()->name}}</div>
                        <div class="col col-2">{{$episode->getSpeaker()->firstname . ' '. $episode->getSpeaker()->surname}}</div>
                        <div class="col col-2">{{date('d-m-Y', strtotime($episode->created_at))}}</div>
                        <div class="col col-4"><a href="/admin/episode/edit/{{$episode->id ? $episode->id : ''}}" class="btn btn-dark ml-2">EDIT</a> <a href="/admin/episode/delete/{{$episode->id ? $episode->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
                    </div>
                    
                @empty
                <div class="text-center">
                    No items Found
                </div>
                @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif  

                @endforelse

                <div class="container ">
                    {{$episodes->links()}}
                </div>

            </div>
            
  </section>
   <!-- top topics section -->

    @endsection