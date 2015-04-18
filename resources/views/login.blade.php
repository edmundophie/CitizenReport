
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
			{!! Form::open(array('action' => 'SessionController@login')) !!}
				<input type="text" class="email" placeholder="Username" name="username" equired=""/>
				<input type="password" class="Password" placeholder="Password" name="password" required=""/>
				<input type="submit" value="SIGN IN">
			</form>
			<div class="check">
				<div class="check-box">
					<input type="checkbox" value="None" id="roundedTwo" name="check">
					<label for="roundedTwo"> </label>
				</div>
				<div class="remember">
					<p>Keep Me Logged In</p>
				</div>
			</div>
			<div class="clear"> </div>
		</div>
</div>
<!--/SIGN UP-->
</body>
</html>