<?php
require 'Connection/connection.php';
$conn = Connect();

$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string($_POST['phno']);
$address = $conn->real_escape_string($_POST['address']);
$password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into user(username,email,phno,address,password) VALUES('" . $username . "','" . $email . "','" . $contact . "','" . $address ."','" . $password ."')";
$success = $conn->query($query);

if (!$success){
	die("Couldnt enter data: ".$conn->error);
    echo "error";
}

$conn->close();

?>


<div class="container">
	<div class="jumbotron" style="text-align: center;">
		<h2> <?php echo "Welcome $username!" ?> </h2>
		<h1>Your account has been created.</h1>
		<p>Click here to<a href="UserLogin.php">Login</a></p>
	</div>
</div>

    </body>
</html>