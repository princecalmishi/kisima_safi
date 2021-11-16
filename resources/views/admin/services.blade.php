@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">List of all services </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                      <th>Service Name</th>
                      <th>Description</th>
                      <th>Price</th>

                      <th>Date created</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $data)

                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->Service}}</td>
                        <td>{{$data->Description}}</td>
                        <td>{{$data->price}}</td>

                        <td>{{$data->created_at}}</td>
                        <td>
                          <a href="{{route('removeservice', $data->id)}}" class="btn btn-info btn-sm">Remove</a>
                          <a href="{{route('updateservicep', $data->id)}}" class="btn btn-success btn-sm mt-2">Update</a>
                          
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
