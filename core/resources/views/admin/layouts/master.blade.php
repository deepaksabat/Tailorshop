<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
     <!-- Start HEAD -->
@include('admin.layouts.head')
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
@include('admin.layouts.header')     
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->       
@include('admin.layouts.container')      
        <!-- END CONTAINER -->
        
        <!-- BEGIN FOOTER -->
 @include('admin.layouts.footer')            
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="{{ asset('assets/admin/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('assets/admin/global/plugins/excanvas.min.js') }}"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
@include('admin.layouts.scripts')            
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>