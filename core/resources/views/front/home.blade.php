  <section>
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-12">
            <h2 class="uppercase bold bottom-line">{{$about->heading}}</h2>
            <p>{!! $about->details !!}</p>
          </div>
        </div> 
      </div>
    </div>
  </section>


  <section class="parallax services" style="
  background-image: url({{ asset('assets/images') }}/{{$service_heading->img}});">
    <div class="container">
      <div class="text-center our-services">
        <div class="row">

         <div class="text-center col-sm-12" style="margin-bottom: 40px;">
            <h2 class="uppercase bold bottom-line">{{$service_heading->heading}}</h2>
            <p style="color:#fff;">{!! $service_heading->service_detail !!}
            </p>
        </div>
</div>
        <div class="row">
@foreach($service_items as $item)
    <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-{{$item->icon}}"></i>
            </div>
            <div class="service-info">
              <h3>{{$item->name}}</h3>
              <p>{!! $item->service_detail !!}</p>
            </div>
          </div>
@endforeach


        </div>
      </div>
    </div>
  </section><!--/#services-->

<section id="pricing">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 300ms; animation-name: fadeInUp;">
          <h2 class="uppercase bold bottom-line">{{$about_price->heading}}</h2>
          <p>{!! $about_price->details !!}</p>
        </div>
      </div>
      <div class="pricing-table">

        <div class="row">
          @foreach($services as $service)
          <div class="col-sm-3">
            <div class="single-table wow flipInY animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;">
              <h3>{{$service->service_name}}</h3>
              <div class="price">
                ${{$service->service_price}}<span>/Unit</span>
              </div>

            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </section>

  <section  class="dark features">
    <div class="container">
      <div class="row count">


      @foreach($statices as $statice)
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="{{$statice->icon}}"></i>
          <h3>{{$statice->bold}}</h3>
          <p>{{$statice->small}}</p>
        </div> 
      @endforeach


      </div>
    </div>
  </section><!--/#features-->

<section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 300ms; animation-name: fadeInUp;">
          <h2 class="uppercase bold bottom-line">{{$about_team->heading}}</h2>
          <p>{!! $about_team->details !!}</p>
        </div>
      </div>

      <div class="team-members">
        <div class="row">
          @foreach($members as $member)
          <div class="col-sm-3">
            <div class="team-member wow flipInY animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: flipInY;">
              <div class="member-image">
                <img class="img-responsive" src="{{ asset('assets/images/profile') }}/{{$member->profile_image}}" alt="{{$member->profile}}" style="width:100px; height: 100px;  text-align: center">
              </div>
              <div class="member-info">
                <h3>{{$member->name}}</h3>
                <h4>{{$member->designation}}</h4>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>            
    </div>
  </section>