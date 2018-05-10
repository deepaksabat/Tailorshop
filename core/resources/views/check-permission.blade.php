	
	<title>Unauthorized</title>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			background: red;
		}
		body{
			margin: auto;
		}
		h1{
			font-size: 50px;
			text-align: center;
			align-content: center;
			margin: auto;
			background: red;
			margin: 100px;
			display: block;
			color: white;
		}
		h5{
			font-size: 30px;
			text-align: center;
			align-content: center;
			margin: auto;
			background: red;
			margin: 100px;
			display: block;
			color: white;
		}
		ul{
			font-size: 20px;
			text-align: center;
			align-content: center;
			margin: auto;
			background: red;
			margin: 100px;
			display: block;
			color: red;
		}
		a{
			text-decoration: none;
			color: white;
			padding: 10px 20px;
			border: 1px solid #FFFFFF;
			font-color: red;

		}
		a:hover{
			opacity: 0.5;
		}
		ul{
			list-style: none;
		}
	</style>
<body>

	<h1>Unauthorized Acccess</h1>
	<h5>Please contact with your Super Admin</h5>
	 <ul class="dropdown-menu" role="menu">
     	<li>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                   Logout
                 </a>  <a href="{{ action('AdminController@index') }}">Home</a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </li>
      </ul>
</body>

