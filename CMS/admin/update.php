<?php 



require_once('./includes/header.php');
if (isset($_POST['btn_edit_category'])) 

{
$up_id = $_POST['edit_id'];
$up_cat = $_POST['edit_category'];


$sql = "update categories set cat_title='$up_cat' where cat_id='$up_id'";
$result=mysqli_query($con,$sql);


if($result){
    header("location: categories.php");
}
        }

?>