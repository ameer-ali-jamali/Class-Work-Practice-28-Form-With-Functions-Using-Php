<?php
try {
    $conn = new mysqli("localhost", "root", "", "std");
} catch (Exception $ex) {
    echo $ex . "This is error";
    die("Connection failed");
}
?>
<?php

// Hash Pass Function ..
function hash_pass($originalPassword)
{
    return md5($originalPassword);
}

// Signup Function ...
function signup($name, $email, $pass, $re_pass)
{
    global $conn;
    if ($pass == true and $pass == $re_pass) {
        $sql = "INSERT INTO `tab`(`name`, `email`, `password`, `re_password`) VALUES ('$name','$email','$pass','$re_pass')";
        try {
            $result = mysqli_query($conn, $sql);
        } catch (Exception $ex) {
            if ($ex) {
                return die("<script>
                alert('This Email Already Exists Please Try Other Email');
                window.location = 'index.php';
                </script>");
            }
        }
        return $result;
    } else if ($pass == true and $pass != $re_pass) {
        return die("<script>
    alert('password dosent match');
    window.location = 'index.php';
    </script>");
    }
}


if (isset($_POST['submit'])) {
    $registration = signup($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['re_pass']);
    if ($registration == true) {
        die("<script>
            alert('Your Data Submited Successfully');
            window.location = 'index.php';
            </script>");
    } else {
        die("<script>
            alert('Please Fill Registration Form');
            window.location = 'index.php';
            </script>");
    }
}


// Login Function ...
function login($email, $pass)
{
    global $conn;
    $sql = "SELECT * FROM `tab` WHERE email='$email' and password='$pass' ";
    $result = mysqli_query($conn, $sql);
    if ($result != null) {
        return true;
    } else {
        return false;
    }
}

if (isset($_POST['login'])) {
    $is_success = login($_POST['email'], $_POST['pass']);
    if ($is_success == true) {
        die("<script>
        alert(' Wellcome ');
                window.location = 'index.php';
                </script>");
    } else {
        echo "<script>
            alert('Incorrect Email or Password !!');
            window.location = 'index.php';
            </script>";
    }
}




?>