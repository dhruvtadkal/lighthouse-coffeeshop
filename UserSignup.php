<!DOCTYPE html>
<html>
<head>
    <!-- <link rel="stylesheet" href="styles.css"> -->
<style>
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    font: bold;
}

body {
    overflow: hidden;
}

section
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    /* background: linear-gradient(to top,rgb(17, 17, 65),rgb(107, 230, 148));  */
    background: linear-gradient(to right, rgb(67, 198, 172), rgb(25, 22, 84)); 
}

section .color 
{
    position: absolute;
    filter: blur(150px);
}

section .color:nth-child(1)
{
    top: -350px;
    width: 600px;
    height: 600px;
    background:  #516395;
}

section .color:nth-child(2)
{
    bottom: -150px;
    left: 100px;
    width: 500px;
    height: 500px;
    background: rgb(67, 198, 172);
}

section .color:nth-child(3)
{
    bottom: 50px;
    left: 100px;
    width: 500px;
    height: 500px;
    /* background: #00d2ff; */
    background: rgb(67, 198, 172);
}

.box
{
    position: relative;
}

.container
{
    position: relative;
    width: 400px;
    min-height: 400px;
    background: rgba(225,225,225,0.1);
    border-radius: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    backdrop-filter: blur(5px);
    box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    border: 1px solid rgba(225,225,225,0.1);
    border-right: 1px solid rgba(225,225,225,0.2);
    border-bottom: 1px solid rgba(225,225,225,0.2);
    animation: animate 10s linear infinite;
    animation-delay: 1s;
}

/* @keyframes animate
{
    0%,100%
    {
        transform: translateY(-50px);
    }
    50%
    {
        transform: translateY(50px);
    }
} */

.form
{
    position: relative; 
    width: 100%;
    height: 100%;
    padding: 40px;
}

.form h2
{
    position: relative;
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 40px;
}

/*

.form h2::before
{
    content: '';
    position: absolute;
    left: 0;
    bottom: -10px;
    width: 80px;
    height: 4px;
    background: #fff;
}

*/

.form .inputBox
{
    width: 100%;
    margin-top: 20px;
}

.form .inputBox input
{
    width: 100%;
    background: rgba(225,225,225,0.2);
    border: none;
    outline: none;
    padding: 10px 20px;
    border-radius: 35px;
    border: 1px solid rgba(225,225,225,0.5);
    border-right: 1px solid rgba(225,225,225,0.2);
    border-bottom: 1px solid rgba(225,225,225,0.2);
    font-size: 16px;
    letter-spacing: 1px;
    color:#fff;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.form .inputBox input::placeholder
{
    color: #fff;
}

.form .inputBox input[type="submit"]
{
    color: #fff;
    max-width: 100px;
    cursor: pointer;
    margin-bottom: 20px;
    font-weight: 600;
}

.sign
{
    margin-top: 15px;
    margin-left: 5px;;
    color: #fff;
}

.sign a
{
    color: #fff;
    font-weight: 600;
}
</style>
</head>

<body>
<?php

include('Connection/connection.php');
$conn = Connect();

$username = $email = $phno = $address = $password = '';
	$errors = array('username' => '', 'email' => '', 'phno' => '', 'address' => '', 'password' => '');

if(isset($_POST['submit'])){
		
    // check username
    if(empty($_POST['username'])){
      $errors['username'] = 'Enter the username';
    }else{
        $username = $_POST['username'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $username)){
            $errors['username'] = 'Username must be letters and spaces only';
        }
    }

	// check email
	if(empty($_POST['email'])){
		$errors['email'] = 'An email is required';
	} else{
		$email = $_POST['email'];
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = 'Email must be a valid email address';
		}
	}

	// check phone
	if(empty($_POST['phno'])){
		$errors['phno'] = 'Enter a phone number';
	} else{
        $phno = $_POST['phno'];
        if(!preg_match('/^[0-9]*$/', $phno)){
            $errors['phno'] = 'Phone number must be only numbers';       
        } 
    }

    // check address
    if(empty($_POST['address'])){
        $errors['address'] = 'Enter an address';
    }

    // check password
    if(empty($_POST['password'])){
        $errors['password'] = 'Enter a password';
    }

	if(array_filter($errors)){
		//echo 'Errors in the form';
	} else {
		// escape sql chars
        $username = mysqli_real_escape_string($conn, $_POST['username']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$phno = mysqli_real_escape_string($conn, $_POST['phno']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); 

        $query = "INSERT into user(username,email,phno,address,password) VALUES('" . $username . "','" . $email . "','" . $phno . "','" . $address ."','" . $password ."')";
        $success = $conn->query($query);

        if (!$success){
	        //die("Couldnt enter data: ".$conn->error);
            echo "error";
        }else{
            // echo "<script>alert('Signup successful!');</script>";
            // sleep(5);
            // header("Location: UserLogin.php");
            header('Refresh:3; url=UserLogin.php');
            echo 'Sign up successful';
        }

        $conn->close();

        $username = "";
        $email = "";
        $phno = "";
        $address = "";
        $password = "";
    }

}
?>

    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2 style="text-align:center;">SignUp for Free</h2>
                    <form action="UserSignup.php" method="POST">
                        <div class="inputBox">
                            <input type="text" name="username" placeholder="Username" id="username" value="<?php echo htmlspecialchars($username) ?>">
                            <div class="red-text"><?php echo $errors['username']; ?></div>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="email" placeholder="Email" id="email" value="<?php echo htmlspecialchars($email) ?>">
                            <div class="red-text"><?php echo $errors['email']; ?></div>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="phno" placeholder="Phone no" id="phno" value="<?php echo htmlspecialchars($phno) ?>">
                            <div class="red-text"><?php echo $errors['phno']; ?></div>
                        </div>
                        <div class="inputBox">
                            <input type="text" name="address" placeholder="Address" id="address" value="<?php echo htmlspecialchars($address) ?>">
                            <div class="red-text"><?php echo $errors['address']; ?></div>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Password" id="password" value="<?php echo htmlspecialchars($password) ?>">
                            <div class="red-text"><?php echo $errors['password']; ?></div>
                        </div>
                        <div class="btn btn-primary inputBox" style="text-align:center;">
                            <input type="submit"  value="Submit" name="submit">
                        </div>
                        <p class="sign">Already a member? <a href="UserLogin.php"> Click Here To login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>    
</html>