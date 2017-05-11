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
	  		display: block;
	  	}
	  	.chart {
	 /* 		width: 100px;
	  		height: 50px;
	  		background-color: green;*/
	  		position: relative;
			background: 
			    conic-gradient(yellow 5%, 
			      orange 0 15%, 
			      red 0 25%,
			      white 0 50%,
			      white 0 75%,
			      green 0 85%,
			      blue 0 95%,
			      yellow 0 100%
			    );
			  border-radius: 50%;
			  width: 200px;
			  height: 200px;
			  float: left;
			  /*transform:rotate(-90deg);*/
	  	}
	  	.meter {
	  		width: 90px;
	  		padding-right: 10px;
			height: 5px;
			background-color: #000;
			position: absolute;
			transform-origin: center right;
			bottom: 50%;
			/* left: 50%; */

	  	}
	  	.description {
	  		/*position: absolute;*/
	  		/*bottom: 0;*/
	  	}
	  </style>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
		<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/conic-gradient.js"></script>
  </head>
  <body>


<div class="pieContainer">
     <div class="pieBackground"></div>sdvcmbfds
     <div id="pieSlice1" class="hold"><div class="pie"></div></div>
</div>
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
		        echo "<div class='user " . $row["name"] . "'><div class='chart'><div class='meter'></div></div><div class='description'>" . $row["name"]. " is at level <span class='level-numerator'>" . $row["level"] . "</span></div></div>";
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