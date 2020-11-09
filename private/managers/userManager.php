<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}
function updateInventory(){
	$query = "SELECT money FROM users WHERE user_id = :user_id";
	$params = [
		':user_id' => $_SESSION['uid'],
	];
	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	$_SESSION['money'] = $record['money'];
	
	$query = "SELECT money FROM users WHERE user_id = :user_id";
	$params = [
		':user_id' => $_SESSION['uid'],
	];
	if(!empty($record)) {
		return true;
	}
	return false;

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

function userEdit($user_id, $username, $email, $permission) {
	$query = "SELECT user_id FROM users WHERE email = :email AND NOT user_id = :user_id";
	$params = [ ':email' => $email,
				':user_id' => $user_id
	 ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "UPDATE users SET user_name = :user_name,  email = :email, permission = :permission WHERE user_id = :user_id";
		$params = [
			":user_name" => $username,
			":email" => $email,
			":permission" => $permission,
			":user_id" => $user_id
		];
		return executeDML($query,$params);
	} 
	return false;
}
	function delUser($user_id){
		require_once DATABASE_CONTROLLER;
		$query = "DELETE FROM users WHERE user_id = :user_id";
		$params = [ ':user_id' => $user_id];
		return executeDML($query,$params);
	}
?>