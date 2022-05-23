<?php
session_start();
if(array_key_exits('id',$_cookie)){
    $_SESSION['id']=$_COOKIE['id'];//stay looged in for long time
    echo "<h3>welcome dear,".$_session['name']."</h3>";
}
if(array_key_exits('id',$_COOKIE) OR array_key_exists('id',$_SESSION)){
echo"<h2> congratulation you are registred user: <a href =index.php?logout=1> log out </a></h2>"
}
else{
    header("location:index.php");
}
?>
<html>
    <h3><a href="index.php">go back</h3>
</html>