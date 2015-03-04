<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $uname ?> | Talkative</title>
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script>
      $(function () {

        $('form').on('submit', function (e) {
          
          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'message',
            data: $('form').serialize(),
            success: function () {
              alert('form was submitted'); //remove later.
            }
          });

        });

      });
    </script>

</head>
<body>

	<div id="container">
		<h1>Hi, <?php echo $uname ?></h1>
	</div>