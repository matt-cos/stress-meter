<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Stress Meter</title>
    <script
	  src="https://code.jquery.com/jquery-3.2.1.min.js"
	  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
	  crossorigin="anonymous"></script>
	  <style>
	  	.user {
	  		position: relative;
	  		width: 100px;
	  		height: 100px;
	  		background-color: #ddd;
	  		border-radius: 50%;
	  	}
	  	.meter {
	  		width: 50px;
	  		height: 2px;
	  		background-color: red;
	  		transform-origin: 100% 0;
	  		position: absolute;
	  		bottom: 40px;
	  	}
	  	.description {
	  		position: absolute;
	  		bottom: 0;
	  	}
	  </style>
  </head>
  <body>
  	<?php
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$db = 'stressmeter';

		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		// echo "Connected successfully <br>";


		$sql = "SELECT name, level FROM users";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "<div class='user " . $row["name"] . "'><div class='meter'></div><div class='description'>" . $row["name"]. " is at level <span class='level-numerator'>" . $row["level"] . "</span></div></div>";
		    }
		} else {
		    echo "0 results";
		}

		$conn->close();
	?>
	<script>
		var levelVal = $(".level-numerator");

		var userNumber = levelVal.length;

		var i = 0;

		while (levelVal[i]) {

			var levelNum = Number($(levelVal[i]).html());

			var fractionLevel = levelNum/10;

			var degreeLevel = fractionLevel*180;

			console.log(degreeLevel);

			var user = $(".user");

			console.log(user[i]);

			$(user[i]).find(".meter").css("transform", "rotate(" + degreeLevel + "deg)");

			i++;
		}

		// var levelNum = Number($(levelVal[i]).html());

		// var fractionLevel = levelNum/10;

		// var degreeLevel = fractionLevel*180;

		// console.log($(".level-numerator").length);

		// $(".meter").css("transform", "rotate(" + degreeLevel + "deg)");

	</script>
  </body>
</html>