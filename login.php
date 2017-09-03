<?php session_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
</head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
<body>

<?php
//check if the input is NOT empty and checks if the username and password matches the info in database. 
//If it does; it logs in. If not it returns an error message
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	require_once('dbcon.php');
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	$sql = 'SELECT idUsers, pwhash FROM Users WHERE username=?';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	while ($stmt->fetch()) {} // fill result variables
	
	if (password_verify($pw, $pwhash)){
		echo 'Logged in as user '.$uid. '.';
		$_SESSION['uid'] = $uid;
		$_SESSION['un'] = $un;
	}
	else {
		echo 'illegal username/password combination';
	}
}
?>

<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Login</legend>
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input type="submit" name="submit" value="Login" />
	</fieldset>
</form>
</p>



</body>
</html>