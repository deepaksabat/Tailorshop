<div id="fakeLoader"></div>

<header id="home">
<div class="main-nav">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="{{route('index')}}">
@if($menu->id==0)
  <h1>
    <img class="img-responsive white" src="assets/images/logo/logo.png" alt="logo">
  </h1>
@else
  <h1>
    <img class="img-responsive white" src="../assets/images/logo/logo.png" alt="logo">
  </h1>
@endif  
</a>                    
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-right">                 
<li><a href="{{route('index')}}">Home</a></li>

  @foreach($menus as $menu)
     <li>
         <a href="{{route('page', ['menu_id' => $menu->id ])}}" class="dropdown-toggle">
          {{$menu->name}} 
        </a>
      </li>
  @endforeach
 
<li class="" style="padding-left: 40px;"> &nbsp; </li>
            @if (Route::has('login'))
               
                    @auth
                         <li><a href="{{action('AdminController@index')}}"> <i class="fa fa-list"> </i> DASHBOARD </a></li> 
                    @else
                       <li><a href="{{route('login')}}"> <i class="fa fa-sign-in"> </i> 
                       SIGN IN </a></li> 

                    @endauth
               
            @endif    
</ul>
</div>
</div>
</div><!--/#main-nav-->