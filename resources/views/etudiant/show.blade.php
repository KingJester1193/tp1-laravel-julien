
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
        <h2>Profil</h2>

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
              <h4>{{$etudiant->nom}}</h4>
              <span>{{$etudiant->email}}</span>
              <span>{{$etudiant->phone}}</span>
              <span>{{$etudiant->adresse}}</span>
              <span>{{$etudiant->date_naissance}}</span>

            </div>
          </div>
        </div><!-- End Team Member -->


      </div>

    </div>
  </section><!-- End Team Section -->

  @endsection