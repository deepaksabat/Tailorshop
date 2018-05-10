<div class="page-sidebar-wrapper">
   
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link nav-toggle">
                        @if(Auth::user()->is_permission==0)
                            <h4>  <span class="title"> <i class="fa fa-user"></i>Not Assign</span></h4>   
                        @elseif(Auth::user()->is_permission==1)
                           <h4>  <span class="title"> <i class="fa fa-user"></i>Salesman</span>    </h4>               
                        @elseif(Auth::user()->is_permission==2)
                            <h4>  <span class="title"> <i class="fa fa-user"></i>Tailor</span>    </h4>            
                        @elseif(Auth::user()->is_permission==3)
                           <h4>  <span class="title"> <i class="fa fa-user"></i>Admin</span>    </h4>   
                        @else(Auth::user()->is_permission==4)
                          <h4>  <span class="title"> <i class="fa fa-user"></i>    Super Admin</span>  </h4>   
                        @endif                     
                    <span class="selected"></span>
                </a>
            </li>

            <li class="nav-item  @if(request()->path() == 'admin') active open @endif">
                <a href="{{url('admin')}}" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                            <span class="title">Dashboard</span>                       
                    <span class="selected"></span>
                </a>
            </li>
            @if(Auth::user()->is_permission==2 || 
            Auth::user()->is_permission==1 ||
            Auth()->user()->is_permission==3 ||
            Auth()->user()->is_permission==4)
            <li class="nav-item
                            @if(request()->path() == 'admin/add-order') active open
                            @elseif(request()->path() == 'admin/get-orders-list') active open
                            @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-reorder"></i>
                    <span class="title">Order</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    @if(Auth::user()->is_permission==1 ||
                    Auth()->user()->is_permission==3 ||
                    Auth()->user()->is_permission==4)
                    <li class="nav-item @if(request()->path() == 'admin/add-order') active open @endif">
                        <a href="{{ url('admin/add-order') }}" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">New Order</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item @if(request()->path() == 'admin/get-orders-list') active open @endif">
                        <a href="{{ url('admin/get-orders-list') }}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">All Order List</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->is_permission==1||
            Auth()->user()->is_permission==3 ||
            Auth()->user()->is_permission==4)

            <li class="nav-item
                            @if(request()->path() == 'admin/add-service') active open
                            @elseif(request()->path() == 'admin/service-list') active open
                            @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-arrows"></i>
                    <span class="title">Service</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/add-service') active open @endif">
                        <a href="{{ url('admin/add-service') }}" class="nav-link ">
                            <i class="fa fa-plus"></i>
                            <span class="title">Add Service</span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'admin/service-list') active open @endif">
                        <a href="{{ url('admin/service-list') }}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">All Service</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item
                            @if(request()->path() == 'admin/get-payment-list') active open
                            @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Payment Details</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/get-payment-list') active open @endif">
                        <a href="{{ url('admin/get-payment-list') }}" class="nav-link ">
                            <i class="fa fa-list"></i>
                            <span class="title">All Payment List</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item
                            @if(request()->path() == 'admin/all-user') active open
                            @elseif(request()->path() == 'register') active open
                            @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Staff</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'add-staff') active open @endif">
                        <a href="{{ url('add-staff') }}" class="nav-link ">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">Add Staff </span>
                        </a>
                    </li>
                    <li class="nav-item @if(request()->path() == 'admin/all-user') active open @endif">
                        <a href="{{ url('admin/all-user') }}" class="nav-link ">
                            <i class="fa fa-users"></i>
                            <span class="title">All Staff & Role Assign</span>
                        </a>
                    </li>
                </ul>
            </li>
            @endif    
            <!--Interface Admin/Super Admin Area-->
            @if(Auth()->user()->is_permission==4)
            <li class="nav-item
            @if(request()->path() == 'admin/update-shop-info') active open @endif">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-cogs"></i>
                    <span class="title">Admin Control</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub-menu">
                    <li class="nav-item @if(request()->path() == 'admin/update-shop-info') active open @endif">
                        <a href="{{ url('admin/update-shop-info') }}" class="nav-link ">
                            <i class="fa fa-wrench"></i>Invoice Setting</span>
                        </a>
                    </li>
                </ul>
            </li>

                <li class="nav-item
            @if(request()->path() == 'admin/menu') active open
               @elseif(request()->path() == 'admin/menu/create') active open
               @elseif(request()->path() == 'admin/logo') active open
               @elseif(request()->path() == 'admin/slider') active open
               @elseif(request()->path() == 'admin/footer') active open
               @elseif(request()->path() == 'admin/social') active open
               @elseif(request()->path() == 'admin/contac') active open
               @elseif(request()->path() == 'admin/about-price') active open
               @elseif(request()->path() == 'admin/team') active open
               @elseif(request()->path() == 'admin/statistics') active open
               @elseif(request()->path() == 'admin/about') active open
               @elseif(request()->path() == 'admin/service') active open
            @endif">
                    <a href="#" class="nav-link nav-toggle">
                        <i class="fa fa-desktop"></i>
                        <span class="title">Interface Control</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item @if(request()->path() == 'admin/menu') active open @endif">
                            <a href="{{route('menu.index')}}" class="nav-link ">
                                <i class="fa fa-bars"></i>
                                <span class="title">Menus</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/logo') active open @endif">
                            <a href="{{route('logo')}}" class="nav-link ">
                                <i class="fa fa-picture-o"></i>
                                <span class="title">Logo and Icon</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/slider') active open @endif">
                            <a href="{{route('slider')}}" class="nav-link ">
                                <i class="fa fa-sliders"></i>
                                <span class="title">Slider Settings</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/about') active open @endif">
                            <a href="{{route('about')}}" class="nav-link ">
                                <i class="fa fa-info-circle"></i>
                                <span class="title">About US</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/about-price') active open @endif">
                            <a href="{{route('about-price')}}" class="nav-link ">
                                <i class="fa fa-money"></i>
                                <span class="title">About Price</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/service') active open @endif">
                            <a href="{{route('service')}}" class="nav-link ">
                                <i class="fa fa-tasks"></i>
                                <span class="title">Offered Services</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'admin/social') active open @endif">
                            <a href="{{route('social')}}" class="nav-link ">
                                <i class="fa fa-user"></i>
                                <span class="title">Social Accounts</span>
                            </a>
                        </li>

                        <li class="nav-item @if(request()->path() == 'admin/statistics') active open @endif">
                            <a href="{{route('statistics')}}" class="nav-link ">
                                <i class="fa fa-area-chart"></i>
                                <span class="title">Statistics</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/footer') active open @endif">
                            <a href="{{route('footer')}}" class="nav-link ">
                                <i class="fa fa-list"></i>
                                <span class="title">Footer Content</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/team') active open @endif">
                            <a href="{{route('team')}}" class="nav-link ">
                                <i class="fa fa-users"></i>
                                <span class="title">Team</span>
                            </a>
                        </li>
                        <li class="nav-item @if(request()->path() == 'admin/contac') active open @endif">
                            <a href="{{route('contac')}}" class="nav-link ">
                                <i class="fa fa-id-card"></i>
                                <span class="title">Contact Information</span>
                            </a>
                        </li>


                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>