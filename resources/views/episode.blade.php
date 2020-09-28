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
                        <img src="{{$episode->getSpeaker()->url ? $episode->getSpeaker()->url : asset('images/placeholder.png')}}" class="speaker-image rounded-circle z-depth-1"
                            alt="an Image of {{$episode->getSpeaker()->firstname .' '. $episode->getSpeaker()->surname}} " style="width: 250px; height:250px;">
                        </div>
                        <a href="/speaker/episodes/{{$episode->getSpeaker()->id}}"><p class="font-weight-bold mt-4 mb-3 font-color-black">{{$episode->getSpeaker()->firstname  .' '. $episode->getSpeaker()->surname }}</p></a>
                    </div>
                    <div class="col-0 col-lg-4 col-md-4 col-sm-0"></div>
                </div>
            </div>

            <div class="container table">
                     <div class="row border-top border-bottom py-2">
                         <div class="col col-12 col-lg-3 col-md-3 text-center">{{$episode->title}}</div>
                        <div class="col col-12 col-lg-3 col-md-3 text-center">{{$episode->getSpeaker()->firstname  .' '. $episode->getSpeaker()->surname }}</div>
                        <div class="col col-12 col-lg-3 col-md-3 text-center"> - {{$episode->getTopic()->name}} - </div>
                        <div></div>

                     </div>
                     <div class="row">
                        
                        <div class="col col-md-6 col-12 text-center py-4">
                            <audio controls>
                                <source src="{{$episode->url}}" type="audio/ogg">
                                <source src="{{$episode->url}}" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                                <!-- <div class="container font-color-black">SHARE</div> -->
                        </div>

                        <div class="col col-md-6 col-12 py-5  font-color-black text-center ">
                                  <!-- AddToAny BEGIN -->
                                <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                                <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                                <a class="a2a_button_facebook"></a>
                                <a class="a2a_button_twitter"></a>
                                <a class="a2a_button_whatsapp"></a>
                                <a class="a2a_button_telegram"></a>
                                <a class="a2a_button_viber"></a>
                                <a class="a2a_button_wechat"></a>
                                <a class="a2a_button_sms"></a>
                                </div>
                                <script async src="https://static.addtoany.com/menu/page.js"></script>
                                <!-- AddToAny END -->
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
                        <div class="col col-2 bold">#</div>
                        <div class="col col-4 bold">Title</div>
                        <div class="col col-2 bold">Topic</div>
                        <div class="col col-4 bold">Speaker</div>
                    </div>
    
                    @forelse ($episode->similarEpisodes() as $episode)

                <a href="/episode/{{$episode->id}}">
                    <div class="row border-top border-bottom py-2" id="hover-orange">
                        <div class="col col-2" id="hover-orange">&bull;</div>
                        <div class="col col-4" id="hover-orange">{{$episode->title}}</div>
                        <div class="col col-2" id="hover-orange">{{$episode->getTopic()->name}}</div>
                        <div class="col col-4" id="hover-orange">{{$episode->getSpeaker()->firstname . ' '. $episode->getSpeaker()->surname}}</div>
                    </div>
                </a>

                @empty
                <div class="text-center">
                    No items Found
                </div>

                @endforelse
                
    
                </div>

            <!-- Similar episodes ends here -->
            
  </section>
   <!-- top topics section -->

    @endsection