@extends('layouts.app')

    @section('content')
    <!-- Section: Team -->
    <section class="team-section text-center my-5 w-100 h-100">

        <!-- Section heading -->
        <div class="container ">
        <h3 class="h1-responsive font-weight-bold my-5 border-bottom team-sec-title font-2 py-3">THE ADMINS</h2>
        </div>

        <!-- Grid row -->
        <div class="container table">
            <div class="row border-top border-bottom py-2">
                <div class="col col-3 bold">NAME</div>
                <div class="col col-3 bold">EMAIL</div>
                <div class="col col-3 bold">ROLE</div>
                <div class="col col-3 bold"></div>
            </div>

        @forelse ($admins as $admin)
        <div class="row border-top border-bottom py-2">
                <div class="col col-3">{{$admin->name ? $admin->name : ''}}</div>
                <div class="col col-3">{{$admin->email ? $admin->email : ''}}</div>
                <div class="col col-3">{{$admin->role_id ? $admin->getRole()->name : ''}}</div>
                <div class="col col-3"><a href="/admin/edit/{{$admin->id ? $admin->id : ''}}" class="btn btn-dark ml-2">EDIT</a> <a href="/admin/delete/{{$admin->id ? $admin->id : ''}}" class="btn btn-danger ml-2">DELETE</a></div>
            </div>
        
                    @empty
                    <div class="text-center" style="height: 65vh;">
                    <div class="container">
                        <p class="text-center font-black m-5"> No items Found </p>
                    </div>
                    
                </div>
        
        </div> 
        @endforelse

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
   
    @endsection


