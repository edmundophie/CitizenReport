
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>	
<head>
<title>Login | CitizenReport</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<meta name="keywords" content="Black Login Form Responsive Templates, Iphone Widget Template, Smartphone login forms,Login form, Widget Template, Responsive Templates, a Ipad 404 Templates, Flat Responsive Templates" />
<link href="{{URL::asset('css/login.css')}}" rel='stylesheet' type='text/css' />
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fjord+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<!--//webfonts-->
</head>
<body>
<!--SIGN UP-->
<h1>LOGIN</h1>
<div class="login-form">
		<div class="avtar">
			<img src="{{URL::asset('images/avtar.png')}}" />
		</div>
		<div class="form-top">
			<form id="loginForm">
				<input type="text" class="email" placeholder="NIK" name="nik" id="nik" required=""/>
				<input type="password" class="Password" placeholder="Password" name="password" id="password" required=""/>
				<input type="submit" value="SIGN IN">
			</form>
			<div class="clear"> </div>
		</div>
</div>
<script>	
$('#loginForm').submit(function(e) {
	var nik = $('#nik').val();
	var password = $('#password').val()
		$.ajax({
	        url: 'http://e-gov-bandung.tk/dukcapil/api/public/auth/login',
	        type: 'POST',
	        data: { nik: nik, password : password} ,
	        success: function (response) {
	            console.log(response.id);
	            var url = "{{url()}}/";
	            window.location.href = url;
	            //return true;
	        },
	        error: function (err) {
	        	<!-- alert(err); -->
	        	<!-- console.log(err) -->
	        	<!-- return false; -->
	        }
	    });
	for (var i = 0; i < 2000000000; ++i);
})
</script>
</body>
</html>