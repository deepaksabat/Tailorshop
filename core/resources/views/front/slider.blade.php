<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
          @foreach($sliders as $slider)
              @if($slider->id==2)
                  <div class="item active" style="background-image: url({{asset("assets/images/slider/$slider->image")}});">
                      <div class="caption">
                          <h1 class="animated fadeInLeftBig">{{$slider->bold}}</h1>
                          <p class="animated fadeInRightBig">{{$slider->small}}</p>
                      </div>
                  </div>
              @else
                  <div class="item" style="background-image: url({{asset("assets/images/slider/$slider->image")}}); height:567px;">
                      <div class="caption">
                          <h1 class="animated fadeInLeftBig">{{$slider->bold}}</h1>
                          <p class="animated fadeInRightBig">{{$slider->small}}</p>
                      </div>
                  </div>
              @endif
          @endforeach
     </div>
     <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
     <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>
   </div><!--/#home-slider-->