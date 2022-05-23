<?php

include('server.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Registration</title>
    <style>
        .container{
            text-align:center;
            justify-content:center;
            align-items:center;
        }
        input{
            padding:5px;
        }
        .error{
            background-color:pink;
            color:red;
            width:300px;
            margin:0 auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>user login system</h1>
         <h2><a href="loggedinpage.php">homepage</a></h2>
        <form action="" method="POST">
            <div class="error"><?php echo"$error2" ?> </div>
             <input type="text" name="name" placeholder="username"> <br><br>
             <input type="email" name="email" placeholder="email"> <br><br>
             <input type="password" name="password" placeholder="password"> <br><br>
             <input type="password" name="password" placeholder="repeat password"> 
             <label for="checkbox">keep me logged in</label>
             <input type="checkbox" name="stayloggedin" value="1" > <br><br>
             <input type="submit" name="login" value="login" > <br><br>
             <p>not register user? <a href="index.php">create account</a></p>
    </form>
    </form>
    </div>
</body>
</html>