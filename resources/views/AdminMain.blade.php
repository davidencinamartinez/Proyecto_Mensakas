<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<title>@yield('title')</title>
	@stack('styles')
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    	<style type="text/css">
    		.input-field deep-purple accent-4 {border: none;}
    	</style>
	@stack('scripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
	<nav>
	   <div class="nav-wrapper deep-purple accent-4">
	     <a href="#!" class="brand-logo">MensakasApp - Panel de Administración</a>
	     <ul class="right hide-on-med-and-down">
	       <li>
	       	<nav>
	       	    <div class="nav-wrapper">
	       	      <form>
	       	        <div class="input-field deep-purple accent-4">
	       	          <input id="search" type="search" required>
	       	          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
	       	          <i class="material-icons">close</i>
	       	        </div>
	       	      </form>
	       	    </div>
	       	  </nav>
	       </li>
	       <li><a href="badges.html"><i class="material-icons">view_module</i></a></li>
	       <li><a href="collapsible.html"><i class="material-icons">refresh</i></a></li>
	       <li><a href="mobile.html"><i class="material-icons">more_vert</i></a></li>
	     </ul>
	   </div>
	 </nav>
	@section('postSection')
    @show
</body>
</html>