@extends("layouts")
@section("title","Accueil")
@section("content")

 <!-- ======= Our Services Section ======= -->
 <section id="services-list" class="services-list">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Nos Etudiants</h2>
          <a href="create">Ajouter un etudiant</a>
          @if(session('success'))
            <h4>{{session('success')}}</h4>
         @endif
        </div>


        <div class="row gy-5">
            @foreach($etudiants as $etudiant)

          <div class="col-lg-4 col-md-6 service-item d-flex just-cont_spc-even" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="bi bi-briefcase" style="color: #f57813;"></i></div>
            <div>
              <h4 class="title"><a href="{{ route('etudiant.show', $etudiant->id) }}" class="">{{$etudiant->nom}}</a></h4>
              <p class="description">{{$etudiant->email}}</p>
              <p class="description">{{$etudiant->phone}}</p>
           
            </div>

            <div class="student-btn">
                    <a class="btn btn-primary" href="{{ route('etudiant.edit', $etudiant->id) }}">Modifier</a>
                 
              
            </div>
                

          </div>
          <!-- End Service Item -->
    
          @endforeach
        </div>

    </div>
</section><!-- End Our Services Section -->


@endsection