@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT QUESTIONS</h2>
</div>

<!-- Grid row -->
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
        <p class="font-color-black">THERE WAS A PROBLEM</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="font-color-black">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin/questions/edit/{{$question->id}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">

        <div class="col-12 border border-secondary">
            <div class="form-group m-5">
            <p class="display-6">QUESTION TITLE</p>
                <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="questionName" placeholder="question" value="{{ $question ? $question->question : '' }}">
            </div>

            <div class="form-group m-5">
                @foreach ($question->getOptions() as $option)                    
                <div class="row">
                <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="option{{$loop->iteration}}"  value="{{ $option->option_text }}">
                <input type="checkbox" {{($option->state === 1) ? 'checked' : ''}} class="form-check-input" name="rightAnswer{{$loop->iteration}}"  >
                </div>
                @endforeach


            </div>
            
        </div>


    
    </div>




    <button type="submit" class="btn btn-primary m-4">Update</button>
</form>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div> 
    
    @endsection

