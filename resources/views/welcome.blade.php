@extends('layouts.app')

@section('content')

<div class="content-wrapper">

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Modern Borehole <span></span></h2>
              <p>A well-maintained borehole is a cost-effective, self-sufficient asset. Although initial costs of drilling and equipping may be high, there are long-term financial benefits to groundwater, particularly the fact that borehole water costs significantly less than municipal water.</p>
              <div class="text-center"><a href="#services" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jfif);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Traditional Wells</h2>
              <p>Are you looking for an affordable ,clean and simple solution to your domestic water needs? Wells provide a reliable and ample supply of water for home uses and irrigation.</p>
              <div class="text-center"><a href="#services" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Landscaping</h2>
              <p>Creating a purposeful landscape is a surefire way to increase the beauty and comfort of your home.We will help you turn your beautiful garden dream into reality.</p>
              <div class="text-center"><a href="#services" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="services">
    <section id="projects" class="projects bg-dark" style="margin-top: -40px;">
      <div class="container" >
        <div class="container" data-aos="fade-up">
          <div class="section-title" style="color: white; padding: 30px 30px; margin-bottom: -20px ;margin-top: -20px; ">
            <h2>What we do</h2>
            <p> An overview of the services we offer in their respective categories</p>
          </div>
        </div>
      
    <div class="row" style="margin-top: 5px;">
      
     @foreach ($serv as $serv)
      
      <div class="col-md-4">
        <div class="card text-center">
          <img style="height = 260px" class="card-img-top"  src="/storage/image/{{$serv->image}}" alt="">

          {{-- <img src="assets/img/process.jpg"height="260px" class="card-img-top" alt=""> --}}
        <div class="card-body">
          <i><h5 class="card-title">{{$serv->Service}}</h5></i>
        <p class="card-text">
          {{$serv->Description}}
        </p> 
        <a href="#contact" class="btn btn-primary" style="background-color: teal;">Call for quotation</a>
        </div>
        </div>
          </div>
         
     @endforeach



{{--       
        <div class="col-md-4">
          <div class="card text-center">
            <img src="assets/img/manual-drilling.png" class="card-img-top" alt="">
          <div class="card-body">
            <i><h5 class="card-title">Borehole</h5></i>
            <p class="card-text">1. Site visit and testing <br>
              2. Drilling and construction <br>
              3. Determining the yield <br>
              4. Pumping and piping
             </p> <a href="#contact" class="btn btn-primary" style="background-color: teal;">Call for quotation</a>
          </div>
          </div>
            </div>
      
            <div class="col-md-4">
              <div class="card text-center">
                <img src="assets/img/land.jpg" class="card-img-top" alt="">
              <div class="card-body">
                <i><h5 class="card-title">Landscaping</h5></i>
                <p class="card-text">1.Review construction estimates
                  <br>
                  2.Demolition and grading
                  <br>
                  3. Planting and meintainance
                  <br>
                  4. Final cleaning and walkthrough
                 </p>  <a href="#contact" class="btn btn-primary" style="background-color: teal;">Call for quotation</a>
              </div>
              </div>
                </div> --}}
      
      </div>
      </div>

      <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title" style="color: white;padding: 30px 30px; margin-bottom: -20px ;margin-top: -20px; ">
          <h2>Gallery</h2>
          <p>Some photos from Our Projects</p>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row no-gutters">
          @foreach ($data as $data)
              
          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="/storage/image/{{$data->imagename}}" class="venobox" data-gall="gallery-item">
                <img src="/storage/image/{{$data->imagename}}" alt="" class="img-fluid">
              </a>
            </div>
          </div>
          @endforeach

          {{-- <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.png" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.png" class="venobox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.png" alt="" class="img-fluid">
              </a>
            </div>
          </div>
 --}}
        </div>

      </div>
    </section><!-- End Gallery Section -->


      <section class="parallex py-5"style="
      background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url(assets/img/background.jpg)no-repeat; 
      width:100% ;
      height: 70vh;
    background-size:fit;
     background-attachment: fixed;
    "   id="about">
      <div class="container py-5 text-white text-center">
        <div class="row py-3">
          <div  class="col-lg-9 mx-auto">
          
              <h1>KISIMA SAFI</h1>
              <p class="py-3">At Kisima Safi digging , we offer affordable solutions for your water and gardening needs.</p>
       <a href="#contact"><button class="btn2 btn-success mr-1">Contact us</button></a>
       <a href="#projects"><button class="btn3 btn-danger ">Services</button></a> 
         
            
          </div>
        </div>
      </div>
    </section>
  


    
  </div>
  @endsection
  