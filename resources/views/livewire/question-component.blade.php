<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10 col-lg-10">
            <div class="border">
                <div class="question bg-white p-3 border-bottom">
                    <div class="d-flex flex-row justify-content-between align-items-center mcq ">
                        <h4 class="font-color-black">Quiz Title</h4><span class="text-dark">(5 of 20)</span>
                    </div>
                </div>
                @foreach ($questions['questions'] as $question)
                    
                <div class="question bg-white p-3 border-bottom">
                    <div class="d-flex flex-row align-items-center question-title">
                        <h3 class="text-danger">Q.</h3>
                        <h5 class="mt-1 ml-2 text-dark">{{$question['title']}}?</h5>
                    </div>
                    @foreach ($question['answers'] as $answer)

                    <div class="ans ml-2">
                        <label class="radio"> <input type="radio" name="questionAnswers[]" value={{$answer}}> <span class="text-dark">{{$answer}}</span>
                        </label>
                    </div>
                        
                    @endforeach
                </div>
                @endforeach

                
                <div class="d-flex flex-row justify-content-between align-items-center p-3 bg-white">
                    {{-- <button class="btn btn-primary d-flex align-items-center btn-danger" type="button">&nbsp;previous</button> --}}
                    <button wire:click="showResults" class="btn btn-primary border-success align-items-center btn-success" type="submit">&nbsp;Submit</button>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- @dump($questions) --}}