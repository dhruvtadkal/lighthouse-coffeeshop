<?php
include('UserVerify.php'); 

//if(isset($_SESSION['login_user2'])){
//header("location: Menu.php"); 
//}
?>

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
    <section>
        <div class="color"></div>
        <div class="color"></div>
        <div class="color"></div>
        <div class="box">
            <div class="container">
                <div class="form">
                    <h2 style="text-align:center;">Login</h2>
                    <form action="" method="POST">
                        <div class="inputBox">
                            <input type="text" name="username" placeholder="Username" id="username">
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" placeholder="Password" id="password">
                            <div class="red-text"><?php echo $error; ?></div>
                        </div>
                        <div class="btn btn-primary center inputBox" style="text-align:center;">
                            <input type="submit"  value="Login" name="submit">
                        </div>
                        <p class="sign">Not a member yet? <a href="UserSignUp.php">  Click Here To SignUp</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>    
</html>
<!-- onClick="location.href='index.php'" -->