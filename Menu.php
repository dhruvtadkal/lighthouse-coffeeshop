<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: UserLogin.php");  
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Menu </title>
        <!-- AngularJS -->
        <script src="D:\Dhruv\Programs\AngularJS\app\lib\angular.min.js"></script>
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!--Main CSS-->
<style>
*
{
    margin: 0;
    padding:0;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;5
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
   /*  background-image: url(img/Dark.jpg); */
    background-color: #1A2930;
    background-size: cover;
    background-position: center center;
    background-attachment: fixed;
    color: white;
}

.container
{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    margin: 40px 0;
}

.container .card
{
    position: relative;
    width: 300px;
    height: 400px;
    margin: 20px;
    overflow: hidden;
    border-radius: 1rem;
    border: 1px solid transparent;

    backdrop-filter: blur(1rem);
    box-shadow: 1.3rem 1.3rem 1.3rem rgba(0, 0, 0, 0.5);
}

.card
{
    background-color: rgba(225, 225, 225, 0.1);
    position: absolute;
    object-fit: cover;
}

.btn {
    border-radius: 2rem;
    margin: 10px;
}

.btn:hover {
    box-shadow: 0 0.3rem 1rem rgba(0, 0, 0, 0.3);
}
</style>

    </head>
    <body>
    
        <div class="container">
            <div class="container">
                <h1 class="title text-center">Menu</h1>
            </div>
            <div class="container">
                <h2 class="title text-center">Coffee</h2>
            </div>
            
            <?php

            require 'Connection/connection.php';
            $conn = Connect();

            $sql = "SELECT * FROM food WHERE options = 'ENABLE' ORDER BY F_ID";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // $rows = mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) > 0)
            {
                $count=0;

            // while($row = mysqli_fetch_assoc($result)){
            foreach($rows as $row){
                if ($count == 0)
                echo "<div class='row'>";

            ?>

                    <div class="card" style="width: 18rem; height: 35rem;">
                        <form method="POST" action="cart.php?action=add&id=<?php echo $row["F_ID"]; ?>">
                        <img src="<?php echo $row["images_path"]; ?>" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                        <h5 class="card-title"><?php echo $row["name"]; ?></h5>
                        <p class="card-text"><?php echo $row["description"]; ?></p>
                        <div class="row">
                            <div class="col">
                                <h6 class="white">Quantity:<input type="number" min="1" max="10" name="quantity" class="form-control" value="1" style="width: 50px;"> </h6>
                            </div>
                            <div class="col">
                                <h5 class="white" style="margin-top:20px; margin-left:35px;">&#8377; <?php echo $row["price"]; ?>/-</h5>
                            </div>
                        </div>
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                        <input type="hidden" name="hidden_RID" value="<?php echo $row["R_ID"]; ?>">
                        <input type="submit" name="add" style="margin-top:20px; margin-left:60px;" class="btn btn-outline-primary" value="Add to Cart">
                        <!-- <a href="cart.php?id=<?php echo $row['F_ID'] ?>" name="add" class="btn btn-outline-primary">Add to cart</a> -->
                        </div>
                        </form>
                    </div>

            <?php
                $count++;
                if($count==3)
                {
                    echo "</div>";
                    $count=0;
                }
                if($row["F_ID"]==109)
                {
                    echo '<div class="container">
                    <h2 class="title text-center">Food</h2>
                    </div>';
                }
                if($row["F_ID"]==115)
                {
                    echo '<div class="container">
                    <h2 class="title text-center">Donuts</h2>
                    </div>';
                }
                }
            }
            ?>
    
            <div class="container">
                <a href="web_index.php" class="btn btn-primary">
                    <span>Back</span>
                </a>
            
                <button class="btn btn-primary" onClick="location.href='cart.php'">
                    <span>View cart</span>
                </button>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

    </body>
</html>