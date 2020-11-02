@extends('layouts.app')

    @section('content')
    {{-- <link rel="stylesheet" href="css/question-styles.css"> --}}
    
    <section class="w-100 h-100">

        <h3 class="h1-responsive font-weight-bold mt-5 text-center py-5" style="color: rgb(59, 59, 59);"></h2>


            {{-- <livewire:question-component :questions="$questions">  --}}

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-dark text-center list-sytle-none">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            

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
                                    @foreach ($questions as $question)
                                        
                                    <div class="question bg-white p-3 border-bottom">
                                        <div class="d-flex flex-row align-items-center question-title">
                                            <h3 class="text-danger">Q.</h3>
                                        <input type="hidden" name="questionsId{{$question->id}}" value={{$question ? $question->id : ''}}>
                                            <h5 class="mt-1 ml-2 text-dark">{{$question ? $question->question : ''}} ?</h5>
                                        </div>
                                        @foreach ($question->getOptions() as $option)
                    
                                        <div class="ans ml-2">
                                        <label class="radio"> 
                                            <input type="radio" name="questionOption[{{$question->id}}]" value={{$option ? $option->id : ''}}> 
                                            <span class="text-dark">{{$option->option_text}}</span>
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
                {{-- @dump($questions) --}}

    </section>

    @endsection