@extends('layouts.app')

    @section('content')

    <section class="w-100 h-100">
    <div class="container topics-section">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);"><i class="fas fa-home fa-2x pr-3"></i>MANAGE TOPICS</h2>

        <div class="row">
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="/admin/topics/view" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-eye fa-2x pr-3"></i>Vew Topics</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="/admin/topics/create" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-plus-square fa-2x pr-3"></i>Create Topic</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="/admin/topics/view" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-tools fa-2x pr-3"></i>Edit Topic</div></a></div>
            <div class="col col-lg-6 col-md-6 col-sm-12 col-12 py-2 d-flex justify-content-center"><a href="/admin/topics/view" class="text-decoration-none"><div class="container-topic text-center rounded py-5"><i class="fas fa-trash fa-2x pr-3"></i>Delete Topic</div></a></div>
</section>


   
    @endsection


