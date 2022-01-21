<?php
session_start();
require 'Connection/connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: UserLogin.php"); 
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
  table{
    margin-top: 70px;
    border-collapse:collapse;
    text-align:left;
    font-size:1.2rem;
    box-shadow:20px 20px 20px 5px #a7bad3;
    background-color:white;
  }
  th{
    background-color:#1a237e;
    padding:0.75rem 2rem;
    text-transform:uppercase;
    letter-spacing:0.1rem;
    font-weight:900;
  }
  td{
    padding:1rem 2rem;
  }
  .but{
    margin-top:40px;
    text-align:center;
  }
  tr:nth-child(even){
    background-color:#e3f2fd;
  }
  
</style>
<!-- bgcolor="#fff4e3" -->
<!-- style="background-image: url('img/A.jpg');" -->
<body bgcolor="#dee1ec">
<?php
if(!empty($_SESSION["cart"]))
{
  ?>
  <div class="container">  
    <h1>Your Cart</h1> 
  </div>
<div class="table-responsive" style="padding-left: 100px; padding-right: 100px;">  <!--style="padding-left: 100px; padding-right: 100px;" -->
<table class="table table-striped">
<thead class="thead-dark">
<tr class="white-text">
<th width="30%">Food Name</th>
<th width="10%">Quantity</th>
<th width="20%">Price Details</th>
<th width="20%">Order Total</th>
<th width="10%"></th>
</tr>
</thead>


<?php  

$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
?>
<tr>
<td><?php echo $values["food_name"]; ?></td>
<td><?php echo $values["food_quantity"] ?></td>
<td>&#8377; <?php echo $values["food_price"]; ?></td>
<td>&#8377; <?php echo number_format($values["food_quantity"] * $values["food_price"], 2); ?></td>
<td><a href="cart.php?action=delete&id=<?php echo $values["food_id"]; ?>"><span class="text-danger">Remove</span></a></td>
</tr>
<?php 
$total = $total + ($values["food_quantity"] * $values["food_price"]);
}
?>
<tr>
<td colspan="3" align="right" style="font-weight:900;">Total</td>
<td style="font-weight:750; align="right">&#8377; <?php echo number_format($total, 2); ?></td>
<td></td>
</tr>
</table>
</div>
<div class="but">
<?php
  echo '<a href="cart.php?action=empty"><button class="btn grey darken-4"> Empty Cart <i class="material-icons right">delete</i></button></a>&nbsp;<a href="Menu.php"><button class="btn grey darken-4">Continue Shopping <i class="material-icons right">restaurant</i></button></a>&nbsp;<a href="cart.php?action=order"><button class="btn grey darken-4 pull-right">Place Order <i class="material-icons right">done</i></button></a>&nbsp';
  echo '<a href="index.php"><button class="btn grey darken-4 pull-right">Homepage <i class="material-icons right">home</i></button></a>';
?>
</div>
<br><br><br><br><br><br><br>
<?php
}
if(empty($_SESSION["cart"]))
{
  ?>
  <div class="container">
      <div class="jumbotron">
        <h1>Your Cart</h1>
        <h5>Looks like the cart is empty. Go back and <a href="Menu.php">Order Now!</a></h5>
        
      </div>
      
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <?php
}
?>

<?php

if(isset($_POST["add"]))
{
  echo '<script>alert("Item added to cart")</script>';
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "food_id");
if(!in_array($_GET["id"], $item_array_id))
{
$count = count($_SESSION["cart"]);

$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["hidden_RID"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][$count] = $item_array;
echo '<script>window.location="cart.php"</script>';
}
else
{
echo '<script>alert("Products already added to cart")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
else
{
$item_array = array(
'food_id' => $_GET["id"],
'food_name' => $_POST["hidden_name"],
'food_price' => $_POST["hidden_price"],
'R_ID' => $_POST["hidden_RID"],
'food_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}
if(isset($_GET["action"]))
{
if($_GET["action"] == "delete")
{
foreach($_SESSION["cart"] as $keys => $values)
{
if($values["food_id"] == $_GET["id"])
{
unset($_SESSION["cart"][$keys]);
echo '<script>alert("Item has been removed")</script>';
echo '<script>window.location="cart.php"</script>';
}
}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "empty")
{
foreach($_SESSION["cart"] as $keys => $values)
{

unset($_SESSION["cart"]);
echo '<script>alert("Cart is made empty!")</script>';
echo '<script>window.location="cart.php"</script>';

}
}
}

if(isset($_GET["action"]))
{
if($_GET["action"] == "order")
{
  $user = $_SESSION["login_user2"];

  // $item_array = array(
  //   'food_id' => $_GET["id"],
  //   'food_name' => $_POST["hidden_name"],
  //   'food_price' => $_POST["hidden_price"],
  //   'R_ID' => $_POST["hidden_RID"],
  //   'food_quantity' => $_POST["quantity"]
  // );

  $F_ID = $values["food_id"];
  $foodname = $values["food_name"];
  $price = $values["food_price"];
  $quantity = $values["food_quantity"];
  $R_ID = $values["R_ID"];
  
  $sql = "INSERT INTO orders(F_ID,foodname,price,quantity,order_date,username,R_ID,Total) VALUES('$F_ID','$foodname','$price','$quantity',current_timestamp(),'$user','$R_ID','$total')";

  if(mysqli_query($conn, $sql)){
    echo 'success';
    //echo '<script>alert("Form submitted successfully!")</script>';
    //header('Location: index.html');		//redirect to a different page
    sleep(3);
    echo '<script>window.location="order.php"</script>';
  } else {
    echo 'query error: '. mysqli_error($conn);
  }

}
}

?>
<?php

?>

</body>
</html>