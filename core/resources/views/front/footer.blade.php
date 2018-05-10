<footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12 footer-block">
                <img src="{{asset('assets/images/logo/logo.png')}}" alt="**" class="alignleft" style="width: 100%; filter: brightness(0) invert(1);">
                <div class="social-icons">
                    <ul>
                        @foreach($socials as $social)
                        <li><a href="{{$social->farul}}" target="_blank"><i class="fa fa-{{$social->facode}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>

                </div>

                <div class="col-md-6 col-sm-4 col-xs12">
                    <h4>{{$footer->heading}}</h4>
                    <p><div align="justify">{!! $footer->text !!}}<br></div></p>
                </div>
                   
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <h4>Contact us</h4>
                    <address>
                        <i class="fa fa-phone"></i>  {{$contact_info->mobile}} <br>
                        <i class="fa fa-envelope-o"></i> <a href="mailto:{{$contact_info->email}}">software@thesoftking.com</a><br>
                        <i class="fa fa-map-marker"> </i>  {{$contact_info->location}}<br>
                    </address>
                </div>
        </div>
      </div>
    </div>

    <div class="page-footer">
        <div class="container">
            2017 &copy; Tailor Shop. All Right Reserved
        </div>
    </div>
  </footer>