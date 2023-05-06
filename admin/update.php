
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
    <link rel="stylesheet" href="index.css">

    <style type="text/css">
    body{
            background-color: #e4e0ce;
        }
        button{
    border:none;
    border-radius: 5px;
    padding: 8px;
    width: 20%;
    font-size: 15px;
    background-color: white;
    cursor: pointer;
    margin-bottom: 15px;
    color: 9c8f4c;
    font-family: 'Poppins', sans-serif;
   
}

button:hover{
    background-color: #e4e0ce;
    color:white;
    transition: 0.5s;
}

label{
    padding: 8px;
    cursor: pointer;
    font-size: 15px;
    background-color: #8c824d;
    font-family: 'Poppins', sans-serif;
    color:white;
    border-radius: 5px;
    /*padding-left: 71px;*/

    
}

input{
    margin-bottom: 10px;
    width: 69%;
    padding: 7px;
    margin-top: 13px;
    font-family: 'Cairo', sans-serif;
    font-size: 15px;
    font-weight: bold;
    border:1px solid black;
    border-radius: 5px;
    height: 30px;
}

a{
    text-decoration: underline;
    font-size: 22px;
    color:white;
    font-family: 'Poppins', sans-serif;
    font-weight: bold;
    text-shadow: -3px -3px 4px #8c824d;
}

a:hover{
    color: #e4e0ce;
    transition: 0.5s;
}


.main{
    width: 40%;
    box-shadow: -3px -3px 4px #9c8f4c;
    margin-top: 100px;
    padding: 20px;
    background:url(images/222.jpeg) no-repeat center top;
    background-size: cover;
    height: 400px;
}

h3{
            font-family: 'Poppins', sans-serif;
            color: white;
            text-align: center;
            text-transform: uppercase;
            word-spacing: 5px;
            text-decoration: underline;

        }

    </style>
</head>
<body>
    <?php
    include('config.php');
    $ID=$_GET['id'];
    $up = mysqli_query($con, "select * from products where id =$ID");
    $data = mysqli_fetch_array($up);
    
    ?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>Products update</h2>
                <input type="text" name='id' value='<?php echo $data['id']?>'  style='display:none;'>
                <br>
                <input type="text" name='name' value='<?php echo $data['name']?>'>
                <br>
                <input type="text" name='price' value='<?php echo $data['price']?>'>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file">Update product image</label>
                <button name='update' type='submit'>Update</button>
                <br><br>
                <a href="index.php">View all products</a>
                <br><br>
            </form>
        </div>
        <p>Developer By Noor Timraz</p>
    </center>
</body>
</html>