<html>
<body style="margin: 100px">
<h1> PROCESS 3 PAGE </h1>
<?php

$username = $_GET["username"];
$password = $_GET["password"];

$conn = new mysqli("localhost", "huy", "huy", "sqlinjection");

// ESCAPING PARAMETERS:
$username_s = $conn->real_escape_string($username);
$password_s = $conn->real_escape_string($password);

// CONSTRUCTING QUERY
$sql = "SELECT * FROM Users WHERE Users.username = '" .
 $username_s . "'AND Users.password = '" . $password_s . "'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<h3>Welcome " . $row["username"]. "!</h3>";
        break;
    }
} else {
    echo "<h3>Authentication failed!</h3>";
}

$conn->close();
?>
</br><a href="index3.php"><button>Back</button></a>

<h2> NOTE </h2>
	<ul>
		<li><b> Username: </b><?php echo $username?> <b> --> </b> <?php echo $username_s?></li>
		<li><b> Password: </b><?php echo $password?> <b> --> </b> <?php echo $password_s?></li>
		<li><b> SQL Statement: </b><?php echo $sql?></li>
	</ul>
</body>
</html>