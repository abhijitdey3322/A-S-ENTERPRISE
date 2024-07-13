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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">

</head>

<body>
    <div class="mainBody row  g-0">
        <main class="d-flex flex-nowrap sidebar col-auto">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px; height:100vh;">
                <a href="./index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="icon.png" class="img-thumbnail mx-2" alt="..." style="width: 50px; height:50px;">
                    <span class="fs-5">A S ENTERPRISE</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto" id="menu">
                    <li class="nav-item">
                        <a href="./sell.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"
                            aria-current="page"><i
                                class="bg-dark fa-solid fa-file-invoice-dollar me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> SELL</a>
                    </li>
                    <li>
                        <a href="./add.php" class="nav-link active d-flex align-items-center my-3  p-2 text-light"><i
                                class="bg-dark fa-solid fa-cart-plus me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
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
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarText">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item text-center">
                                <a class="nav-link text-light" href="#">
                                    <?php if ($user['status'] === 'active') {echo $user['username'];}else{echo 'Admin Name';}?>
                                </a>
                            </li>

                        </ul>
                        <input type="text" style="width:40%"class="form-control border border-primary border-2 text-custom" required id="Search" placeholder="Search......" aria-label="Search">&nbsp;
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
            <div class="container d-flex justify-content-center align-items-center flex-grow-1 text-center" id="chnageSection">
                <!--Enter your code here for sell  -->
                <div class="container  p-0">
                    <form action="backend/adproduct.php" method="POST" id="sell_form" class="row" style="width: 100%;">
                        <div class="col">
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="barcode" placeholder="Barcode Number" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="name" placeholder="Goods Name" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="description" placeholder="Goods Description" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="amount" placeholder="Goods Amount" aria-label="Barcode Number">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="quantity" placeholder="Goods Quantity" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="hsn_sac" placeholder="HSN/SAC Number" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="gst" placeholder="Gst Value" aria-label="Barcode Number">
                            </div>
                            <div class="mb-4">
                                <input type="text" class="form-control border border-primary border-2 text-custom"
                                    required name="brand" placeholder="Brand Name" aria-label="Barcode Number">
                            </div>
                        </div>
                        <div class="row">
                            <p class=" col fw-normal fs-9 text-center p-0">
                            Ensure correct goods details to avoid error.
                            </p>
                            <button type="submit" id="sell_submit" name="submit"class="col btn btn-primary fs-5 rounded-5">
                                Add Product</button>
                        </div>
                    </form>
                    </br>
                    <div class="mb-0 overflow-auto" style="height:190px;" >
                        <table class="table table-striped text-center" id="products">
                            <thead class="table-primary" style="position:sticky; top:0;">
                                <tr>
                                    <th>SL NO.</th>
                                    <th>Barcode No.</th>
                                    <th>Goods Name</th>
                                    <th>Description</th> <!-- Adjust the width as needed -->
                                    <th>Amount</th>
                                    <th>Quantity</th>
                                    <th>HSN/SAC</th>
                                    <th>GST</th>
                                    <th>Brand Name</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php
                                        // SQL query
                                    $sql = "SELECT id, barcode, name, description, amount, quantity, `HSN/SAC` AS hsn_sac, gst, brand FROM goods ORDER BY id DESC";
                                    // Execute query
                                    $result = $conn->query($sql);
                                    if ($result === false) {
                                        // Handle query error
                                        echo "<tr><td colspan='10'>Error executing query: " . $conn->error . "</td></tr>";
                                    } else {
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo '<tr scope="row">';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["id"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["barcode"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["name"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["description"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["amount"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["quantity"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["hsn_sac"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["gst"] . '</td>';
                                                echo '<td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100px;" onmouseover="this.style.whiteSpace=\'normal\'; this.style.overflow=\'visible\'; this.style.textOverflow=\'inherit\';" onmouseout="this.style.whiteSpace=\'nowrap\'; this.style.overflow=\'hidden\'; this.style.textOverflow=\'ellipsis\';">' . $row["brand"] . '</td>';
                                                if ($user['status'] === 'active') {
                                                    echo '<td><a href="backend/delete.php?id=' . $row["id"] . '&table=goods" class="link-danger"><i class="fa-solid fa-trash fs-5"></i></a></td>';
                                                }
                                                echo '</tr>';
                                            }
                                        } else {
                                            echo "<tr><td colspan='10'>0 results</td></tr>";
                                        }
                                    }
                                ?>
                        
                            </tbody>
                        </table>
                    </div>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            // Function to handle live search
            $('#Search').keyup(function(){
                var query = $(this).val().toLowerCase();
                
                $('#products tbody tr').filter(function(){
                    $(this).toggle($(this).text().toLowerCase().indexOf(query) > -1);
                });
            });
        });
    </script>

</body>

</html>