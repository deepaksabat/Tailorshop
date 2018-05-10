<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
     <!-- Start HEAD -->
@include('admin.layouts.loginhead')
    <!-- END HEAD -->
     @yield('content')
        <!-- BEGIN CORE PLUGINS -->
@include('admin.layouts.loginscripts')            
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>