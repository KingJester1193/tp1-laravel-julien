
@extends("layouts")
@section("title","Ajout")
@section("content")


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Ajouter un Etudiant</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

        <div class="row gy-4 d-flex justify-content-end">


          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">

            <form action="{{ route('etudiant.store') }}" method="post"  >
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="marco" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="marco@polo.co" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="1(234)567-8900" required>
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="date" id="date" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Adresse" required>
              </div>
              <div class="form-group mt-3">
              <select name="ville" id="ville">
                @foreach ($villes as $ville)
                    <option value="{{$ville->id}}">{{$ville->nom}}</option>
                @endforeach
              </select>
            </div>
            
            
              <div class="text-center  d-flex justify-content-end"><button class="btn btn-success mt-5 px-5" type="submit">Ajouter</button></div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->







@endsection


