<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome | Talkative</title>

	<?php $this->load->helper('html');
        echo link_tag('http://fonts.googleapis.com/css?family=Raleway:400,300,600');
        echo link_tag('/assets/css/normalize.css');
        echo link_tag('/assets/css/skeleton.css');
        echo link_tag('/assets/css/overrides.css');
  	?>

</head>
<body>

<div class="container">
	
	<div class="row">
		<h1>Welcome to Talkative!</h1>
		<hr />
	</div>

	<div class="row">
		<p>Tell us your name to start talking</p>
		<form action="chat" method="POST">
			<input type="text" name="uname">
			<input class="button-primary" type="submit" value="Enter">
		</form>
	</div>

</div>

</body>
</html>