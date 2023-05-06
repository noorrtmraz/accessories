<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
};

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = '';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
      $message[] = 'المنتج يضاف الى عربة التسوق!';
   }

};

if(isset($_POST['update_cart'])){
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
   $message[] = 'Your cart quantity has been successfully updated!';
}

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
   header('location:products.php');
}
  
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:products.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Cart products</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <style type="text/css">
      body{
         background-color: #f8f5f3;
      }
      .container .user-profile{
         padding:10px;
         border:none;
         background-color: #f8f5f3;
         box-shadow:none;
         max-width: 250px;
         float: left;
      }

      .flex a{
         margin-left: 17px;
         text-align: center;
         background-color: #9c8f4c;
         color: white;
         padding: 10px;
         border-radius: 5px;

      }


      .container .heading{
         text-align: center;
         margin-bottom: 20px;
         font-size: 30px;
         text-transform: uppercase;
         color:#9c8f4c;

      }

      .container .products .box-container{
         display: flex;
         flex-wrap: wrap;
         gap:15px;
         justify-content: left;
}

.container .products .box-container .box .name{
   font-size: 15px;
   color:var(--black);
   padding:5px 0;
   text-align: center;
}

.container .products .box-container .box input[type="number"]{
   margin:10px 0;
   width: 30%;
   border:var(--border);
   font-size: 13px;
   color:var(--black);
   padding:8px 10px;
   height: 32px;
}

.container .products .box-container .box img{
      height: 200px;
      margin-left: 40px;
   }

   .btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

.btn{
   background-color: #9c8f4c;
   width: 90px;
   height: 30px;
   color: white;
   left: 30px;
}


.bbtn{
   width: 172px;
   margin-left:62px;
}

.products{
   margin-left: 50px;
}

.container .shopping-cart table thead th{
   padding:10px;
   color:var(--white);
   text-transform: capitalize;
   font-size: 15px;
   border:none;
   background-color: #9c8f4c;

}
.container .shopping-cart table{
   width: 70%;
   text-align: center;
   border:none;
   border-radius: 5px;
   box-shadow: var(--box-shadow);
   background-color: var(--white);
   margin-left: 158px;
}

.shopping-cart{
	margin-top: 80px;
	background:url(images/bb.jfif);
	height: 350px;
	box-shadow: var(--box-shadow);
}

.container .shopping-cart table .table-bottom{
background-color:#f8f5f3;
}

.delete-btn{
   background-color: white;
   color: #9c8f4c;
   font-size: 15px;
   font-weight: bold;
   text-decoration: underline;
}

.option-btn{
	background-color: white;
	color: #9c8f4c;
	text-decoration: underline;
	font-size: 15px;
	font-weight: bold;
	margin-left: 6px;
}

.container .shopping-cart table tr td input[type="number"]{
   width: 40px;
   height: 30px;
   border:1px solid black;
   padding:0px 0px;
   font-size: 20px;
   color:var(--black);
}

   </style>



</head>
<body>
   
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <div class="flex">
      <a href="login.php?logout=<?php echo $user_id; ?>" onclick="return confirm('Are you sure you want to log out?');" class="delete-btn">Sign out</a>
      <a href="home.php" onclick="return confirm('Do you want to return to the home page?');" class="delete-btn">Back</a>
   </div>

</div>

<div class="products">
<br><br><br><br>
   <h1 class="heading">Shop now the latest products</h1>
<br>
   <div class="box-container">

   <?php
   include('config.php');
   $result = mysqli_query($conn, "SELECT * FROM products");      
    while($row = mysqli_fetch_array($result)){
   ?>
      <form method="post" class="box" action="">
         <img src="admin/<?php echo $row['image']; ?>"  width="200">
         <div class="name"><?php echo $row['name']; ?></div>
         
         <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
         <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
         <div class="bbtn">
            <input type="number" min="1" name="product_quantity" value="1">
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </div>
      </form>
   <?php
      };
   ?>

   </div>

   <div class="shopping-cart">

   <h1 class="heading">Shopping cart</h1>
   <br>
   <table>
      <thead>
         <th>Image</th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total price</th>
         <th>Action</th>
      </thead>
      <tbody>
      <?php
         $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         $grand_total = 0;
         if(mysqli_num_rows($cart_query) > 0){
            while($fetch_cart = mysqli_fetch_assoc($cart_query)){
      ?>
         <tr>
            <td><img src="admin/<?php echo $fetch_cart['image']; ?>" height="75" alt=""></td>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo $fetch_cart['price']; ?>$ </td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                  <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                  <input type="submit" name="update_cart" value="Update" class="option-btn">
               </form>
            </td>
            <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>$</td>
            <td><a href="products.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('إزالة العنصر من سلة التسوق؟');">Delete</a></td>
         </tr>
      <?php
         $grand_total += $sub_total;
            }
         }else{
            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">العربة فارغة</td></tr>';
         }
      ?>
      <tr class="table-bottom">
         <td colspan="4">Total amount:</td>
         <td><?php echo $grand_total; ?>$</td>
         <td><a href="products.php?delete_all" onclick="return confirm('حذف كل المنتجات من العربة?');" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">Delete all</a></td>
      </tr>

 
   </tbody>


   </table>


</div>

</div>



</div>

</body>
</html>