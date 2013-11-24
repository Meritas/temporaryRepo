<?php
include_once "./site_library.php";
session_start();
if( !isset( $_SESSION["username"] ) ){
	exit("Please, login first.");
}
?>	

<!DOCTYPE html>
<html>

<head>

	<link rel="stylesheet" type="text/css" href="MyStyle.css">


<title><?php echo $_SESSION["username"]."'s profile"; ?></title>

</head>


<body>
<?php includeJS(); ?>

	<div id="mainContainer">
	<div id="main">
		<div id = "SearchLeftChat">
			<div id="logoutBut">
				<span>Logout</span>
			</div>
		</div>
		<div id = "WholePage">
			<div id = "HideBut"></div>
			<div id = "UpperPage">
				<div id = "AvatarBox"></div>					
				<div id = "NameBox">
					<span><?php echo "{$_SESSION['name']} {$_SESSION['lastname']}"; ?> </span>
				</div>
				<div id = "PlaceBox"></div>
				<!-- <div id = "CircleBox"></div> -->	
			
			</div>
			
			<div id = "DownPage">
				<div id = "listContainer">
					<ul class = "elementList" style="text-align: center">
						<li id = "JournalBox" >Journal</li>
						<li id = "PicturesBox" >Pictures</li>
						<li id = "NotesBox" >Notes</li>
					</ul>
					<ul class="elementList" style="text-align: center">
						<li id = "FriendsBox" >Friends</li>
						<li id = "LikedPagesBox" >Liked Pages</li>
						<li id = "ChatRoomBox" >Chat Room</li>
					</ul>
				</div>	
				<div id = "ContactInformationBox"></div>
				
			</div>
	</div>
	



</body>


</html>



<?php
?>