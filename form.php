<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Poppins" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <title>Light House</title>
    <style>
        .content-wrapper{
            width: 80%;
            margin: 4% 10% 5% 10%;
        }
        .text-wrapper{
            width: 100%;
            position: relative;
            margin-top: -40%;
        }
        .text-wrapper h1{
            text-align: center;
            color: #ffffff;
            font-size: 10vw;
            font-family: 'lobster',cursive;
        }
        @media screen and (max-width: 670px){
          header{
            min-height: 500px;
          }
        }
        .section{
          padding-top: 4vw;
          padding-bottom: 4vw;
          width: 450px;
        }
        h3{
          width: 100%;
          font-family: "Poppins", sans-serif;
          text-align: center;
        }
    </style>
</head>
<body bgcolor="#fff4e3">

<?php 
	include('Connection/connection.php');
  $conn = Connect();

	$id = $email = $name = $DOB = $notification = '';
	$errors = array('id' => '', 'email' => '', 'name' => '', 'DOB' => '', 'notification' => '');

	if(isset($_POST['submit'])){
		
    // check id
    if(empty($_POST['id'])){
      $errors['id'] = 'Enter an ID';
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

		// check name
		if(empty($_POST['name'])){
			$errors['name'] = 'Enter a name';
		} else{
			$name = $_POST['name'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $name)){
				$errors['name'] = 'Name must be letters and spaces only';
			}
		}

      // check date
      if(empty($_POST['DOB'])){
        $errors['DOB'] = 'Select a date of birth';
      }

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			// escape sql chars
      $id = mysqli_real_escape_string($conn, $_POST['id']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
      $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
      $notification = mysqli_real_escape_string($conn, $_POST['notification']);
      //checkbox
      $var = $_POST['notification'];
      if(isset($var)){
        $notification = 'YES';
      }
      else{
        $notification = 'NO';
      }

			// create sql
			$sql = "INSERT INTO contact(id,email,name,DOB,notification) VALUES('$id','$email','$name','$DOB','$notification')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
        echo '<script>alert("Form submitted successfully!")</script>';
				//header('Location: index.html');		//redirect to a different page
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

		}
    $id = "";
		$email = "";
		$name = "";
    $DOB = "";
    $notification = "";
  } // end POST check
?>
<h3>Connect with us</h3>
<section class="section container scrollspy" id="contact">
    <div class="row"> 
        <form action="form.php" method="POST">
          <div class="input-field">
            <i class="material-icons prefix">portrait</i>
            <input type="text" name ="id" id="id" value="<?php echo htmlspecialchars($id) ?>">
            <label for="id">ID</label>
            <div class="red-text"><?php echo $errors['id']; ?></div>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">email</i>
            <input type="text" name ="email" id="email" value="<?php echo htmlspecialchars($email) ?>">
            <label for="email">Email</label>
            <div class="red-text"><?php echo $errors['email']; ?></div>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">person</i>
            <textarea id="name" name="name" class="materialize-textarea" cols="20" rows="20" value="<?php echo htmlspecialchars($name) ?>"></textarea>
            <label for="message">Name</label>
            <div class="red-text"><?php echo $errors['name']; ?></div>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">date_range</i>
            <input type="text" id="DOB" name ="DOB" class="datepicker" value="<?php echo htmlspecialchars($DOB) ?>">
            <label for="DOB">Enter your DOB</label>
            <div class="red-text"><?php echo $errors['DOB']; ?></div>
          </div>
          <div class="input-field">
            <i class="material-icons prefix">reviews</i>
            <textarea id="review" name="review" class="materialize-textarea" cols="40" rows="40"></textarea>
            <label for="message">Your reviews on Lighthouse</label>
          </div>
          <div class="input-field">
            <p>Do you want to receive emails about new products and offers?</p>
            <p>
              <label>
                <input type="checkbox" name="notification">
                <span>Yes!</span>
              </label>
            </p>
          </div>
          <div class="input-field center">
            <button class="btn indigo darken-4" name="submit">
              <span>Submit</span>
              <i class="material-icons right">send</i>
            </button>
          </div>
          <div class="input-field center">
          <a href="index.php" class="btn indigo darken-4" name="home">
            <span>Homepage</span>
            <i class="material-icons right">home</i>
          </a>
          </div>
        </form>
    </div>
</section>
<!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
            $('.materialboxed').materialbox();
            $('.parallax').parallax();
            $('.tabs').tabs();
            $('.datepicker').datepicker({
                //disableWeekends: true,
                //yearRange: 1
            });
            $('.tooltipped').tooltip();
            $('.scrollspy').scrollSpy();
        });
    </script>
</body>
</html>