<div class="page-container">
            <!-- BEGIN SIDEBAR -->
@include('admin.layouts.sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
@include('admin.layouts.message')                    <!-- BEGIN PAGE HEADER-->

@yield('content')
                    
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
@include('admin.layouts.quickside')            
            <!-- END QUICK SIDEBAR -->
        </div>