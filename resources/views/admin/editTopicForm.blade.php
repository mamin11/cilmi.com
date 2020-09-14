@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

    <!-- Section heading -->
    <div class="container ">
    <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT TOPIC</h2>
    </div>

    <!-- Grid row -->
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif

    <form action="/admin/topics/edit/{{$topic ? $topic->id : ''}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group m-5">
            <input type="text" class="form-control" id="InputName" name="topicName" placeholder="topic name" value=" {{ $topic ? $topic->name : '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
    </div> 
    
    @endsection

