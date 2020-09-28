@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center">

        <!-- Section heading -->
        <div class="container ">
        <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">THE SPEAKERS</h2>
        </div>

        <!-- Grid row -->
        <div class="container table">
            <div class="row border-top border-bottom py-2">
                <div class="col col-2 bold">FIRSTNAME</div>
                <div class="col col-2 bold">SURNAME</div>
                <div class="col col-2 bold">NUMBER OF EPISODES</div>
                <div class="col col-2 bold">CREATED AT</div>
                <div class="col col-4 bold"></div>
            </div>

        @forelse ($speakers as $speaker)
        <div class="row border-top border-bottom py-2">
                <div class="col col-2">{{$speaker->firstname ? $speaker->firstname : ''}}</div>
                <div class="col col-2">{{$speaker->surname ? $speaker->surname : ''}}</div>
                <div class="col col-2">{{$speaker->id ? $speaker->getNumberOfEpisodes() : ''}}</div>
                <div class="col col-2">{{date('d-m-Y', strtotime($speaker->created_at))}}</div>
                <div class="col col-4"><a href="/admin/speakers/edit/{{$speaker->id ? $speaker->id : ''}}" class="btn btn-dark ml-2">EDIT</a> <a href="/admin/speakers/delete/{{$speaker->id ? $speaker->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
            </div>
        
                    @empty
                    <div class="text-center" style="height: 65vh;">
                    <div class="container">
                        <p class="text-center font-black m-5"> No items Found </p>
                    </div>
                    
                </div>
        
        </div> 
        @endforelse

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif

        <div class="container ">
            {{$speakers->links()}}
        </div>
   
    @endsection


