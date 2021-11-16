@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <h3 class="card-title mt-3">  List of all images in gallery <a class="btn btn-success btn-sm ml-3" style="color: aliceblue">Upload new images</a></h3> 
                    <form action="{{route('uploadimage')}}" method="post" enctype = 'multipart/form-data'>
                      @csrf
                      <div class="input-group mt-3 mb-3">
                        {{-- <label for="image">Service Feature Image</label> --}}
                        <input type="file" id="file-input" class="ml-3"  name="image" required/>
                        <button type="submit" class="btn btn-primary btn-sm">Upload now</button>

                      </div>  
                    </form>
                  </div>
                </div>
                <!-- /.card-header -->
                <style>
                  * {
                    box-sizing: border-box;
                  }
                  
                  .cards {
                    float: left;
                    width: 33.33%;
                    padding: 5px;
                  }
                  
                  /* Clearfix (clear floats) */
                  .card-body::after {
                    content: "";
                    clear: both;
                    display: table;
                  }
                  </style>
                  
                <div class="card-body" style="height: 800px; width: 900px; ">
                  @foreach ($data as $data)
                 
                      <div class="cards" style="height: 30%; width: 30%; border: chartreuse;">
                        <img src="/storage/image/{{$data->imagename}}" class="card-img-top" alt="gallery">
                        <div class="card-body" >
                            <a href="{{route('deleteimage', $data->id)}}" class="btn btn-danger">Delete</a>
                        </div>
                      </div>
                  @endforeach

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
