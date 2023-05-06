<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        *{
            font-family: 'Dosis', sans-serif !important;
        }
        h3{
            font-family: 'Poppins', sans-serif;
            
            text-align: center;
            text-transform: uppercase;
            word-spacing: 8px;
            text-decoration: underline;

        }
        .card{
            float: right;
            margin-top: 20px;
            margin-left: 10px;
            margin-right: 10px;
            border:none;
            background-color: white;
            box-shadow: -3px -3px 4px #e0ded1;

        }
        .card img{
            width: 200px;
            height: 200px;
            margin-left: 20px;
            margin-top: 20px;
        }
        main{
            width: 60%;
        }

        .btn-danger{
            background-color: #dc3545;
            border: none;

        }

        .btn-danger:hover{
            background-color: black;
            border: none;
            transition:0.5s;
        }

        .btn-primary{
            background-color: black;
            border: none;
        }
        .btn-primary:hover{
            background-color: black;
            border: none;
        }

        .flex a{
             margin-top: -136px;
            margin-left: 10px;
            background-color: black;
        }

        .flex{
            margin-left: 45px;
            margin-top: 5px;
        }

    </style>
</head>
<body style="margin-right: 60px; margin-left: 20px">
    <center>
        <br><br>
        <h3>Admin control panel</h3>
        <br>
    </center>

     <div class="flex">
      
      <a href="login.php" class="bb btn btn-danger" onclick="return confirm('Are you sure you want to log out?');">Sign out</a>
      <a href="add.php" class="dd btn btn-danger">Add product</a>

   </div>

    <?php
    include('config.php');
    $result = mysqli_query($con, "SELECT * FROM products");
    while($row = mysqli_fetch_array($result)){
        echo "
        <center>
        
            <div class='card' style='width: 15rem;'>
                <img src='$row[image]' class='card-img-top'>
                <div class='card-body'>
                    <h5 class='card-title'>$row[name]</h5>
                    <p class='card-text'>$row[price]</p>
                    <a href='delete.php? id=$row[id]' class='btn btn-danger'>Delete</a>
                    <a href='update.php? id=$row[id]' class='btn btn-primary'>update</a>
                </div>
            </div>
        
        <center>
        ";
    }
    ?>


</body>
</html>