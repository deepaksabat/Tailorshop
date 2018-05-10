<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="">
                       <h4><img src="{{ asset('assets/images/logo/logo.png') }}" alt="logo" id="admin-logo" style="height: 30px; width: 160px;filter: brightness(0) invert(1);-webkit-filter: brightness(0) invert(1);"> </h4></a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
						<li class="dropdown dropdown-user white-color">   
							<a href="{{action('HomeController@frontIndex')}}" data-close-others="true" class="dropdown-toggle" id="white-color">
                                <i class="fa fa-eye"></i> <span> View Site</span>
                            </a>  
                        </li>					
                        <li class="dropdown dropdown-user">
                            
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="#" />
                                <span class="username username-hide-on-mobile"> <i class="fa fa-user"></i>{{Auth::User()->name}} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default login-out-text">
                                
                               
                                <li>
                                    <a href="{{ url('admin/password-reset') }}">
                                       <i class="fa fa-cog"></i> Password Change </a>
                                </li>
                                 <li class="divider"> </li>
                                <li>
                                   <a href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                        <i class="fa fa-key"></i> Sign out </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}  
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>