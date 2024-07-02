
<?php
    session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true) {
        header("location: login.php");
        exit;
    }
    ?>
    <?php
    $con=mysqli_connect('localhost','root','','kaif');

      $username = $_SESSION['username'];


    $query = "SELECT * FROM `cus_address` WHERE contact = '$username'";
    $run=mysqli_query($con,$query);

    $num = mysqli_num_rows($run);
    // echo $num;

    if($num>0) {
            $row = mysqli_fetch_assoc($run);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      h1 {
        text-align: center;
        margin: 2rem 0rem;
      }
    </style>
  </head>
    <body>
      <h1>your Orders</h1>
      <hr>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">items</th>
      <th scope="col">Number</th>
      <th scope="col">Pincode</th>
      <th scope="col">Date</th>
      <th scope="col">name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><?php echo $row['items']; ?></td>
      <td><?php echo $row['contact']; ?></td>
      <td><?php echo $row['pincode']; ?></td>
      <td><?php echo $row['date']; ?></td>
      <td><?php echo $row['name']; ?></td>
    </tr>
  </tbody>
</table>
</body>
</html>