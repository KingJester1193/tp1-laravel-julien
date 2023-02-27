@extends("layouts")
@section("title","Ajout")
@section("content")


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-color: teal;">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>@lang('lang.editStudent_title')</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">
     

<div class="row gy-4 d-flex justify-content-end">
<div class=" d-flex flex-row">
  <div class="col-lg-5" data-aos="fade-up" data-aos-delay="100">

    <div class="info-item d-flex">
    <div class="member-img">
              <img src="{{ asset('assets/img/team/team-2.jpg') }}" class="img-fluid" alt="">
         
            </div>
    </div><!-- End Info Item -->


  </div>
        <div class="row gy-4 d-flex justify-content-end">


          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

            <form action="" method="post" >
              @csrf
              <div class="row">
                <div class=" form-group">
                  <input type="text" name="nom" class="form-control" id="nom" value="{{$etudiant->name}}" required>
                </div>
                <div class="form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" value="{{$etudiant->email}}" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="phone" value="{{$etudiant->phone}}" required>
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="date" id="date" required>
              </div>
              

              <div class="form-group mt-3">
                <input type="text" class="form-control" name="adresse" id="adresse"  value="{{$etudiant->address}}"required>
              </div>
              <div class="form-group mt-3">
              <select name="ville" id="ville">
                @foreach ($villes as $ville)
                    <option value="{{$ville->id}}" {{ $etudiant->villeId == $ville->id ? 'selected' : '' }}> {{$ville->name}}</option>
                @endforeach
                </select>
                </div>
            </div>
            
              
              <div class="text-center  d-flex justify-content-end"><button class=" btn btn-success mt-5 px-5" type="submit">@lang('lang.editBtn')</button></div>
            </div><!-- End Contact Form -->
          </form>
          </div>

          
          <form action="" method="post"> 
            @csrf
            @method('delete')
            <div class="text-center  d-flex justify-content-end"> <input type="submit" value="@lang('lang.deleteBtn')" class=" btn btn-danger mt-2 px-5"></div>
          </form>
        </div>
        
      </div>
    </section><!-- End Contact Section -->







@endsection
