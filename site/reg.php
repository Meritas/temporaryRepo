<html>
<body>
<script src="jquery.js"></script>
<script src="script.js"></script>

<?php

if( isset($_POST["isSubmitted"]) ){

	if( $_POST["pass"] == $_POST["RepeatPass"] ) {		
		$con=new mysqli("localhost", "root", "", "site");
		if ($con->connect_errno) {
		echo ("Error!");

		}
		
		$query = $con->query("INSERT INTO Registrirani(name, pass) VALUES( '{$_POST['username']}', '{$_POST['pass']}' );");
		$query = $con->query("INSERT INTO Potrebiteli(username) VALUES( '{$_POST['username']}' );");
		
		echo ("Registration successful!");
	}
		else {
			echo('
			<form action="reg.php" method="post" accept-charset="UTF-8">
				<fieldset>
					<input type="hidden" name="isSubmitted" value="10"/>
					<legend>Username</legend>
					 <label for="username" >Enter your name*: </label>
					<input type="text" name="username" value="'.htmlspecialchars($_POST["username"]).'" id="username" /> 
					<br>
					<label for="password">Enter your password*:<label/>
					<input type="password" name="pass" id="pass" />
					<br>
					<label for="RepeatPass">Reenter your password*:<label/>
					<input type="password" name="RepeatPass"/>
					<br>
					<input type="submit" name="Submit" value="Submit" id="submitBut">
					<br>
				</fieldset>

			</form>
		');
			
		}
}	

else {
		$str = '
				<form action="reg.php" method="post" accept-charset="UTF-8">
					<fieldset>
						<input type="hidden" name="isSubmitted" value="10"/>
						<legend>Username</legend>
						 <label for="username" >Enter your name*: </label>
						<input type="text" name="username" id="username" /> 
						<br>
						<label for="password">Enter your password*:<label/>
						<input type="password" name="pass" id="pass" />
						<br>
						<label for="RepeatPass">Reenter your password*:<label/>
						<input type="password" name="RepeatPass"/>
						<br>
						<input type="submit" name="Submit" value="Submit" id="submitBut" >
						<br>
					</fieldset>

				</form>
			';
			echo($str);
	

	
}
	
?>

</body>
</html>