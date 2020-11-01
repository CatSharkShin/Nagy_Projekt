<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}

function UserLogin($email, $password) {
	$query = "SELECT user_id, user_name, email, permission FROM users WHERE email = :email AND password = :password";
	$params = [
		':email' => $email,
		':password' => sha1($password)
	];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['user_id'];
		$_SESSION['uname'] = $record['user_name'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['permission'] = $record['permission'];
		header('Location: index.php');
	}
	return false;
}

function UserRegister($email, $password, $username) {
	$query = "SELECT user_id FROM users WHERE email = :email";
	$params = [ ':email' => $email ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO users (user_name, email, password) VALUES (:user_name, :email, :password)";
		$params = [
			':user_name' => strip_tags($username),
			':email' => $email,
			':password' => sha1($password)
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?p=login');
	} 
	return false;
}

function userEdit($id, $username, $email, $permission) {
	$query = "SELECT user_id FROM users WHERE email = :email AND NOT id = :id";
	$params = [ ':email' => $email,
				':id' => $id
	 ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, permission = :permission WHERE id = :id";
		$params = [
			":fname" => $fname,
			":lname" => $lname,
			":email" => $email,
			":permission" => $permission,
			":id" => $id
		];
		return executeDML($query,$params);
	} 
	return false;
}
	function delUser($id){
		require_once DATABASE_CONTROLLER;
		$query = "DELETE FROM users WHERE id = :id";
		$params = [ ':id' => $id];
		return executeDML($query,$params);
	}
?>