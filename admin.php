<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Stress Meter</title>
    <script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
  </head>
  <body>

  	<p>backend</p>

	<form action="">
		<input type="radio" class="name-radio" name="name" value="Matt"> Matt<br>
		<input type="radio" class="name-radio" name="name" value="Jess"> Jess<br>
		<input type="radio" class="name-radio" name="name" value="Rachelle"> Rachelle<br>
		<input type="radio" class="name-radio" name="name" value="Sam"> Sam<br>
		<input type="text" class="level" placeholder="level">
		<button>Update</button>
	</form>


	<script>
		$(document).ready(function(){
		    $("button").click(function(){
		    	var nameUpdate = $(".name-radio:checked").val();
		    	var levelUpdate = $(".level").val();
		    	$.post("update.php",
		    	{
		    		name: nameUpdate,
		    		level: levelUpdate
		    	}, function (data, status) {
		    		alert("Data: " + data + "\nStatus: " + status);
		    	})
		    });
		});
		</script>
		</head>
		<body>

		
  </body>
</html>