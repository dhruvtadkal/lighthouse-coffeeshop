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
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
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
            font-family: "lobster", cursive;
        }
        @media screen and (max-width: 670px){
          header{
            min-height: 500px;
          }
        }
        .section{
          padding-top: 4vw;
          padding-bottom: 4vw;
        }
        .tabs .indicator{
          background-color: #1a237e;
        }
        .tabs .tab a:focus, .tabs .tab a:focus.active{
            background: transparent;
        }
        .logo{
            padding: 1px;
        }
        .front{
          background: url(img/CO.jpg); 
          background-size: cover;
          background-position: center;
          min-height: 1000px;
          overflow: hidden;
          width: 100%;
          font-family: "Poppins", sans-serif;
        }
        /*o*/
        .main-title {
        position: absolute;
        top: 40%;
        left: 48%;
        font-size: 7.5rem;
        transform: translate(-50%, -30%);
        color:white;
        }
        .quote{
          background: url(img/quote.jpeg);
          background-size: cover;
          background-position: center;
          min-height: 800px;
          overflow: hidden;
          width: 100%;
        } 
        .quote-title{
          font-family: "Lobster", sans-serif;
          position: absolute;
          /* top: 60%;*/
          left: 29%;
          font-size: 6.1rem;
          color:black;
          margin-top:110px;
        }
        .quote-title2{
          font-family: "Lobster", sans-serif;
          position: absolute;
          /* top: 60%;*/
          left: 29%;
          font-size: 5.4rem;
          color:black;
          margin-top:670px;
        }
    </style>
</head>
<!-- #fffde7 -->
<!-- #d7c1e0 -->
<!-- #a5e9e1 -->
<!-- <body bgcolor="#e6d3a7"> -->
<body bgcolor="#fff4e3">
  <div class="front">
    <!--navbar-->
    <?php include('Parts/header.php'); ?>
  
    <!--front page-->
    <h2 class="main-title">Lighthouse Cafe</h2>
  </div>

  <!-- Quote -->
  <div class="section">
  <div class="quote">
    <h3 class="quote-title">A Grab N Go Café</h3>
    <h3 class="quote-title2">Brewing since 2020</h3>
  </div>
  </div>

  <!--Cards-->
  <div class="container">
    <h2>Our Latest Inventions</h2>
    <div class="row">
      <div class="col s12 l4">
        <div class="card">
          <div class="card-image">
            <img src="img/8)Iced Coffee.jpg" alt="">
            <a href="" class="halfway-fab btn-floating pink pulse">
              <i class="material-icons">favorite</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Iced Coffee</span>
            <p> Freshly brewed Iced Coffee Blend served chilled and sweetened over ice. An absolutely, seriously, refreshingly lift to any day.</p>
          </div>
          <div class="card-action">
            <a href="Menu.php">Order now</a>
          </div>
        </div>
      </div>
      <div class="col s12 l4">
        <div class="card">
          <div class="card-image">
            <img src="img/4)Latte.jpeg" alt="">
            <a href="" class="halfway-fab btn-floating pink pulse">
              <i class="material-icons">favorite</i>
            </a>
          </div>
          <div class="card-content">
            <span class="card-title">Latte</span>
            <p>Our dark, rich espresso balanced with steamed milk and a light layer of foam. A perfect milk-forward warm-up to start your day. </p>
          </div>
          <div class="card-action">
            <a href="Menu.php">Order now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- parallax -->
  <div class="parallax-container">
    <div class="parallax">
      <img src="img/do2.jpg" alt="" class="responsive-img">
    </div>
  </div>

  <!-- photo / grid -->
  <section class="container section" id="photos">
    <div><h2 class="text-darken-4 section">Happy Customers :)</h2></div>
    <div class="row">
      <div class="col s12 l4">
          <img src="img/dog.jpeg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 offset-l1">
        <h4 class="indigo-text text-darken-4">Bolt,2</h4>
        <p>Woof! Hooman gib me the pup cup!</p>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4 offset-l1 push-l7">
          <img src="img/cus2.jpg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 offset-l1 pull-l5 right-align">
        <h4 class="indigo-text text-darken-4">Erin,23</h4>
        <p>The best place in town for all your coffee needs. Excellent taste!</p>
      </div>
    </div>
    <div class="row">
      <div class="col s12 l4">
          <img src="img/cus3.jpg" alt="" class="responsive-img materialboxed">
      </div>
      <div class="col s12 l6 offset-l1">
        <h4 class="indigo-text text-darken-4">Lily,24</h4>
        <p>The only place I trust for getting coffee. Best service and beautiful coffee. Just PERFECT!</p>
      </div>
    </div>
  </section>

<!-- contact form -->
<section class="section container scrollspy" id="contact">
    <div class="row">
        <h2 class="indigo-text text-darken-4">Stay connected...</h2>
        <p>Our bond with our customers is beyond the coffee we serve. We look forward to serving you the best and only the best, and we appreciate the feedback you give us.</p>
        <p>Do leave a review on our social media pages!</p>
    </div>
    <div class="row" style="margin-bottom:100px;">
      <a href="form.php" class="btn indigo darken-4" name="register">
        <span>Register Now!</span>
        <i class="material-icons right">how_to_reg</i>
      </a>
    </div>
</section>


<!-- footer -->
<footer class="page-footer grey darken-3 scrollspy" id="about">
  <?php include('Parts/contact.php'); ?>  
  <?php include('Parts/footer.php'); ?>
</footer>

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