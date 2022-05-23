<?php

session_start();
//php code log the user out
if(isset($_GET['logout'])){
    unset($_SESSION['id']);
    setcookie('id',time()-60*60);
    $_COOKIE="";
}
$error="";

if(array_key_exists('signup',$POST)){
    include('linkdb.php');
    echo "sign up button pressed";
//taking data from user
$name= mysqli_real_escape_string($linkdb,$POST['name']);
$email= mysqli_real_escape_string($linkdb,$POST['email']);
$password= mysqli_real_escape_string($linkdb,$POST['password']);
$repeatpassword= mysqli_real_escape_string($linkdb,$POST['repeatpassword']);

//data filters

if($name){
    $error="name is required<br>";
}
if($email){
    $error="email field is empty<br>";
}
if($password){
    $error="password field is empty<br>";
}
if($password !== $repeatpassword){
    $error="passwoed did not matched!<br>";
}
if($error){
    $error="<br>there was following error(s) in your form<br> <br>".$error;
}
else{
    //check if email is already exist in database
    $query="SELECT id FROM datbasename WHERE email='$email'";
    $result=mysqli_query($linkdb, $query);
    if(mysqli_num_rows($result)>0){
        $error="your email was already exit";
    }
    else{
        //password encryption
        $hashedpassword=password_hash($password,password_default);
        $query="INSERT INTO dbname (name,email,password) VALUES('$name','$email','$hashedpassword')";
        $result=mysqli_query($linkdb,$query);
        if(!$result){
            $error ="you are not logged in -try again later";
        }
        else{
            $session['id']=mysqli_insert_id($linkdb);
            $session['name']=$name;
            if($POST['stayloggedin']=='1'){
                setcookie('id,mysqli_insert_id($linkdb', time() +60*60*365);
            }
            header("location:loggedinpage.php")
        }
    }
}

//php code for user login
$error2="";

if(array_key_exists('login',$POST)){
    include('linkdb.php');
    
//taking data from user

$email= mysqli_real_escape_string($linkdb,$POST['email']);
$password= mysqli_real_escape_string($linkdb,$POST['password']);


//data filters

if($email){
    $error2="email field is empty<br>";
}
if($password){
    $error2="password field is empty<br>";
}

if($error2){
    $error2="<br>there was following error(s) in your form<br> <br>".$error;
}
else{
    //password and email matching
    $query="SELECT id FROM datbasename WHERE email='$email'";
    $result=mysqli_query($linkdb, $query);
    $row=mysqli_fetch_array($result);//get user data from database


    if(isset($row)){
        if (password_verify($password,$row['password'])){//if password matched
            else{
                $session['id']=mysqli_insert_id($linkdb);
                $session['name']=$name;
                if($POST['stayloggedin']=='1'){
                    setcookie('id,mysqli_insert_id($linkdb', time() +60*60*365);
                }
                header("location:loggedinpage.php")
        }
        else{
            $error2="commbination of email/password doesn't matched";
        }
    }
?>
