@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">TEST AUDIO UPLOADING</h2>


            <form class="bg-dark" action="/test" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row py-5">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control"  placeholder="speaker firstname">
                        </div><br>

                        <div class="form-group">
                            <input type="text" id="surname" name="surname" class="form-control"  placeholder="speaker surname">
                        </div><br>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown button
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </div><br>

                        <div class="form-group">
                            <input type="text" id="speaker" name="speaker" class="form-control" placeholder="speaker">
                        </div><br>   

                        <div class="form-group">
                            <input type="text" id="topic" name="topic" class="form-control" placeholder="topic">
                        </div><br> 
                    </div>


                    {{-- <div class="col-4" style="color: rgb(59, 59, 59);">
                        <input class="colo-black" type="text" name="name" id="name" placeholder="name"><br>
                        <input type="text" name="topic" id="topic"><br>
                        <input type="text" name="speaker" id="speaker"><br>
                    </div> --}}
                    <div class="col-4">
                        <input type="file" name="audio" id="audio" class="form-control-file">
                    </div>
                    <div class="col-4">
                       <button type="submit" class="btn btn-primary mb-2">upload</button> 
                    </div>
                </div>
                  
                  
              </form>

            
            
  </section>
   <!-- top topics section -->

    @endsection