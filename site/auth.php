<?php

include_once "./site_library.php";

if( !isset($_POST["isSubmitted"]) ){ 
	echo('
		<form action="auth.php" method="post" accept-charset="UTF-8">
			 <fieldset>
				<input type="hidden" name="isSubmitted" />
				<input type="text" name="username" />
				</br>
				<input type="password" name="pass" />
				</br>
				<input type="submit" value="Log in" />
			</fieldset>
		</form>	
	');
}
else {
	login( $_POST['username'], $_POST['pass'] );
}
?>