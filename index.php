<?php
	require_once('database.php');
	require_once('userDB.php');
	require_once('user.php');
	$users = UserDB::getUsers();
	$users2 = UserDB::updatePassword();

?>
<html>
	<head>
		<title>Week 9 Assignmnet</title>
	</head>
	<body>
		<table border="1">
			<?php echo User::displayHeader(); ?>
			<?php foreach ($users as $user) : ?>
				<?php echo $user->display(); ?>
			<?php endforeach; ?>		
		</table> 
	</body>		
</html>