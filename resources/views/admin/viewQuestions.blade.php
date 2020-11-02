@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">VIEW QUESTIONS</h2>

            <div class="container table">
                <div class="row border-top border-bottom py-2">
                    <div class="col col-2 bold">#</div>
                    <div class="col col-4 bold">Questions</div>
                    <div class="col col-2 bold">Right answer</div>
                    <div class="col col-2 "></div>
                    <div class="col col-2 "></div>
                </div>

                @forelse ($questions as $question)
                    <div class="row border-top border-bottom py-2">
                        <div class="col col-2">&bull;</div>
                        <div class="col col-4">{{ $question->question }}</div>
                        <div class="col col-2 ">

                            @if(count($question->getRightAnswer()) > 1 ) 
                                @foreach( $question->getRightAnswer() as $option )
                                    {{$option->option_text .','}}
                                @endforeach
                                
                            @else  
                                @foreach( $question->getRightAnswer() as $option )
                                {{$option->option_text}}
                            @endforeach                              
                                {{-- {{$question->getRightAnswer()->option_text}} --}}
                            
                            @endif
                        
                        
                    </div>
                        <div class="col col-2"><a href="/admin/questions/edit/{{$question->id ? $question->id : ''}}" class="btn btn-dark ml-2">EDIT</a></div>
                        <div class="col col-2"><a href="/admin/questions/delete/{{$question->id ? $question->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
                    </div>
                

                @empty
                <div class="text-center">
                    No items Found
                </div>
            
                @endforelse

            <div class="container text-center pagination">
                {{$questions->links()}}
            </div>
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            </div>
            


  </section>
   <!-- top topics section -->

    @endsection