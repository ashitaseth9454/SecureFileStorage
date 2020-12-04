<?php

$conn = new mysqli("localhost", "root", "", "cloud");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//$mobno = $_REQUEST['mobno'];
$pass= $_REQUEST['pwd'];
$email = $_REQUEST['email'];

$sql = "SELECT `password` FROM data WHERE `email`='$email' AND `password`='$pass'";
//echo $sql;
$temp=0;
$k=0;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp++;
    }
} else {
    $k= print "<script>alert('Sorry, password do not match');</script>";
}
echo $k;
if ($temp!=0) {
    header("Location: http://localhost:63342/SecureFileStorage1/main.html");
} else {

}
$conn->close();

?>