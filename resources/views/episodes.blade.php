@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">EPISODES</h2>

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
                     <div class="col col-4">{{$episode->topic}}</div>
                        <div class="col col-4">{{$episode->firstname . ' '. $episode->surname}}</div>
                    </div>
                </a>

                @empty
                <div class="text-center">
                    No items Found
                </div>
          
                @endforelse

                {{-- <a href="#">
                    <div class="row border-top border-bottom py-2">
                        <div class="col col-4">2</div>
                        <div class="col col-4">Said Ragge</div>
                        <div class="col col-4"></div>
                    </div>
                </a>

                <a href="#">                
                    <div class="row border-top border-bottom py-2">
                        <div class="col col-4">3</div>
                        <div class="col col-4">Sheikh Umal</div>
                        <div class="col col-4"></div>
                    </div>
                </a>
                
                <a href="#">
                    <div class="row border-top border-bottom py-2">
                       <div class="col col-4">1</div>
                       <div class="col col-4">Abubakar Mohamed</div>
                       <div class="col col-4"></div>
                   </div>
               </a>

               <a href="#">
                   <div class="row border-top border-bottom py-2">
                       <div class="col col-4">2</div>
                       <div class="col col-4">Said Ragge</div>
                       <div class="col col-4"></div>
                   </div>
               </a>

               <a href="#">                
                   <div class="row border-top border-bottom py-2">
                       <div class="col col-4">3</div>
                       <div class="col col-4">Sheikh Umal</div>
                       <div class="col col-4"></div>
                   </div>
               </a>

               <a href="#">
                <div class="row border-top border-bottom py-2">
                   <div class="col col-4">1</div>
                   <div class="col col-4">Abubakar Mohamed</div>
                   <div class="col col-4"></div>
               </div>
           </a>

           <a href="#">
               <div class="row border-top border-bottom py-2">
                   <div class="col col-4">2</div>
                   <div class="col col-4">Said Ragge</div>
                   <div class="col col-4"></div>
               </div>
           </a>

           <a href="#">                
               <div class="row border-top border-bottom py-2">
                   <div class="col col-4">3</div>
                   <div class="col col-4">Sheikh Umal</div>
                   <div class="col col-4"></div>
               </div>
           </a>

           <a href="#">
            <div class="row border-top border-bottom py-2">
               <div class="col col-4">1</div>
               <div class="col col-4">Abubakar Mohamed</div>
               <div class="col col-4"></div>
           </div>
       </a>

       <a href="#">
           <div class="row border-top border-bottom py-2">
               <div class="col col-4">2</div>
               <div class="col col-4">Said Ragge</div>
               <div class="col col-4"></div>
           </div>
       </a>

       <a href="#">                
           <div class="row border-top border-bottom py-2">
               <div class="col col-4">3</div>
               <div class="col col-4">Sheikh Umal</div>
               <div class="col col-4"></div>
           </div>
       </a> --}}

            </div>
            
  </section>
   <!-- top topics section -->

    @endsection