<!DOCTYPE html>
<html lang="en">
<head>
<!--Head File-->
@include('front.head')

<!--Main Menu-->
@include('front.menu')
<!--Slider Area--> 
@include('front.slider')
</head><!--/head-->

<body>	
	@yield('content')

<!--Footer file-->
@include('front.footer') 
<!--Script file-->
 @include('front.script')   
</body>
</html>