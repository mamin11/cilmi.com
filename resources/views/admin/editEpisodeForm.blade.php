@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT EPISODE</h2>
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

<form action="/admin/episode/edit/{{$episode ? $episode->id : ''}}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="form-group m-5">
        <select id="inputRole" class="form-control font-color-black {{ $errors->has('role_id') ? 'has-error' : '' }}" name="episodeTopic">
            <option class="font-color-black" >Choose topic</option>
            @forelse ($topics as $topic)
            <option class="font-color-black" {{$episode->topic == $topic->id ? 'selected' : ''}} value="{{$topic->id}}">{{$topic->name}}</option>
            @empty
            <option>nothing found</option>
            @endforelse
        </select>
    </div>

    <div class="form-group m-5">
        <select id="inputRole" class="form-control font-color-black {{ $errors->has('role_id') ? 'has-error' : '' }}" name="episodeSpeaker">
            <option class="font-color-black" >Choose speaker</option>
            @forelse ($speakers as $speaker)
            <option class="font-color-black" {{$episode->speaker == $speaker->id ? 'selected' : ''}} value="{{$speaker->id}}">{{$speaker->firstname . ' ' . $speaker->surname}}</option>
            @empty
            <option>nothing found</option>
            @endforelse
        </select>
    </div>
    
    <div class="form-group m-5">
        <label for="exampleFormControlFile1" class="font-color-black float-left">Select Audio file</label>
        <input type="file" name="audio" class="form-control-file font-color-black" id="exampleFormControlFile1">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div> 
    
    @endsection

