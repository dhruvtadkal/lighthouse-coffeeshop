<?php require 'UserVerify.php'; ?>
<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
<!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:700|Poppins" rel="stylesheet">
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<style type="text/css">
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
  .brand-logo {
          position: absolute;
          color: #a5e9e1;
          display: inline-block;
          font-size: 2.1rem;
          padding: 0;
        }
  header{
          /* background: url(img/CO.jpg); */
          background-size: cover;
          background-position: center;
          /* min-height: 1000px; */
          /* background-color: #392f2f; */
          overflow: hidden;
          width: 90%;
        } */
        @media screen and (max-width: 670px){
          header{
            min-height: 500px;
          }
        }
</style>

<header>
        <nav class="nav-wrapper transparent">
          <div class="container">
            <a href="#" class="brand-logo white-text">Lighthouse</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-menu">
              <i class="material-icons black-text">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
              <li><a href="Menu.php" class="white-text">Menu</a></li>
              <?php
                if (!isset($_SESSION['login_user2'])) {
              ?>
              <li><a href="UserLogin.php" class="white-text">Login</a></li>
              <?php } ?>
              <li><a href="#about" class="white-text">About Us</a></li>
              <?php
                if (isset($_SESSION['login_user2'])) {
              ?>
              <li><a href="#"><span class="black-text"></span> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>
              <li><a href="cart.php" class="btn grey darken-4"><span class="material-icons">shopping_cart</span>
              <?php
                if(isset($_SESSION["cart"])){
                  $count = count($_SESSION["cart"]); 
                  echo "$count"; 
                }
                else
                  echo "0";
                }
              ?> </a></li>
              <li><a href="LogOut.php"><span class="black-text"></span> Log Out </a></li>
              
            </ul>
            <ul class="sidenav grey lighten-2 indigo-text" id="mobile-menu">
              <li><a href="#" class="indigo-text">Menu</a></li>
              <li><a href="#" class="indigo-text">Offers</a></li>
              <li><a href="#" class="indigo-text">About Us</a></li>
            </ul>
          </div>
        </nav>
</header>

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