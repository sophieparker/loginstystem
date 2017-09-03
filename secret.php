<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>You are now logged in</title>  
</head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">


<body>
    <p>
<?php
//Checks the statement of the session and displays "secret" info if logged in. If not, returns an echo. 
	if (!empty($_SESSION['uid'])){
		echo 'Logged in as user '.$_SESSION['un'];
		echo '<br> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
	}
	else {
		echo 'Not logged in...';
	}
	
?>
    </p>
    
    <a href="logout.php" type="btn">Log Out</a>
</body>
</html>