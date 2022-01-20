<style>
  table{
    margin-top: 70px;
    border-collapse:collapse;
    text-align:left;
    font-size:1.2rem;
    background-color:white;
    padding-left:50px;
    padding-right:50px;
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
  /* tr:nth-child(even){
    background-color:#e3f2fd;
  } */
</style>

<?php
    // $_SESSION['cart'] = false;
    // include('order_details.php');
    require 'Connection/connection.php';
    $conn = Connect();

    session_start();
    if(!isset($_SESSION['login_user2'])){
    header("location: customerlogin.php"); 
    }


$db = $conn;
// fetch query
function fetch_data(){
  global $db;
  $query="SELECT * from orders ORDER BY F_ID DESC";
  $exec=mysqli_query($db, $query);
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
 echo '<table>
        <tr style="color:white;">
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

$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $F_ID = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $R_ID = $values["R_ID"];
    $username = $_SESSION["login_user2"];
    $order_date = date('Y-m-d');
    
    $gtotal = $gtotal + $total;

      
  }

?>

<h3 style="text-align:center; color:white;">Grand Total: &#8377;<?php echo "$gtotal"; ?>/-</h3>