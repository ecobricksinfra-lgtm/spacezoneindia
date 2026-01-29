<?php
include('connect.php');


$id = $_GET['id'];
$image = $_GET['image'];

$path = 'files/'.$image;

if(unlink($path)){
 $delete_query = "delete from products where id='$id' ";

     
      if (mysqli_query($connect,$delete_query)) {
		  
		 {

       		echo "<script>window.open('products.php','_self')</script>";
		}
} else {
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
}
else{
    echo "Unlink Error";
}
	 ?> 