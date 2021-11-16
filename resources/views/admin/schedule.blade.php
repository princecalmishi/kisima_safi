
@extends('layouts.admin')

@section('content')

<div class="content-wrapper">

    <div class="card card-outline">                  
    
                <div class="card-body">
         
                <div class="col-md-8 ml-3">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Schedule a day for the service here </h3>
                     
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!--  -->
    
                <form action="{{route('schedulenowform')}}" method="post">
                    @csrf
                    <br>
                    <input type="hidden" value="{{$id}}" name="appid">


                      <div class="card-body">
                        <div class="form-group">
                            <label  for="exampleFormControlSelect1">Select service day</label>
                            <input class="form-control" value="" type="date" id="sessiontime" name="sessionday">
                            
                         </div>
                      
                       
                        <br>
                        <center>
                        <button type="submit"  class="btn btn-success btn-lg btn-block text-center">Submit</button>
                        </center>
                      </div>
                     
      
                      </form>
                               <!-- /.card-body -->
                  </div>
    
            
                
                <!-- /.col-md-6 -->
              </div>
              <!-- /.row -->
              
            </div><!-- /.container-fluid -->

            
</div>
@endsection
