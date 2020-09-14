@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT SPEAKER</h2>
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

<form action="/admin/speakers/edit/{{$speaker ? $speaker->id : ''}}" method="POST" enctype="multipart/form-data">
@csrf

        <div class="avatar mx-auto">
            <img src="{{$speaker->url}}" class="speaker-image rounded-circle z-depth-1"
            alt="an Image of {{$speaker->firstname .' '. $speaker->surname}} " style="width: 250px; height:250px;">
        </div>
    <div class="form-group m-5">
        <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputFirstname" name="speakerFirstName" placeholder="firstname" value="{{ $speaker ? $speaker->firstname :  old('speakerFirstName') }}">
    </div>

    <div class="form-group m-5">
        <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputSurname" name="speakerSurName" placeholder="surname" value="{{ $speaker ? $speaker->surname : old('speakerSurnameName') }}">
    </div>

    <div class="form-group m-5">
        <label for="exampleFormControlFile1" class="font-color-black float-left">Select Image</label>
        <input type="file" name="images" class="font-color-black form-control-file" id="exampleFormControlFile1">
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div> 
    
    @endsection

