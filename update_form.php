<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="update_form.css">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/boostarp_min.js"></script>
    <!-- Jqery -->
    <script src="js/jquery_min.js"></script>
    <script src="js/app.js"></script>
</head>


<?php
include_once "conn.php";
include_once "code.php";
?>

<body>



    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <!-- Sign up form -->
                <div class="signup-content ">
                    <div class="signup-form">
                        <h2 class="form-title text-align">Update Form</h2>
                        <form method="post" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" value="lkdl" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" value="" />
                            </div>

                            <div class="form-group form-button">
                                <div class="d-grid">
                                    <a href="#" onclick="update()" class="btn btn-success p-2">Update</a>
                                    <input type="hidden" name="update" id="update" class="btn btn-secondary p-2" value="Update" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>