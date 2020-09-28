@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT SERIES</h2>
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

<form action="/admin/series/edit/{{$serie->id ? $serie->id : ''}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">

        <div class="col-6 border border-secondary">
            <div class="form-group m-5">
            <p class="display-6">SERIES TITLE</p>
            <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="seriesName" placeholder="series name" value="{{$serie->title ? $serie->title : ''}}">
            </div>

            <div class="form-group m-5">
                <select id="inputRole" class="form-control font-color-black {{ $errors->has('role_id') ? 'has-error' : '' }}" name="seriesSpeaker">
                    <option class="font-color-black" >Choose speaker</option>
                    @forelse ($speakers as $speaker)
                    <option class="font-color-black" {{$serie->speaker == $speaker->id ? 'selected' : ''}} value="{{$speaker->id}}">{{$speaker->firstname . ' ' . $speaker->surname}}</option>
                    @empty
                    <option>nothing found</option>
                    @endforelse
                </select>
            </div>
            
        </div>

        <div class="col-6 border border-secondary">
            <div class="form-check m-5">
                <p class="display-6">ADD EPISODES</p>

                @forelse ($AllEpisodes as $episode)

                <div class="row">
                    <input type="checkbox" {{(!empty($array)) && in_array($episode->id, $array)? 'checked' : ''}} class="form-check-input" name="seriesEpisodesId[]" value="{{$episode->id}}" id="seriesEpisodeCheckbox">
                    <label class="form-check-label display-6 font-color-black p-2" for="seriesEpisodeCheckbox">{{$episode->getSpeaker()->firstname . ' '. $episode->getSpeaker()->surname .' - '. $episode->title}}</label>
                </div>
                @empty
                <div class="text-center">
                    No items Found
                </div>
            
                @endforelse
            </div>

            <div class="container text-center pagination">
                {{$AllEpisodes->links()}}
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

