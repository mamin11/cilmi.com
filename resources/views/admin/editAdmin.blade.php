@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

    <!-- Section heading -->
    <div class="container ">
    <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">EDIT ADMIN</h2>
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

    <form action="/admin/edit/{{$admin ? $admin->id : ''}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group m-5">
            <input type="text" class="form-control" id="InputName" name="adminName" placeholder="user name" value=" {{ $admin ? $admin->name : '' }}">
        </div>

        <div class="form-group m-5">
            <input type="email" class="form-control" id="InputEmail1" name="adminEmail" aria-describedby="emailHelp" placeholder="Enter email" value=" {{ $admin ? $admin->email : '' }}">
        </div>

        <div class="form-group m-5">
            <input type="text" class="form-control" id="InputPassword" readOnly name="adminPassword" placeholder="Password" >
        </div>

        <div class="form-group m-5">
            <select id="inputRole" class="form-control font-color-black" name="adminRole" >
                <option class="font-color-black" selected >Choose Role</option>
                @forelse ($roles as $role)
                <option class="font-color-black" {{$admin->role_id == $role->id ? 'selected' : ''}}  value="{{ $role->id}}">{{$role->name}}</option>
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

