@extends('layouts.app')

    @section('content')

    <section class="w-100 h-100">
    <div class="container topics-section">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);"><i class="fas fa-home fa-2x pr-3"></i>ADMIN AREA</h2>

        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="/admin/users" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-user fa-2x pr-3"></i>Manage Admins</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="#" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-microphone fa-2x pr-3"></i>Manage Speakers</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="#" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-volume-up fa-2x pr-3"></i>Manage Episodes</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="#" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-align-left fa-2x pr-3"></i>Manage Series</div></a></div>
</section>


   
    @endsection


