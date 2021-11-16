@extends('layouts.admin')

@section('content')
<div class="content-wrapper">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All client bookings </h3>
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
                        <td>
                          @if ($data->Status =='Pending')
                          <a  class="btn btn-danger btn-sm">Pending</a>
                          @elseif($data->Status =='Scheduled')
                          <a class="btn btn-info btn-sm">Scheduled</a>

                          @else
                          <a class="btn btn-success btn-sm">Completed</a>

                          @endif
                        </td>
                        <td>
                          @if ($data->Status =='Pending')
                          <a href="{{route('schedulenow', $data->id)}}" class="btn btn-danger btn-sm">Schedule</a>
                          @elseif($data->Status =='Scheduled')
                          <a href="{{route('completenow', $data->id)}}" class="btn btn-warning btn-sm">Mark complete</a>
                          @else
                          <a  class="btn btn-success btn-sm">Completed</a>
                          @endif

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
