<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center pb-5 mb-3">
      <div class="col-md-7 heading-section text-center ftco-animate">
          <span class="subheading">Price &amp; Plans</span>
        <h2>Affordable Packages</h2>
      </div>
    </div>
        <div class="row">


@foreach ($package as $item)

<div class="col-md-6 col-lg-3 ftco-animate">
    <div class="block-7">
      <div class="text-center">
      <span class="excerpt d-block">Business</span>
      <span class="price"><sup>TK</sup> <span class="number">{{$item->title  }}</span> <sub>/mos</sub></span>
      <ul class="pricing-text mb-5">
        <li><span class="fa fa-check mr-2"></span>{{$item->about  }}</li>
      </ul>
      <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
      </div>
    </div>
  </div>

@endforeach




      </div>
    </div>
</section>
