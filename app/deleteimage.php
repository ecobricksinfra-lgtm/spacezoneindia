<?php
include('connect.php');


$name = $_GET['name'];
$image = $_GET['image'];

$path = 'files/'.$image;

if(unlink($path)){
 $delete_query = "delete from photos where image='$image' ";

     
      if (mysqli_query($connect,$delete_query)) {
		  
		 {

       		echo "<script>window.open('viewphotos.php?name=$name','_self')</script>";
		}
} else {
    echo "Error: " . $delete_query . "<br>" . mysqli_error($connect);
}
}
else{
    echo "Unlink Error";
}
	 ?> 