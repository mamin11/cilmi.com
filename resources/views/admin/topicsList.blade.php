@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

        <!-- Section heading -->
        <div class="container ">
        <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">THE TOPICS</h2>
        </div>

        <!-- Grid row -->
        <div class="container table">
            <div class="row border-top border-bottom py-2">
                <div class="col col-3 bold">NAME</div>
                <div class="col col-3 bold">NUMBER OF EPISODES</div>
                <div class="col col-3"></div>
            </div>

        @forelse ($topics as $topic)
        <div class="row border-top border-bottom py-2">
       
                <div class="col col-3"> <a href="/admin/topics/episodes/{{$topic->id}}"> {{$topic->name ? $topic->name : ''}} </a></div>
                <div class="col col-3"><a href="/admin/topics/episodes/{{$topic->id}}"> {{$topic->name ? $topic->getNumberOfEpisodes() : ''}} </a></div>
                <div class="col col-3"><a href="/admin/topics/edit/{{$topic->id ? $topic->id : ''}}" class="btn btn-dark ml-2">EDIT</a> <a href="/admin/topics/delete/{{$topic->id ? $topic->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
          
            </div>
        
                    @empty
                    <div class="text-center" style="height: 65vh;">
                    <div class="container">
                        <p class="text-center font-color-black m-5"> No items Found </p>
                    </div>
                    
                </div>
        
        </div> 
        @endforelse

        <div class="container ">
            {{$topics->links()}}
        </div>

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
   
    @endsection


