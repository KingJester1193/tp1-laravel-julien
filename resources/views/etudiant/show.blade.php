
@extends("layouts")
@section("title","profil")
@section("content")



  <!-- ======= Breadcrumbs ======= -->
  <div class="breadcrumbs d-flex align-items-center" style="background-color: teal;">
    <div class="container position-relative d-flex flex-column align-items-center">

     
    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Team Section ======= -->
  <section id="team" class="team">
    <div class="container" data-aos="fade-up">

      <div class="section-header">

      @if(Auth::check() && Auth::user()->id == $etudiant->id)

           <h1>@lang('lang.welcome'): {{Auth::user()->name}}</h1>
          @else
            <h2>Profil</h2>
          

          @endif




       

      </div>

      <div class="row gy-4 justify-content-center">

        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="team-member">
            <div class="member-img">
              <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            <div class="member-info">
              <h4>{{$etudiant->name}}</h4>
              <span>{{$etudiant->email}}</span>
              <span>{{$etudiant->phone}}</span>
              <span>{{$etudiant->address}}</span>
              <span>{{$etudiant->birthday}}</span>

            </div>
          </div>

          @if(Auth::check() && Auth::user()->id == $etudiant->id)
          
            <div class="student-btn">
                    <a class=" btn btn-success mt-5 px-5" href="{{ route('etudiant.edit', Auth::user()->id) }}">@lang('lang.editBtn') Profil</a>
                 
              
            </div>

            @endif

        </div><!-- End Team Member -->



      </div>

    </div>
  </section><!-- End Team Section -->

  @endsection