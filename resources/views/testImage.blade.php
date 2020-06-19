@extends('layouts.app')

    @section('content')

  <!-- top topics section -->
  <section class="w-100">

        <h3 class="h1-responsive font-weight-bold my-5 text-center py-5" style="color: rgb(59, 59, 59);">TEST IMAGE UPLOADING</h2>


            <form class="bg-dark" action="/testImage" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row py-5">
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" id="firstname" name="firstname" class="form-control"  placeholder="firstname">
                        </div><br>
                        <div class="form-group">
                            <input type="text" id="surname" name="surname" class="form-control" placeholder="surname">
                        </div><br>                        
                    </div>

                    <div class="col-4">
                        <label for="images">Profile Picture</label><br>
                        <input type="file" name="images" id="images" class="form-control-file">
                    </div>
                    <div class="col-4">
                       <button type="submit" class="btn btn-primary mb-2">upload</button> 
                    </div>
                </div>
                  
                  
              </form>

        
            
  </section>
   <!-- top topics section -->

    @endsection