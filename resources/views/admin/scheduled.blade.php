@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">scheduled client bookings </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                      <th>Client Name</th>
                      <th>Service</th>
                      <th>Phone</th>
                      <th>Location</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)

                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->Name}}</td>
                        <td>{{$data->Service}}</td>
                        <td>{{$data->Phone}}</td>
                        <td>{{$data->Location}}</td>
                        <td>{{$data->Status}}</td>     
                        <td>
                          {{-- <a href="" class="btn btn-success btn-sm">Mark Complete</a> --}}
                          <a href="{{route('completenow', $data->id)}}" class="btn btn-success btn-sm">Mark complete</a>
                          
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
