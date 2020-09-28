@extends('layouts.app')

    @section('content')

<!-- top topics section -->
<section class="w-100 ">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">SPEAKER EPISODES - {{$speaker->firstname .' '. $speaker->surname}}</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-4 bold">#</div>
                    <div class="col col-4 bold">Topic</div>
                    <div class="col col-4 bold">Speaker</div>
                </div>

                @forelse ($episodes as $episode)

                <a href="/episode/{{$episode->id}}">
                    <div class="row border-top border-bottom py-2">
                        <div class="col col-4">&bull;</div>
                    <div class="col col-4">{{$episode->getTopic()->name}}</div>
                        <div class="col col-4">{{$speaker->firstname . ' '. $speaker->surname}}</div>
                    </div>
                </a>

                @empty
                <div class="text-center m-5 font-italic font-color-black">
                    No items Found
                </div>
            
                @endforelse

            <div class="container text-center pagination">
                {{$episodes->links()}}
            </div>

            </div>

            
</section>
<!-- top topics section -->

    @endsection