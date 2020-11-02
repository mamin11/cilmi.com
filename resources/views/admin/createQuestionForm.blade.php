@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">CREATE QUESTIONS</h2>
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

<form action="/admin/questions/create" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">

        <div class="col-12 border border-secondary">
            <div class="form-group m-5">
            <p class="display-6">QUESTION TITLE</p>
                <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="questionName" placeholder="question" value="{{ old('questionName') }}">
            </div>

            <div class="form-group m-5">
                <div class="row">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="option1" placeholder="option 1" value="{{ old('option1') }}">
                    <input type="hidden" class="form-check-input" name="rightAnswer1" value="0" >
                    <input type="checkbox" class="form-check-input" name="rightAnswer1" value="1" >
                </div>

                <div class="row">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="option2" placeholder="option 2" value="{{ old('option2') }}">
                    <input type="hidden" class="form-check-input" name="rightAnswer2" value="0" >
                    <input type="checkbox" class="form-check-input" name="rightAnswer2" value="1" >
                </div>

                <div class="row">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="option3" placeholder="option 3" value="{{ old('option3') }}">
                    <input type="hidden" class="form-check-input" name="rightAnswer3" value="0" >
                    <input type="checkbox" class="form-check-input" name="rightAnswer3" value="1" >
                </div>

                <div class="row">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="option4" placeholder="option 4" value="{{ old('option4') }}">
                    <input type="hidden" class="form-check-input" name="rightAnswer4" value="0" >
                    <input type="checkbox" class="form-check-input" name="rightAnswer4" value="1" >
                </div>

            </div>
            
        </div>


    
    </div>




    <button type="submit" class="btn btn-primary m-4">Submit</button>
</form>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div> 
    
    @endsection

