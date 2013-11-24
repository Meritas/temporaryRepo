<?php

function includeJS(){
	echo("
		<script src='jquery.js'></script>
        <script src='script.js'></script>
		");
}

function redirect($argLocation){
	includeJS();
	echo"
		<script>
			jsRedirect('{$argLocation}');
		</script>
	";
}
	
function login($argUsername, $argPass){
	$conn = new mysqli("localhost", "root", "", "site" );
	$result = $conn->query("SELECT * FROM Registrirani WHERE username='{$argUsername}' AND pass='{$argPass}' ");
	if( $result->num_rows == 0 ){
		echo "Wrong username of password.";
	}
	else{
		session_start();
		$_SESSION['username'] = $argUsername;
		$query = $conn->query("SELECT Potrebiteli.name, Potrebiteli.lastname, Potrebiteli.chat_name, Potrebiteli.age, Potrebiteli.gender, Potrebiteli.job FROM Potrebiteli, Registrirani WHERE Potrebiteli.username = Registrirani.username;");
		$result = $query->fetch_assoc();
		$_SESSION['name'] = $result['name'];
		$_SESSION['lastname'] = $result['lastname'];
		$_SESSION['chat_name'] = $result['chat_name'];
		$_SESSION['age'] = $result['age'];
		$_SESSION['gender'] = $result['gender'];
		$_SESSION['job'] = $result['job'];
		echo "Welcome, ". $_SESSION['username']."!";
		redirect('./profilepage.php');
	}
}

function logout(){

	session_start();
	session_destroy();
	redirect("./auth.php");
}

function avatar_file_check_and_upload($argFileName){
	echo $_FILES[$argFileName]['name'];
	$allowedExts = array("gif", "jpeg", "jpg", "png");
	$temp = explode(".", $_FILES["{$argFileName}"]["name"]);
	$extension = end($temp);
	if ((($_FILES["{$argFileName}"]["type"] == "image/gif")
	|| ($_FILES["{$argFileName}"]["type"] == "image/jpeg")
	|| ($_FILES["{$argFileName}"]["type"] == "image/jpg")
	|| ($_FILES["{$argFileName}"]["type"] == "image/pjpeg")
	|| ($_FILES["{$argFileName}"]["type"] == "image/x-png")
	|| ($_FILES["{$argFileName}"]["type"] == "image/png"))
	//&& ($_FILES["{$argFileName}"]["size"] < 20000)
	&& in_array($extension, $allowedExts))
	  {
	  if ($_FILES["{$argFileName}"]["error"] > 0)
		{
		echo "Error: " . $_FILES["{$argFileName}"]["error"] . "<br>";
		}
	  else
		{
		move_uploaded_file($_FILES["{$argFileName}"]["tmp_name"],
		"upload/" . $_FILES["{$argFileName}"]["name"]);
		echo "Upload: " . $_FILES["{$argFileName}"]["name"] . "<br>";
		echo "Type: " . $_FILES["{$argFileName}"]["type"] . "<br>";
		echo "Size: " . ($_FILES["{$argFileName}"]["size"] / 1024) . " kB<br>";
		echo "Stored in: " . $_FILES["{$argFileName}"]["tmp_name"];
		echo "Stored in: " . "upload/" . $_FILES["{$argFileName}"]["name"];
		}
	  }
	else
	  {
	  echo "Invalid file";
	  }
}
	

function reload_profile_sessions(){	
	$conn = new mysqli("localhost", "root", "", "site" );
	$query = $conn->query("SELECT name, lastname, chat_name, age, gender, job FROM Potrebiteli WHERE username = '{$_SESSION['username']}';");
	$result = $query->fetch_assoc();
	$_SESSION['name'] = $result['name'];
	$_SESSION['lastname'] = $result['lastname'];
	$_SESSION['chat_name'] = $result['chat_name'];
	$_SESSION['age'] = $result['age'];
	$_SESSION['gender'] = $result['gender'];
	$_SESSION['job'] = $result['job'];
}
	
?>