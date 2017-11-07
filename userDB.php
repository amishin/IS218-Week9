<?php
	require_once('database.php');
	require_once('user.php');
class UserDB {

	public static function getUsers() {
		$db = Database::getDB();
		$query = 'Select * from accounts2';
		$statement = $db->prepare($query);
		$statement -> execute();
		$users = $statement->fetchAll();

		$results = array();
		foreach ($users as $user ) {
			$u = new User();
    		$u->setId($user['id']);
    		$u->setEmail($user['email']); 
    		$u->setFname($user['fname']);
    		$u->setLname($user['lname']);
    		$u->setPhone($user['phone']);
    		$u->setBirthday($user['birthday']);
    		$u->setGender($user['gender']);
    		$u->setPassword($user['password']);
    		array_push($results, $u);
    	}
    	return $results;
	} 

	public static function insertUser(){
		$db = Database::getDB();
		$query = 'insert into accounts2(id, email, fname, lname, phone, birthday, gender, password)';
		$statement = $db->prepare($query);
		$statement -> execute();
		$statement -> closeCursor(); 
	}

	public static function updatePassword(){
		$db = Database::getDB();
		$pass = 'newPassword';
		$id = 'Id';
		$query = 'update accounts2 set password = :pass where id = :id';
		$statement = $db->prepare($query);
		$statement -> execute();
		$statement -> closeCursor();
	}

	public static function deleteUser(){
		$db = Database::getDB();
		$id = 'Id';
		$query = 'delete from accounts2 where id = :id';
		$statement = $db->prepare($query);
		$statement -> execute();
		$statement -> closeCursor();
	}
}
?>