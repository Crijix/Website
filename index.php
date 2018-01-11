<!DOCTYPE html>
<html>
<head>

	<title>Dumb Logic</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="snake.js">
</head>

<body>
<div id="container">
	<div class="topHeader">
		<strong>News:</strong> You're dumb
	</div>

	<!-- TOP HEADER -->
	<div class="header">
		Dumb Logic
	</div>

	<!-- Navigation Window -->
	<div class="nav">
		<a href="https://google.com">Google</a>
		<a href="https://youtube.com">Youtube</a>
		<a href="https://hotmail.com">Hotmail</a>
		<a href="Contact.html">Contact</a>
		<a href="http://localhost/phpmyadmin/index.php">Database</a>
		<a href="http://localhost/web/registration/login.php">Login</a>
		<a href="http://localhost/web/registration/register.php">Register</a>
	</div>

	<div id="sidebar1">
		<div class="subHeader">
			Chill Nation
		</div>

		<!-- Top Left Side Column -->
		<div class="subColumn">
			<img src="images/chill.jpg" alt="Chill Nation" height="138" width="138" align="middle">
			<br>
			Name: Chill Nation
			<br>
			Subscribers: 4.2m
			<br>
			Created: 26/02/2014
			<br>
			Channel: <a href="https://www.youtube.com/channel/UCM9KEEuzacwVlkt9JfJad7g">Click Me</a>
		</div>

		<div class="subHeader">
			Test
		</div>

		<!-- Second Left Side Column -->
		<div class="subColumn">

			<p>Hello World. This is epic, lol get real. Oki do not do it.</p>
			
			<div class="subWrapper">
				<form method="post" action="ConnectData.php">			
					<input type="text" name="name" required placeholder="Name">

						<br><br>

            		<input type="number" name="lazy" required placeholder="Lazy" min="10" max="100"><br><br>

            		<input type="submit" name="insert" value="Add Data">
        		</form>

        			<hr>

        		<!-- Backup user's information from database -->
        		<form method="post" action="backup.php">
        			<input type="submit" name="backup" value="BACKUP">
        		</form>
        		
        			<br>

        		<!-- Send backup back to database -->
        		<form method="post" action="sendBackup.php">
        			<input type="submit" name="sendBackup" value="SEND BACKUP">
        		</form>
       		 </div>
		</div>

		<div class="subHeader">
			Test
		</div>

		<!-- Third Left Side Column -->
		<div class="subColumn3">
			Test
		</div>
	</div>

	<!-- LEADERBOARD Column -->
	<div id="sidebar2">
		<div class="subHeader">
			LEADERBOARD
		</div>
		<div class="subColumn2">
			<center>
				<div class="headerTop">
					TOP 5 PLAYERS
				</div>

				<!-- Table for Top Players -->
				<table>
					<th> 
						Name
					</th>
					<th> 
						Score
					</th>

					<!-- Access score from database -->
					<?php
						include_once 'dbconn.php';
						$sql = "SELECT name, score FROM `scores` ORDER BY score DESC LIMIT 5;";

						$records=mysqli_query($connect,$sql);
						$recordsCheck = mysqli_num_rows($records);

						if ($recordsCheck > 0)
						{
							while($row = mysqli_fetch_assoc($records)){
								echo "<tr>";
								echo "<td>".$row['name']."</td>";
								echo "<td>".$row['score']."<br>"."</td>";
								echo "</tr>";
							}
			  
						}
					?>
				</table>

					<hr>

				<center><p>Something goes here</p></center>
			</center>
		</div>

		<div class="subHeader">
			This is a test
		</div>

		<!-- Second Right Side Column -->
		<div class="subColumn3">

		</div>

	</div>

	<div id="column1">
		<div class="subHeader">
			Dumb Logic Index
		</div>
		
			<br>

	<!-- Snake Game -->
	<div class="snakeBackground">
		<div class="center">
			<div class="center">
				<div class="snakeHeader">
					Pizza Snake
				</div>
			</div>
			<canvas id="canvas" width="560" height="250" style="border:1px solid #000000;"></canvas>
			<br>
    		<button id="btn" onclick="myScroll()">START</button>

		</div>
	</div>

	<!-- Disable Scroll Lock -->
	<script>
		function myScroll() {
			window.onscroll = function () { window.scrollTo(0, 0); };
		}
	</script>
	
	<!-- Javascript for Snake Game -->
	<script src="snake.js"></script>
	<script src="app.js"></script>

		<br>
		<hr>

	<!-- SMASH Game -->
	<div class="center">

		<div>Time left: <span id="timer"></span></div>
		<p>Smash the button as much as you can, before the timer runs out!</p>
		<button type="button" onclick="myFunction()">SMASH</button>

		<p id="demo">0</p>

	</div>
	
	<!-- Javascript for Smash Game -->
	<script src="count.js"></script>
	<script src="timer.js"></script>

	<hr>

	<!-- Youtube Link -->
	<div class="center"><iframe width="560" height="315" src="https://www.youtube.com/embed/SAFHQobvqXI?autoplay=0" frameborder="0" allowfullscreen></iframe>
	</div>
	
		<br>

	</div>

	<!-- Copyright Header -->
	<div class="botHeader">
		<strong>Copyright © 2017 - Dumb Logic Inc.</strong>
	</div>	
</div>
</body>
</html>