@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">EPISODES</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-4 bold">#</div>
                    <div class="col col-4 bold">Speaker</div>
                    <div class="col col-4"></div>
                </div>

                {{-- <a href="#"> --}}
                     <div class="row border-top border-bottom py-2">
                        <div class="col col-4">1</div>
                        <div class="col col-4">Abubakar Mohamed - Topic name here</div>
                        <div class="col col-4">
                            <audio controls>
                                <source src="/storage/app/public/Sahara_Rains.mp3" type="audio/ogg">
                                <source src="/storage/app/public/Sahara_Rains.mp3" type="audio/mpeg">
                                Your browser does not support the audio element.
                              </audio>
                        </div>
                    </div>
                {{-- </a> --}}

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

            </div>
            
  </section>
   <!-- top topics section -->

    @endsection