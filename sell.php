<?php 
    include 'backend/db_connection.php';
    // Query to fetch user from database
    $query = "SELECT * FROM users WHERE id = '1'";
    $result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A S ENTERPRISE</title>
    <script src="https://kit.fontawesome.com/e7678863ec.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="mainBody row  g-0">
        <main class="d-flex flex-nowrap sidebar col-auto" >
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:100vh;">
                <a href="./index.php"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="icon.png" class="img-thumbnail mx-2" alt="..." style="width: 50px; height:50px;">
                    <span class="fs-5">A S ENTERPRISE</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto" id="menu">
                    <li class="nav-item">
                        <a href="./sell.php" class="nav-link active d-flex align-items-center my-3  p-2 text-light"
                            aria-current="page"><i
                                class="bg-dark fa-solid fa-file-invoice-dollar me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> SELL</a>
                    </li>
                    <li>
                        <a href="./add.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"><i
                                class="fa-solid fa-cart-plus me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> ADD PRODUCTS</a>
                    </li>
                    <li>
                        <a href="./details.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"><i
                                class="fa-solid fa-file-lines me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> SELL DETAILS</a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="logo.png" alt="" width="42" height="32" class="rounded-circle me-2">
                        <span class="fs-8">Developer</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">Contact Us - +91-7319589678</a></li>
                        <li><a class="dropdown-item" href="#">Email - abhijitdey3322@gmail.com</a></li>
                    </ul>
                </div>
            </div>
        </main>
        <div class="col d-flex flex-column">
        <nav class="navbar navbar-expand-lg bg-secondary align-self-stretch">
                <div class="container-fluid">
                    <a class="navbar-brand d-flex align-items-center justify-content-center" style="height:50px; width:50px; text-align:center;padding:0;" href="#">
                        <?php 
                            if (mysqli_num_rows($result) == 1) {
                                $user = mysqli_fetch_assoc($result);
                                if ($user['status'] === 'active') {echo '<img src="admin.png" class=" border rounded-circle"alt="Bootstrap" style="width: 100%; height: 100%; object-fit: contain;">';}
                                else{echo '<img src="accountIcon.png" class=" border rounded-circle"alt="Bootstrap" width="30" height="30">';}
                            }
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">
                                    <?php if ($user['status'] === 'active') {echo $user['username'];}else{echo 'Admin Name';}?>
                                </a>
                            </li>
                        </ul>
                        <?php 
                            // Check if user status is inactive
                            if ($user['status'] === 'inactive') {
                                echo '<a class="navbar-brand text-light" style="text-align:center;" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Login <i class="fa-solid fa-right-from-bracket rotate-180"></i></a>';
                            } else {
                                echo '<a class="navbar-brand text-light" style="text-align:center;" href="backend/loginOwner.php?action=logout">Logout <i class="fa-solid fa-right-from-bracket"></i></a>';
                            }
                        ?>
                    </div>
                </div>
            </nav>
            <div class="container d-flex justify-content-center align-items-center flex-grow-1 text-center"
                id="chnageSection">
                <!--Enter your code here for sell  -->
                <div class="container  p-0">
                    <form action="./backend/sellBack.php" method="POST" id="sell_form" class="row" style="width: 100%;">
                        <div class="col">
                            <!-- <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                       required name="barcode" placeholder="Barcode Number" aria-label="Barcode Number">
                            </div> -->
                            <div class="input-group mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                     name="barcode" id="barcode_input" placeholder="Barcode Number"
                                    aria-label="Barcode Number" aria-describedby="button-addon2">
                                <button class="btn btn-outline-primary border-2" type="button" id="button_addgoodsDetails">ADD</button>
                            </div>
                            <div class="mb-4 overflow-auto" style="height:250px;">
                                <table class="table table-striped" id="goods_table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Sr</th>
                                            <th scope="col">Barcode</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">GST</th>
                                            <th scope="col">Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div>
                                <strong>Grand Total:</strong> <span id="grand_total">0.00</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required id="buyer_name" placeholder="Buyer Name" aria-label="Buyer Name">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required id="buyer_address" placeholder="Buyer Address"
                                    aria-label="Buyer Address">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required id="contact_number" placeholder="Contact Number"
                                    aria-label="Contact Number">
                            </div>
                            <div class="mb-4">
                                <select class="form-select border-primary border-2" required id="state"
                                    id="inputGroupSelect02">
                                    <option selected disabled>State Name , Code</option>
                                    <option value="Jammu and Kashmir - 1">Jammu and Kashmir - 1</option>
                                    <option value="Himachal Pradesh - 2">Himachal Pradesh - 2</option>
                                    <option value="Punjab - 3">Punjab - 3</option>
                                    <option value="Chandigarh - 4">Chandigarh - 4</option>
                                    <option value="Uttarakhand - 5">Uttarakhand - 5</option>
                                    <option value="Haryana - 6">Haryana - 6</option>
                                    <option value="Delhi - 7">Delhi - 7</option>
                                    <option value="Rajasthan - 8">Rajasthan - 8</option>
                                    <option value="Uttar Pradesh - 9">Uttar Pradesh - 9</option>
                                    <option value="Bihar - 10">Bihar - 10</option>
                                    <option value="Sikkim - 11">Sikkim - 11</option>
                                    <option value="Arunachal Pradesh - 12">Arunachal Pradesh - 12</option>
                                    <option value="Nagaland - 13">Nagaland - 13</option>
                                    <option value="Manipur - 14">Manipur - 14</option>
                                    <option value="Mizoram - 15">Mizoram - 15</option>
                                    <option value="Tripura - 16">Tripura - 16</option>
                                    <option value="Meghalaya - 17">Meghalaya - 17</option>
                                    <option value="Assam - 18">Assam - 18</option>
                                    <option value="West Bengal - 19">West Bengal - 19</option>
                                    <option value="Jharkhand - 20">Jharkhand - 20</option>
                                    <option value="Odisha - 21">Odisha - 21</option>
                                    <option value="Chhattisgarh - 22">Chhattisgarh - 22</option>
                                    <option value="Madhya Pradesh - 23">Madhya Pradesh - 23</option>
                                    <option value="Gujarat - 24">Gujarat - 24</option>
                                    <option value="Daman and Diu - 25">Daman and Diu - 25</option>
                                    <option value="Dadra and Nagar Haveli - 26">Dadra and Nagar Haveli - 26</option>
                                    <option value="Maharashtra - 27">Maharashtra - 27</option>
                                    <option value="Andhra Pradesh (Before Division) - 28">Andhra Pradesh (Before
                                        Division) - 28</option>
                                    <option value="Karnataka - 29">Karnataka - 29</option>
                                    <option value="Goa - 30">Goa - 30</option>
                                    <option value="Lakshadweep - 31">Lakshadweep - 31</option>
                                    <option value="Kerala - 32">Kerala - 32</option>
                                    <option value="Tamil Nadu - 33">Tamil Nadu - 33</option>
                                    <option value="Puducherry - 34">Puducherry - 34</option>
                                    <option value="Andaman and Nicobar Islands - 35">Andaman and Nicobar Islands - 35
                                    </option>
                                    <option value="Telangana - 36">Telangana - 36</option>
                                    <option value="Andhra Pradesh (New) - 37">Andhra Pradesh (New) - 37</option>
                                    <option value="Ladakh - 38">Ladakh - 38</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required id="discount" placeholder="Discount" aria-label="Discount">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                required id="invoice_maker" placeholder="Invoice Maker Name" aria-label="Invoice Maker Name">
                            </div>
                            <div class="col">
                                <button type="submit" style="width:100%;" id="sell_submit" name="sell_submit"class="btn-block col btn btn-primary fs-5 rounded-5">SELL
                                    SUBMIT</button>
                            </div>
                        </div>
                        <p class="fw-normal fs-9 text-center p-3">Please ensure that all goods details and buyer details
                            are filled out
                            correctly. Incomplete or inaccurate information may result in delays, penalties, or the
                            rejection of your tax invoice. Double-check all entries to avoid any discrepancies and
                            ensure smooth processing.</p>
                    </form>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-primary ">
                                    <h1 class="modal-title fs-5 text-light" id="exampleModalCenterTitle">Owner Login
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="backend/loginOwner.php" method="POST">
                                        <div class="mb-3 text-start">
                                            <label for="exampleInputEmail1"
                                                class="form-label text-custom">Username</label>
                                            <input type="text" class="form-control border border-primary"
                                                id="exampleInputEmail1" name="username" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3 text-start">
                                            <label for="exampleInputPassword1"
                                                class="form-label text-custom">Password</label>
                                            <input type="password" class="form-control border border-primary"
                                                id="exampleInputPassword1" name="password">
                                        </div>
                                        <div class="mb-3 text-start form-check">
                                            <input type="checkbox" class="form-check-input border border-primary"
                                                id="exampleCheck1">
                                            <label class="form-check-label text-custom" for="exampleCheck1">Check me
                                                out</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary"
                                            style="width:50%;border-radius:50px;">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- <script src="main.js"></script> -->
    <script>
        $(document).ready(function() {
            var srCounter = 0; // Initialize the serial number counter
            var grandTotal = 0; // Initialize the grand total
            var barcodesToSend = []; // Array to store barcodes to be sent to sell.php
        
            function updateGrandTotal(amount) {
                grandTotal += amount;
                $("#grand_total").text(grandTotal.toFixed(2));
            }
        
            $("#button_addgoodsDetails").click(function() {
                var input = $("#barcode_input").val().trim();
                // Ensure the input is not empty
                if (input != "") {
                    $.ajax({
                        url: "backend/get_goods_info.php",
                        method: "POST",
                        data: { input: input },
                        success: function(data) {
                            var parsedData = JSON.parse(data);
                            if (parsedData.length > 0) {
                                parsedData.forEach(function(item) {
                                    var existingRow = $("#goods_table tbody tr[data-barcode='" + item.barcode + "']");
                                    if (existingRow.length && existingRow.find('td:eq(2)').text().trim() === item.name.trim()) {
                                        // Update existing row if name matches
                                        var currentQuantity = parseInt(existingRow.find('.quantity').text());
                                        var newQuantity = currentQuantity + parseInt(item.quantity);
                                        var newAmount = newQuantity * parseFloat(item.amount_per_unit);
            
                                        existingRow.find('.quantity').text(newQuantity);
                                        existingRow.find('.amount').text(newAmount.toFixed(2));
            
                                        var amountDiff = newAmount - (currentQuantity * parseFloat(item.amount_per_unit));
                                        updateGrandTotal(amountDiff);
            
                                        // Update the corresponding item in barcodesToSend array
                                        var barcodeToSend = barcodesToSend.find(b => b.barcode === item.barcode && b.name === item.name);
                                        if (barcodeToSend) {
                                            barcodeToSend.quantity = newQuantity;
                                            //barcodeToSend.amount_per_unit = newAmount; // Update amount correctly
                                        }
                                    } else {
                                        // Increment the serial number counter
                                        srCounter++;
            
                                        // Append new row
                                        $("#goods_table tbody").append(`
                                            <tr data-barcode="${item.barcode}">
                                                <td>${srCounter}</td> <!-- Serial number -->
                                                <td>${item.barcode}</td>
                                                <td>${item.name}</td>
                                                <td class="amount">${item.amount}</td>
                                                <td>${item.gst}%</td>
                                                <td class="quantity">${item.quantity}</td>
                                            </tr>
                                        `);
            
                                        updateGrandTotal(parseFloat(item.amount) * parseInt(item.quantity));
            
                                        // Add new barcode to barcodesToSend array
                                        barcodesToSend.push(item);
                                    }
                                });
                            } else {
                                $("#goods_table tbody").append(`
                                    <tr>
                                        <td colspan="6">No Data Found</td> <!-- Updated colspan to 5 to account for columns -->
                                    </tr>
                                `);
                            }
                            $("#barcode_input").val('');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error fetching goods info: ", textStatus, errorThrown);
                        }
                    });
                } else {
                    alert("Please enter a barcode.");
                }
            });
            

            $("#sell_submit").click(function() {
                //console.log(barcodesToSend); // Check JSON format before sending
            
                // Gather additional form data
                var discount = $("#discount").val();
                var buyerName = $("#buyer_name").val();
                var buyerAddress = $("#buyer_address").val();
                var contactNumber = $("#contact_number").val();
                var state = $("#state").val();
                var invoiceMaker = $("#invoice_maker").val();
            
                // Combine barcodesToSend array with additional form data
                var dataToSend = {
                    sell_submit: barcodesToSend,
                    discount: discount,
                    buyer_name: buyerName,
                    buyer_address: buyerAddress,
                    contact_number: contactNumber,
                    state: state,
                    invoice_maker: invoiceMaker
                };
            
                if (barcodesToSend.length > 0) {
                    $.ajax({
                        url: "backend/sellBack.php",
                        method: "POST",
                        data: dataToSend, // Send combined data
                        success: function(response) {
                            console.log("Data sent to sell.php successfully.");
                            console.log(response); // Log the response from sell.php
                            // Clear the goods table or perform any other necessary actions after processing
                            $("#goods_table tbody").empty();
                            barcodesToSend = []; // Clear the barcodesToSend array
                            grandTotal = 0; // Reset grand total
                            $("#grand_total").text(grandTotal.toFixed(2));
                            // Clear the input fields
                            $("#discount").val('');
                            $("#buyer_name").val('');
                            $("#buyer_address").val('');
                            $("#contact_number").val('');
                            $("#state").val('');
                            $("#invoice_maker").val('');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error("Error sending data to sell.php: ", textStatus, errorThrown);
                        }
                    });
                } else {
                    alert("No barcodes to send.");
                }
            });
            
            
            
        });
        
    </script>
    
        
        
        
               
</body>

</html>