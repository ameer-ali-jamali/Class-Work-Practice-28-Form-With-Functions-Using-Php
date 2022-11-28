<?php
try {
    $conn = new mysqli('localhost', 'root', '', 'std');
} catch (Exception $ex) {
    echo $ex . 'This is error';
    die('Connection failed');
}

// Hash Pass Function ..
function hash_pass($originalPassword)
{
    return md5($originalPassword);
}

// Signup Function ...
function signup($name, $email, $pass, $re_pass)
{
    global $conn;
    if ($name && $email && $pass == true and $pass == $re_pass) {
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
    } elseif ($pass == true and $pass != $re_pass) {
        return die("<script>
    alert('Password dosent match');
    window.location = 'index.php';
    </script>");
    }
}
if (isset($_POST['submit'])) {
    $registration = signup(
        $_POST['name'],
        $_POST['email'],
        $_POST['pass'],
        $_POST['re_pass']
    );
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
    if ($email && $pass == true) {
        $sql = "SELECT * FROM `tab` WHERE email='$email' and password='$pass' ";
        $query = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($query);
        if ($result == true) {
            return true;
        } else {
            return false;
        }
    } else {
        return die("<script>
            alert('Please Input Email And Password!!');
            window.location = 'index.php';
            </script>");
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
// Update ...
function update($name, $email, $pass)
{
    global $conn;
    if ($name && $email && $pass == true) {
        $sql = "SELECT * FROM `tab` WHERE email='$email' AND password='$pass'";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($query);
        if ($row > 0) {
            $sql = "UPDATE tab SET name='$name' WHERE email='$email' ";
            $result = mysqli_query($conn, $sql);
            return $result;
        } else {
            return die("<script>
             alert('Incorrect Email Or Password');
             window.location = 'index.php';
              </script>");
        }
    } else {
        return die("<script>
         alert('Please Input Name Email And Password');
         window.location = 'index.php';
          </script>");
    }
}
if (isset($_POST['update'])) {
    $result = update($_POST['name'], $_POST['email'], $_POST['pass']);
    die("<script>
                alert('Your Name Updated Successfully');
                window.location = 'index.php';
                </script>");
}
// Delete ...
function delete($email, $pass)
{
    global $conn;
    $sql = "SELECT * FROM `tab` WHERE email='$email' AND password='$pass'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
        $sql = "DELETE FROM tab WHERE email='$email' AND password='$pass' ";
        $result = mysqli_query($conn, $sql);
        return $result;
    } else {
        return die("<script>
    alert('Incorrect Email Or Password');
    window.location = 'index.php';
    </script>");
    }
}
if (isset($_POST['delete'])) {
    $result = delete($_POST['email'], $_POST['pass']);
    if ($result == true) {
        die("<script>
                alert('Your Data Deleted Success fully');
                window.location = 'index.php';
                </script>");
    } else {
        die("<script>
            alert('Incorrect Email Or Password');
            window.location = 'index.php';
            </script>");
    }
}
// Delete_by_id Function ..
function delete_by_id($id)
{
    global $conn;
    if ($id == true) {
        $sql = "DELETE FROM tab WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        return $result;
    } else {
        return die("<script>
    window.location = 'index.php';
    </script>");
    }
}
if (isset($_POST['delete_by_id'])) {
    $result = delete_by_id($_POST['id']);
    if ($result == true) {
        die("<script>
    alert('Deleted Succesfully');
    window.location = 'index.php';
    </script>");
    } else {
        die("<script>
    window.location = 'index.php';
    </script>");
    }
}