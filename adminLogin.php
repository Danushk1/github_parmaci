<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pharmacy | Admin</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/parmacylogo.png"/>

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 logo"></div>
                    <div class="col-12">
                        <p class="text-center title1">Hi, Welcome to Pharmacy</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block background"></div>
                    <div class="col-12 col-lg-6" id="signUpBox">
                    <form action="adminloginproscess.php" method="post">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2">Admin Login</p>
                            </div>
                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                    </i>
                                </div>
                            </div>
                           
                           
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" id="e" name="e" />
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" id="p" name="p" />
                            </div>
                           
                            
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-primary" name="sign">Sign Up</button>
                            </div>
                            
                        </div>
                        </form>
                    </div>

                    

                  

                </div>
            </div>
            <!-- content -->


            <!-- footer -->

            <div class="col-12 fixed-bottom d-none d-lg-block">
                <p class="text-center">&copy; 2022 pharmacey.lk || All Right Reserved</p>
            </div>

            <!-- footer -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>







