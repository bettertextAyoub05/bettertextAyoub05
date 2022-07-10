<?php 


session_start();
require_once 'db.php';



if(isset($_POST['btn-login']))
{

$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($con,$username);
$password = mysqli_real_escape_string($con,$password);

$query =  "select * from users where user_name='$username'";
$data =mysqli_query($con,$query);


while($row=mysqli_fetch_assoc($data))
{
    $db_user_id=$row['user_id'];
    $db_username = $row['user_name'];
    $db_password = $row['user_password'];
    $db_first_name = $row['first_name']; 
    $db_last_name = $row['last_name'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];  

}


if ($username === $db_username && $password === $db_password) 
{
    $_SESSION['db_user_name']=$db_username;
    $_SESSION['db_user_role'] = $user_role;
    header("location:../admin");

}
else
{
    header("location:../index.php");
}
}



?>