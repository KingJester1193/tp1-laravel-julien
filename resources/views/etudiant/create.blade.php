
@extends("layouts")
@section("title","Ajout")
@section("content")


    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/contact-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>@lang('lang.addStudent_title')</h2>

      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container position-relative" data-aos="fade-up">

        <div class="row gy-4 d-flex justify-content-end">


          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
          <div>
        @if($errors)
          <ul>
            @foreach($errors->all() as $error)
            <li class="text-danger">{{ $error }}</li>
            @endforeach
          </ul>
        @endif
      </div>
            <form action="" method="post"  >
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="@lang('lang.placeholder_name')" >
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="@lang('lang.placeholder_email')" >

                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="@lang('lang.placeholder_phone') 1(234)567-8900" >
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="*@lang('lang.placeholder_password')*"  >
              </div>
              <div class="form-group mt-3">
                <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="*@lang('lang.placeholder_password-confirmation')*"  >
              </div>
              <div class="form-group mt-3">
                <input type="date" class="form-control" name="birthday" id="birthday" >
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="address" id="address" placeholder="@lang('lang.placeholder_address')" >
              </div>
              <div class="form-group mt-3">
            
              <select name="ville" id="ville">
                @foreach ($villes as $ville)
                    <option value="{{$ville->id}}">{{$ville->name}}</option>
                @endforeach
              </select>
            </div>
            
            
              <div class="text-center  d-flex justify-content-end"><button class="btn btn-success mt-5 px-5" type="submit">@lang('lang.addBtn')</button></div>
            </form>

          </div><!-- End Contact Form -->

        </div>

      </div>
    </section><!-- End Contact Section -->







@endsection


