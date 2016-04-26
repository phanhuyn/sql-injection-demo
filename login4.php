<html>
<body style="margin: 100px">
<h1> PROCESS 4 PAGE </h1>

<?php
$username = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  echo $username . ', ' . $password . '</br>';
}

// USING PDO
$conn = new PDO('mysql:dbname=sqlinjection;host=127.0.0.1;charset=utf8', 'huy', 'huy');
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// PARAMETERIZED
$stmt = $conn->prepare("SELECT * FROM Users 
	WHERE Users.username = :username AND Users.password = :password");
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();

if ($stmt->rowCount() > 0) {
	foreach ($stmt as $row) {
	    echo "<h3>Welcome " . $row["username"]. "!</h3>";
        break;
	}
} else {
	echo "<h3>Authentication failed!</h3>";
}

$conn = null;
?>

</br><a href="index4.php"><button>Back</button></a>

<h2> NOTE </h2>
	<ul>
		<li><b> Username: </b><?php echo $username?></li>
		<li><b> Password: </b><?php echo $password?></li>
	</ul>
</body>
</html>
