@extends('layouts.app')

    @section('content')

    <div class="container mt-5 ">
        <div class="d-flex justify-content-center row">
            
            @if(count($options) === 10)
                <div class="col-md-12">
                    <div class="card m-5">
                        <h4 class="text-dark text-center m-5">
                            Waxaad heshay {{$result ? $result : '0'}}/10
                        </h4>
                    </div>
                </div>
            <div class="container mt-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10 col-lg-10">
                        <div class="border">
                            <div class="question bg-white p-3 border-bottom">
                                <form action="/results" method="POST" enctype="multipart/form-data">
                                    <div class="d-flex flex-row justify-content-between align-items-center mcq ">
                                <h4 class="font-color-black">Suaalaha</h4><span class="text-dark"></span>
                            </div>
                        </div>
                        @foreach ($options as $question)
                            
                        <div class="question bg-white p-3 border-bottom">
                            <div class="d-flex flex-row align-items-center question-title">
                                <h3 class="text-danger">Q.</h3>
                            <input type="hidden" name="questions_id[{{$question->findQuestion()->id}}]">
                                <h5 class="mt-1 ml-2 text-dark">{{$question ? $question->findQuestion()->question : ''}} ?</h5>
                            </div>
                            @foreach ($question->findQuestion()->getOptions() as $option)
        
                            <div class="ans ml-2">
                            <label class="radio"> 
                                <input type="radio" name="questionOption[{{$question->id}}]" value={{$option ? $option->id : ''}}> 
                            <span class="text-dark {{ $option->isCorrect() ? ' correct-answer' : ' wrong-answer'}}" >{{$option->option_text}}</span>
                            </label>
                            </div>
                                
                            @endforeach
                        </div>
                        @endforeach
        
                        
                            @csrf
                        <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                            <button class="btn btn-primary border-success align-items-center btn-success m-2" type="submit">&nbsp;Submit</button>
                        </div>
                    </form>
        
                    </div>
                </div>
            </div>
        </div>

        @else        
        <div class="col-md-12">
                <div class="card m-5">
                    <h4 class="text-dark text-center m-5">
                        Fadlan ka soo jawaab suaal walba
                    </h4>
                </div>
        </div>
        @endif

    </div>
</div>
{{-- @dump($questions) --}}

</section>

@endsection