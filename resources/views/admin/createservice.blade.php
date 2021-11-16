@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

     <!-- Main content -->
     <section class="content  mt-3">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h4 class="card-title">Enter service details in the form below</h4> <a href="{{route('listservices')}}" class="btn btn-success ml-5">See available services</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('createserviceform')}}" method="post" enctype = 'multipart/form-data'>
                  @csrf
                  <br>
                  {{-- @include('inc.messages')  --}}


                <div class="card-body">
                  <div class="form-group">
                      <label for="name">Service Name</label>
                      <input type="text" class="form-control" name="name" required id="name" placeholder="Enter service name">
                  </div>

                  <div class="form-group">
                    <label for="name">Service Description</label>
                    <textarea class="form-control" name="desc" id="desc" cols="30" rows="5" placeholder="Describe the service"></textarea>
                    {{-- <input type="text" class="form-control" name="desc" required id="name" placeholder="Enter service description"> --}}
                </div>

                  <div class="form-group">
                    <label for="price">Service price</label>
                    <input type="number" class="form-control" name="price" required id="price" placeholder="Service price">
                  </div>
                  <div class="input-group mt-3 mb-3">
                      <label for="image">Service Feature Image</label>
                      <input type="file" id="file-input" class="ml-3"  name="image" required/><br>
                    </div>                   

                  
                  {{-- <div class="form-group">
                      <label for="location">Location</label>
                      <input type="text" class="form-control" name="location" id="location" required placeholder="Your Location">
                    </div> --}}
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        


    
</div>
@endsection
