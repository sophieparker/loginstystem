<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create a user</title>
</head>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

<body>
   
<?php
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	
	require_once('dbcon.php');
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	
    //Hash and salt the password
	$pw = password_hash($pw, PASSWORD_DEFAULT); 
    
    //Add the username and password to the db.
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?,?)';
	$stmt = $link->prepare($sql);
	$stmt->bind_param('ss', $un, $pw);
	$stmt->execute();
	
    //Checks if the statement is successful and returns either a confirmation of that fact or an error message. 
	if ($stmt->affected_rows >0){
		echo 'User: '.$un.' is added! Welcome.';
	}
	else {
		echo 'Error adding user '.$un.'. Does it already exist? If not, please try again.';
	}
}
?>

<p class="forms">
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Add new user</legend>
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input type="submit" name="submit" value="Create user" />
	</fieldset>
</form>
</p>



</body>
</html>