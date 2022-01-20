<?php
session_start();
require 'Connection/connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: UserLogin.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Poppins" rel="stylesheet">

    <title>Document</title>
    <style>
    .boxx{
        border: 1px black;
        max-width: 460px;
  		margin: 20px auto;
  		padding: 20px;
    }
    h2{
        font-family: "Poppins", sans-serif;
    }
    p{
        display: inline-flex;
        align-items: center;
        font-size:50px;
        height: 90px;
        width: 200px;
        justify-content: center;
        background-color:white;
        color:black;
    }
    .order{
        background: url(img/order.jpeg); 
        background-size: cover;
        background-position: center;
        min-height: 1000px;
        overflow: hidden;
        width: 100%;
        color:white;
    }
    </style>

</head>

<!-- bgcolor="#d7c1e0" -->
<body>
    <div class="order">
    <div class="container center">
        <div class="boxx">
            <h2>Order placed successfully!</h2>
        </div>
    </div>
    <div class="container center">
        <h4>Your order will be ready in:</h4>
        <p id="countdown">10:00</p>
    </div>
    <div class="container center">
        <h3 id="unique"></h3>
        <h5>is your unique id. Please refer to this at the cafe to receive your order.</h5>
        <div class="boxx">
            <h4>Thank you for ordering from LightHouse</h4>
        </div>
    </div>
    <div class="container center" style="margin-top:30px; letter-spacing:50px; margin-bottom:20px;">
        <button class="btn indigo darken-4" onClick="location.href='web_index.php'">
            <span>Homepage<i class="material-icons right">home</i></span>
        </button>
        <button class="btn indigo darken-4" id="view">
            <span>Order details<i class="material-icons right">format_list_bulleted</i></span>
        </button>
    </div>
    <div id="table-container" style="color:black;"></div>
    </div>    

<!-- <?php
    // $_SESSION['cart'] = false;
    // include('order_details.php');

// fetch query
function fetch_data(){
  global $conn;
  $query="SELECT * from orders ORDER BY F_ID DESC";
  $exec=mysqli_query($conn, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
 echo '<table border="1">
        <tr>
            <th>order_ID</th>
            <th>F_ID</th>
            <th>Foodname</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Order date</th>
            <th>username</th>
            <th>R_ID</th>
            <th>Total</th>
        </tr>';
 if(count($fetchData)>0){
    $sn=1;
    foreach($fetchData as $data){ 
        echo "<tr>
          <td>".$sn."</td>
          <td>".$data['F_ID']."</td>
          <td>".$data['foodname']."</td>
          <td>".$data['price']."</td>
          <td>".$data['quantity']."</td>
          <td>".$data['order_date']."</td>
          <td>".$data['username']."</td>
          <td>".$data['R_ID']."</td>
          <td>".$data['Total']."</td>
        </tr>";
        $sn++; 
    }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}

?> -->

<script>
    const startingMinutes = 10;
    let time = startingMinutes * 60;

    const countdownEl = document.getElementById('countdown');

    setInterval(updateCountdown, 1000);

    function updateCountdown(){
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;

        seconds = seconds < 10 ? '0' + seconds : seconds;

        countdownEl.innerHTML = `${minutes} : ${seconds}`;
        time--;
    }

    document.getElementById("unique").innerHTML =
    Math.floor(Math.random() * 10000);

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="ajax.js"></script>

</body>
</html>
