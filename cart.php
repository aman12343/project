<!DOCTYPE html>
<?php 
    require './includes/common.php';
    if(!isset($_SESSION['email'])){
        haeder('location:login.php');
    }
    $id = $_SESSION['id'];
?>

<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            include('./includes/header.php');
        ?>
            <div class="row decor_bg">
                <div class="col-md-6 col-md-offset-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Item Number</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = "select ui.id,ui.user_id,ui.items_id,ui.status,i.name,i.price from users_items ui inner join items i on ui.items_id=i.id and ui.user_id='$id' and ui.status='Added to cart'";
                                $res = mysqli_query($con,$query);
                                $num_row = mysqli_num_rows($res);
                                if($num_row != 0){
                                    $count = 1;
                                    $total = 0;
                                    while($count <= $num_row){
                                        $row = mysqli_fetch_array($res);?>
                                        <tr>
                                            <th><?php echo $count;?></th>
                                            <th><?php echo $row["name"];?></th>
                                            <th><?php echo $row["price"];?></th>
                                            <th><a href=<?php echo './includes/cart_remove.php?id='.$row["id"];?> class='remove_item_link'> Remove</a></th>
                                        </tr>
                                    <?php $count++;
                                     $total +=  $row["price"];}
                                }
                            ?>
                            <tr>
                                <td></td><td>Total</td><td>Rs:<?php echo $total;?> </td><td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
            include './includes/footer.php';
        ?>
    </body>
</html>