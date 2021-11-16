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
            <div class="card card-warning">
              <div class="card-header">
                <h4 class="card-title">Update the service details below</h4> <a href="{{route('listservices')}}" class="btn btn-primary ml-5">Go Back</a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('updateserviceform')}}" method="post" enctype = 'multipart/form-data'>
                  @csrf
                  <br>
                  <input type="hidden" value="{{$id}}" name="appid">

                  {{-- @include('inc.messages')  --}}
                @foreach ($data as $data)
                    
                <div class="card-body">
                  <div class="form-group">
                      <label for="name">Service Name</label>
                      <input type="text" class="form-control" value="{{$data->Service}}" name="name" required id="name" placeholder="Enter service name">
                  </div>

                  <div class="form-group">
                    <label for="name">Service Description</label>
                    <textarea class="form-control"  name="desc" id="desc" cols="30" rows="5" placeholder="Describe the service">{{$data->Description}}</textarea>
                    {{-- <input type="text" class="form-control" name="desc" required id="name" placeholder="Enter service description"> --}}
                </div>

                  <div class="form-group">
                    <label for="price">Service price</label>
                    <input type="number" class="form-control" value="{{$data->price}}" name="price" required id="price" placeholder="Service price">
                  </div>
                  <div class="input-group mt-3 mb-3">
                      <label for="image">Service Feature Image</label>
                      <input type="file" id="file-input" class="ml-3"  name="image" /><br>
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
                @endforeach
              </form>
              
            </div>
            <!-- /.card -->

          </div>
        


    
</div>
@endsection
