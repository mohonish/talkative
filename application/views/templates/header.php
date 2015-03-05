<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<title><?php echo $uname ?> | Talkative</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $this->load->helper('html');
        echo link_tag('http://fonts.googleapis.com/css?family=Raleway:400,300,600');
        echo link_tag('/assets/css/normalize.css');
        echo link_tag('/assets/css/skeleton.css');
        echo link_tag('/assets/css/overrides.css');
  ?>

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
              document.getElementById('msgbox').value='' //clear message box.
            }
          });

        });

      });
    </script>

    <script>
    $(document).ready(function() {
      var lastmsgid;
      (function poll(lastmsgid) {
        lastmsgid=document.getElementById("lastmsgid").innerHTML;
        setTimeout(function() {
          $.ajax({ url: "message/update/"+lastmsgid, success: function(data) {
            if(data.length!=0) {
              for (var i = 0; i < data.length; i++) {
                lastmsgid=data[i].id;
                $('#lastmsgid').html(lastmsgid);
                $('#chatbox .msg').append('<tr><td>'+data[i].uname+'</td>'+'<td>'+data[i].msg+'</td>'+'<td>'+data[i].posted_on+'</td></tr>');
              }
            }
          }, dataType: "json", complete: poll });
        }, 1000);
      })();
    });
    </script>

</head>
<body>

	<div class="container">
    <div class="row">
		  <h1>Hi, <?php echo $uname ?></h1>
	 </div>