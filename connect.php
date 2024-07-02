<?php
$con=mysqli_connect('localhost','root','','kaif');

if(isset($_POST['sb']))
{
    $name =$_POST['name'];   
    $contact =$_POST['contact'];
    $password =$_POST['password'];
    $line1 =$_POST['line1'];
    $line2 =$_POST['line2'];
    $pincode =$_POST['pincode'];
    $city =$_POST['city'];
    $state =$_POST['state'];
    $items =$_POST['productname'];

        $query = "INSERT INTO cus_address(name, contact, password, line1, line2, pincode, city, state, items) VALUES ('$name', '$contact', '$password', '$line1', '$line2', '$pincode', '$city', '$state','$items')";
        $run=mysqli_query($con,$query);
    }

?>