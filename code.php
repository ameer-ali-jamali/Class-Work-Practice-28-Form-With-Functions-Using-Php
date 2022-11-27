<?php
include_once 'conn.php';
include_once 'helper.php';

// Update Data From Database ...
if (isset($_POST['update'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$md5_pass = hash_pass($_POST['pass']);
if ($name and $email and $md5_pass == true) {
$sql = "SELECT * FROM `tab` WHERE email='$email' AND password='$md5_pass'";
$query = mysqli_query($conn, $sql);
$row = mysqli_num_rows($query);
if ($row == true) {
$query = "UPDATE tab SET name='$name' WHERE email='$email' ";
$re = mysqli_query($conn, $query);
die("<script>
alert('Name Updated Success fully => ( $name ) !!');
window.location = 'index.php';
</script>");
} else {
die("<script>
alert('Incorrect Email or Password !!');
window.location = 'index.php';
</script>");
}
} else {
die("<script>
alert('Please Fill Update Form');
window.location = 'index.php';
</script>");
}
} ?>