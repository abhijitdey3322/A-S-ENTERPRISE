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
        <main class="d-flex flex-nowrap sidebar col-auto">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark " style="width:280px; height:100vh;">
                <a href="./index.php"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <img src="icon.png" class="img-thumbnail mx-2" alt="..." style="width: 50px; height:50px;">
                    <span class="fs-5">A S ENTERPRISE</span>
                </a>
                <hr>
                <ul class="nav nav-pills mb-auto">
                    <li class="nav-item">
                        <a href="./sell.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"
                            aria-current="page"><i
                                class="fa-solid fa-file-invoice-dollar me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> <span class="d-none d-lg-block">SELL</span></a>
                    </li>
                    <li>
                        <a href="./add.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"><i
                                class="fa-solid fa-cart-plus me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> <span class="d-none d-lg-block">ADD
                                PRODUCTS</span></a>
                    </li>
                    <li>
                        <a href="./details.php" class="nav-link d-flex align-items-center my-3  p-2 text-light"><i
                                class="fa-solid fa-file-lines me-2 bg-primary p-1 rounded-circle d-flex align-items-center justify-content-center"
                                style=" height: 30px;width:30px"></i> <span class="d-none d-lg-block">SELL
                                DETAILS</span></a>
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
            <div class="container flex-grow-1" id="chnageSection">
                <div class="d-flex justify-content-center align-items-center flex-column text-center p-5"
                    style="height:100%">
                    <h1 class="fs-5">WELCOME TO A S ENTERPRISE TAX INVOICE SOFTWARE</h1>
                    <p class="lead fs-6">Introducing our advanced Tax Invoice Software!
                        Seamlessly manage invoices with automated tax calculations,
                        customizable templates, real-time analytics, multi-currency support,
                        secure data storage, and user-friendly interface.</p>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">Login as OWNER</button>

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
</body>

</html>