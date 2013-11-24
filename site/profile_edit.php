<?php
include_once "./site_library.php";

session_start();
if( !isset( $_SESSION["username"] ) ){
	exit("Please, login first.");
}

if( isset( $_POST["isSent"] ) ){

	$conn = new mysqli("localhost", "root", "", "site");
	$str = "UPDATE Potrebiteli SET chat_name='{$_POST['chatName']}', name='{$_POST['name']}', lastname='{$_POST['lastname']}', gender='{$_POST['gender']}', age={$_POST['age']} WHERE username='{$_SESSION['username']}';";
	$query = $conn->query($str);
	avatar_file_check_and_upload("avatar");
	reload_profile_sessions();
}

?>	


<html>
<head>
<style>
	fieldset{
		display: inline-block;
		background-color: green;
	}
	input{
		display: block;
		}
</style>

<link rel="stylesheet" type="text/css" href="MyStyle.css">


<title><?php echo $_SESSION["username"]."'s profile"; ?></title>

</head>

<body>
<form method="post" action="./profile_edit.php" enctype="multipart/form-data">
<fieldset>	
	<input type="hidden" name="isSent" value="10" />
	<label for='chatName' >Chat name: </label>
	<input type="text" name="chatName" value="<?php echo $_SESSION['chat_name'] ?>"/>
	<label for='name' >First name: </label>
	<input type="text" name="name" value="<?php echo $_SESSION['name']; ?>" />
	<label for='lastname' >Last name: </label>
	<input type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>"/>
	<label for='age' >Age: </label>
	<input type="text" name="age" value="<?php echo $_SESSION['age']; ?>"/>
	<label for='gender' >Gender: </label>
	<input type="text" name="gender" value="<?php echo $_SESSION['gender']; ?>"/>
	<label for='avatar' >Avatar: </label>
	<input type="file" name="avatar">
	<input type="submit" value="Edit Profile" />
</fieldset>
</form>
</body>

</html>