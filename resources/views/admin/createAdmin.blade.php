@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

<!-- Section heading -->
<div class="container ">
 <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">CREATE ADMIN</h2>
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

<form action="/admin/create" method="POST" enctype="multipart/form-data">
@csrf
    <div class="form-group m-5">
        <input type="text" class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" id="InputName" name="adminName" placeholder="user name" value="{{ old('adminName') }}">
    </div>

    <div class="form-group m-5">
        <input type="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" id="InputEmail1" name="adminEmail" aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('adminEmail') }}" >
    </div>

    <div class="form-group m-5">
        <input type="text" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" id="InputPassword" name="adminPassword" placeholder="Password" value="{{ old('adminPassword') }}">
    </div>

    <div class="form-group m-5">
        <select id="inputRole" class="form-control font-color-black {{ $errors->has('role_id') ? 'has-error' : '' }}" name="adminRole">
            <option class="font-color-black" >Choose Role</option>
            @forelse ($roles as $role)
            <option class="font-color-black" value="{{$role->id}}">{{$role->name}}</option>
            @empty
            <option>nothing found</option>
            @endforelse
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div> 
    
    @endsection

