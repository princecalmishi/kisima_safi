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
            <div class="card card-success">
              <div class="card-header">
                <h4 class="card-title">Create New User</h4>  
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('createuserform')}}" method="post" enctype = 'multipart/form-data'>
                  @csrf
                  <br>
                  {{-- @include('inc.messages')  --}}


                <div class="card-body">
                  <div class="form-group">
                      <label for="name">User Name</label>
                      <input type="text" class="form-control" name="name" required id="name" placeholder="Enter user name">
                  </div>

                  <div class="form-group">
                    <label for="name">User Email</label>
                    <input type="email" class="form-control" name="email" required id="email" placeholder="Enter user email">
                </div>

                  <div class="form-group">
                    <label for="price">User Password</label>
                    <input type="text" class="form-control" name="pass" required id="pass" placeholder="Assign password">
                  </div>

                  <div class="form-group">
                    <label for="name">Role</label>
                    <select name="role" id="role" required class="form-control">
                      <option value="">select role</option>
                      <option value="Admin">Admin</option>
                      <option value="User">User</option>
                    </select>
                    {{-- <input type="text" class="form-control" name="desc" required id="name" placeholder="Enter service description"> --}}
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
