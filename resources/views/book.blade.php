@extends('layouts.mylayout')

@section('content')
<div class="container">

     <!-- Main content -->
     <section class="content  mt-5">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h4 class="card-title">Fill out the form below</h4>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{route('bookform')}}" method="post">
                    @csrf
                    <br>
                    @include('inc.messages') 


                  <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required id="name" placeholder="Enter your name">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" required id="exampleInputEmail1" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="phone" class="form-control" name="phone" id="phone" required placeholder="Phone number">
                    </div>
                    <div class="form-group">
                        <label for="phone">Service Type</label>

                        <select name="service" id="service" class="form-control" required>
                            <option value="">Select service type</option>
                            @foreach ($data as $data)
                            <option value="{{$data->Service}}">{{$data->Service}}</option>

                            @endforeach
                            
                        </select>
                      
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id="location" required placeholder="Your Location">
                      </div>
                   
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->

            </div>
          </div></div></div>


</div>
@endsection
