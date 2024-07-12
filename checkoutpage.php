<?php 
  session_start();

    $name =$_SESSION['name'];   
    $line2 =$_SESSION['line2'];
    $line1 =$_SESSION['line1'];
    $pincode =$_SESSION['pincode'];
    $city =$_SESSION['city'];
    $state =$_SESSION['state'];
    $productname =$_SESSION['productname'];
    $rate =$_SESSION['rate'];
    $discount =$_SESSION['discount'];
    $delivery =$_SESSION['delivery'];
    $tax =$_SESSION['tax'];
    $total =$_SESSION['total'];
    
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
        .paymentbtn {
            text-align: right;
        }

        /* Responsive Styles */
        @media (max-width: 500px) {
            .container {
                width: 100%;
                padding: 10px;
            }
            .details h2 {
                font-size: 1.2rem;
            }
            table, th, td {
                font-size: 0.9rem;
                padding: 6px;
            }
            .paymentbtn {
                text-align: center;
            }
            .total h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="details">
            <h2><?php echo "$name"?> Address</h2>
            <p><?php echo "$line1"?></p>
            <p><?php echo "$line2"?></p>
            <p><?php echo "$city"?>, <?php echo "$state"?>, <?php echo "$pincode"?></p>
        </div>
        <div class="details">
            <h2>Product Details</h2>
            <table>
                <tr>
                    <th>Product</th>
                    <td><?php echo "$productname"?></td>
                </tr>
                <tr>
                    <th>Rate</th>
                    <td><?php echo "$rate"?></td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td><?php echo "$discount"?></td>
                </tr>
                <tr>
                    <th>Delivery Charge</th>
                    <td><?php echo "$delivery"?></td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td><?php echo "$tax"?></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><?php echo "$total"?></td>
                </tr>
            </table>
        </div>
        <div class="total">
            <h2>Total Amount Payable: <?php echo "$total/-"?></h2>
        </div>
        <div class="paymentbtn">
          <button id="rzp-button1" class="btn btn-outline-dark btn-lg" style="background-color: rgb(255, 217, 0); border-radius: 4px; padding: 6px; font-size: 1rem;"><i class="fas fa-money-bill"></i> Proceed to payment</button>
          <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
          <script>
              var options = {
                  "key": "rzp_test_j8cjzMR1ClopZr", // Enter the Key ID generated from the Dashboard
                  "amount": "<?php echo "$total" * 100?>",
                  "currency": "INR",
                  "description": "fosicinspire",
                  "image": "example.com/image/rzp.jpg",
                  "prefill": {
                      "email": "kaifxx420@gmail.com",
                      "contact": "+919528201801"
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
                              other: { // name for other block
                                  name: "Other Payment modes",
                                  instruments: [
                                      {
                                          method: "card",
                                          issuers: ["ICIC"]
                                      },
                                      {
                                          method: 'netbanking'
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
