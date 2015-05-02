<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Redirecting...</title>
	<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
</head>
<body>

<!-- Get user id -->
<script type="text/javascript">
	$.ajax({
		    type: 'get',
		    url: 'http://e-gov-bandung.tk/dukcapil/api/public/check/authenticated',
		    success: function(data) {
		    	console.log(data)
		    	if (data != 'false') { //redirect ke home page kalian, tp kalian juga harus login sendiri juga
		    		var url = "{{url()}}/index?id="+data;
		    		window.location.href = url;
		    	} else { //redirect ke alamat login kalian
		    		var url = "{{url()}}/login" 
		    		window.location.href = url
		    	}
		    },
		    error: function(data) {
		    	alert(data);
		    }
		});
</script>
</body>
</html>