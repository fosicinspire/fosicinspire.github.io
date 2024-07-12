<?php
  session_start();

$con=mysqli_connect('localhost','root','','kaif');

if(isset($_POST['sb']))
{  
    $name = htmlspecialchars($_POST['name']);
    $line1 = htmlspecialchars($_POST['line1']);
    $line2 = htmlspecialchars($_POST['line2']);
    $pincode = htmlspecialchars($_POST['pincode']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $productname = htmlspecialchars($_POST['productname']);
    $rate = htmlspecialchars($_POST['rate']);
    $discount = htmlspecialchars($_POST['discount']);
    $delivery = htmlspecialchars($_POST['delivery']);
    $tax = htmlspecialchars($_POST['tax']);
    $total = htmlspecialchars($_POST['total']);
    
    $_SESSION['name'] = $name;
    $_SESSION['line1'] = $line1;
    $_SESSION['line2'] = $line2;
    $_SESSION['pincode'] = $pincode;
    $_SESSION['city'] = $city;
    $_SESSION['state'] = $state;
    $_SESSION['productname'] = $productname;
    $_SESSION['rate'] = $rate;
    $_SESSION['discount'] = $discount;
    $_SESSION['delivery'] = $delivery;
    $_SESSION['tax'] = $tax;
    $_SESSION['total'] = $total;

    $name =$_POST['name'];   
    $contact =$_POST['contact'];
    $password =$_POST['password'];
    $line1 =$_POST['line1'];
    $line2 =$_POST['line2'];
    $pincode =$_POST['pincode'];
    $city =$_POST['city'];
    $state =$_POST['state'];
    $productname =$_POST['productname'];
    $rate =$_POST['rate'];
    $discount =$_POST['discount'];
    $delivery =$_POST['delivery'];
    $tax =$_POST['tax'];
    $total =$_POST['total'];

        $query = "INSERT INTO cus_address(name, contact, password, line1, line2, pincode, city, state, items) VALUES ('$name', '$contact', '$password', '$line1', '$line2', '$pincode', '$city', '$state','$items')";
        $run=mysqli_query($con,$query);

    header("Location: checkoutpage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            width: 800px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .details p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            text-align: right;
        }
        .paymentbtn{
          text-align: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="details">
            <h2>Customer Address</h2>
            <p>123 Main St, City Name</p>
            <p>State, Pincode - 123456</p>
        </div>
        <div class="details">
            <h2>Product Details</h2>
            <table>
                <tr>
                    <th>Product</th>
                    <td>Product Name</td>
                </tr>
                <tr>
                    <th>Rate</th>
                    <td>$100.00</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>$10.00</td>
                </tr>
                <tr>
                    <th>Delivery Charge</th>
                    <td>$5.00</td>
                </tr>
                <tr>
                    <th>GST (12%)</th>
                    <td>$10.80</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td>$105.80</td>
                </tr>
            </table>
        </div>
        <div class="total">
            <h2>Total Amount Payable: $105.80</h2>
        </div>
        <div class="paymentbtn">
          <button id="rzp-button1" class="btn btn-outline-dark btn-lg" style="background-color: rgb(255, 217, 0); border-radius: 4px; padding: 6px; font-size: 1rem;"><i class="fas fa-money-bill"></i>proceed to payment</button>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
          var options = {
            "key": "rzp_test_j8cjzMR1ClopZr", // Enter the Key ID generated from the Dashboard
            "amount": "1000",
            "currency": "INR",
            "description": "fosicinspire",
            "image": "",
            "prefill":
            {
              "email": "kaifxx420@gmail.com",
              "contact": +919528201801,
            },
            config: {
              display: {
                blocks: {
                  utib: { //name for Axis block
                    name: "Pay using Axis Bank",
                    instruments: [
                      {
                        method: "card",
                        issuers: ["UTIB"]
                      },
                      {
                        method: "netbanking",
                        banks: ["UTIB"]
                      },
                    ]
                  },
                  other: { //  name for other block
                    name: "Other Payment modes",
                    instruments: [
                      {
                        method: "card",
                        issuers: ["ICIC"]
                      },
                      {
                        method: 'netbanking',
                      }
                    ]
                  }
                },
                hide: [
                  {
                  method: "upi"
                  }
                ],
                sequence: ["block.utib", "block.other"],
                preferences: {
                  show_default_blocks: false // Should Checkout show its default blocks?
                }
              }
            },
            "handler": function (response) {
              alert(response.razorpay_payment_id);
            },
            "modal": {
              "ondismiss": function () {
                if (confirm("Are you sure, you want to close the form?")) {
                  txt = "You pressed OK!";
                  console.log("Checkout form closed by the user");
                } else {
                  txt = "You pressed Cancel!";
                  console.log("Complete the Payment")
                }
              }
            }
          };
          var rzp1 = new Razorpay(options);
          document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
          }
        </script>
        </div>
    </div>
</body>
</html>
