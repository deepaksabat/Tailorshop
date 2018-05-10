<!--Fronend Script-->
<script type="text/javascript" src="{{ asset('assets/front/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/fakeLoader.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/front/js/main.js') }}"></script>


<script type="text/javascript">
$("#fakeLoader").fakeLoader({
timeToHide:1200, //Time in milliseconds for fakeLoader disappear
zIndex:"999",//Default zIndex
spinner:"spinner2",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7'
bgColor:"#{{$sinfo->color_code}}", //Hex, RGB or RGBA colors
imagePath:"{{ asset('assets/images/logo/logo.png') }}" //If you want can you insert your custom image

});

</script>

<script>
// make The Link Active 
$(function() {
var pgurl = window.location.href;
$('.navbar-nav li a').each(function(){
   var myHref= $(this).attr('href');
   if( pgurl == myHref) {
        $(this).parent().addClass("active");
   }

        });
             });
</script>