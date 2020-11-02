@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100 h-100">
    <div class="container topics-section">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">THE TOPICS</h2>

        <div class="row">
          @forelse ($topics as $topic)
            <div class="col col-lg-3 col-md-3 col-sm-6 col-6 py-2 d-flex justify-content-center"><a href="/topic/episodes/{{$topic->id}}" class="text-decoration-none"><div class="container-topic text-center rounded py-5">{{$topic->name}}</div></a></div>

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

   <div class="container ">
    {{$topics->links()}}
    </div>

    @endsection