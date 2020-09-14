@extends('layouts.app')

@section('content')

    <section class="container h-100">
        @if ($errors->any())
            <div class="alert alert-danger">
                <p class="font-color-black"> THERE WAS A PROBLEM</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="font-color-black">{{ $error}}</li>
                        @endforeach    
                    </ul>
            </div>
        @endif

        <div class="container mt-5">

            <form action="/admin/topics/create" method="POST" enctype="multipart/form-data" class="m-5 text-center">
                @csrf
                <div class="form-group m-5">
                    <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="topicName" placeholder="topic name" value="{{ old('topicName') }}">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        
        </div>

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
        </div> 
    
    @endsection          
    
    
    </section>