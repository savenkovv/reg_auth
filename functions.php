<?php
session_start();




function login($email, $password) {
	$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
	$sql = "SELECT * FROM reg WHERE email=:email";
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email]);
	$email = $statement->fetch(PDO::FETCH_ASSOC);

  	$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
	$sql = "SELECT * FROM reg WHERE password=:password";
	$statement = $pdo->prepare($sql);
	$statement->execute(['password' => $password]);
	$password = $statement->fetch(PDO::FETCH_ASSOC);

	if (empty($email) || empty($password)) {
		set_flash_message("danger", "Введен неправильный логин или пароль");
		return false;
	}
	else{
		$_SESSION['is_auth'];
		return true;
	}

	
};

function add_user($email, $password)
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
	$sql = "INSERT INTO reg (email, password) VALUES (:email, :password)";
	$statement = $pdo->prepare($sql);
	$statement->execute(['email' => $email, 'password' => $password ]);
};


function set_flash_message($name, $message)
{
	$_SESSION[$name] = $message;
};


function display_flash_message($name)
{
	if (isset($_SESSION[$name])){
		echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
		unset($_SESSION[$name]);
	}
};

function redirect_to($path)
{
	header("Location:".$path);
};











?>
