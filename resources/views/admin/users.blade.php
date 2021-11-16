@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title mt-2">List of all users </h3>  <a href="{{route('createuser')}}" class="btn btn-primary ml-5">Add new User</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Role</th>

                      <th>Date Joined</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)

                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->role}}</td>

                        <td>{{$data->created_at}}</td>
                        <td>
                          <a href="{{route('removeuser', $data->id)}}" class="btn btn-info btn-sm">Remove</a>
                          <a href="{{route('updateuser', $data->id)}}" class="btn btn-success btn-sm">Update</a>
                          
                        </td>                  
                     
                    </tr>

                    @endforeach
                    </tbody>
                 
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  

              <script>
                $(function () {
                  $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                  $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                  });
                });
              </script>
    
</div>
@endsection
