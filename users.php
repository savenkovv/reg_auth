<?php
session_start();
require "functions.php";
	$pdo = new PDO("mysql:host=localhost;dbname=marlin", "admin","");
  $sql = "SELECT * FROM reg";
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $users = $statement->fetchAll(PDO::FETCH_ASSOC);


?>
<?php foreach ($users as $user): ?>
<div class="wrap" style="display: flex;">
	<div class="id"><?php echo $user['id'];?></div>
	<div class="email"><?php echo '_' . $user['email'];?></div>
	<div class="password"><?php echo '_' . $user['password'];?></div>
</div><hr>
<? endforeach; ?>
<?php
if (isset($_SESSION['is_auth'])) {
	echo "СЕССИЯ ЗАПУЩЕНА"."<br>";
}
else {
	echo "NO"."<br>";
}

?>

<a href="login.php">Назад</a>