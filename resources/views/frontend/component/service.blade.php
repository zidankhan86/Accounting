<br><br><br>
<div class="row justify-content-center pb-5 mb-3">
    <div class="col-md-7 heading-section text-center ftco-animate">
        <span class="subheading">Plans</span>
      <h2>Our Services</h2>
    </div>
  </div>
    <br><br>
<section class="ftco-section bg-light ftco-no-pt">
    <div class="container">
        <div class="row" id="service">


            @foreach ($service as $item)
      <div class="col-md-6 col-lg-3 d-flex services align-self-stretch px-4 ftco-animate">
        <div class="d-block">
          <div class="icon d-flex mr-2">
                <span class="flaticon-accounting-1"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">{{ $item->Title }}</h3>
            <p>{{ $item->about }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    </div>
</section>

