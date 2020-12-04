<?php

$conn = new mysqli("localhost", "root", "", "cloud");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pass= $_REQUEST['pwd'];
$email = $_REQUEST['email'];

$sql = "SELECT `email` FROM data WHERE `email`='$email'";
$result = $conn->query($sql);
$temp=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp++;
    }
} else {
    header("Location: http://localhost:63342/SecureFileStorage1/main.html");
}
if($temp==0) {
    $sql = "INSERT INTO data (`S.No`, `email`, `password`,`file`) VALUES (NULL,'$email','$pass','')";

    if ($conn->query($sql) === TRUE) {
        echo "welcome!!";
    }
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    print_r("Sorry there's a user with this Email Id");
}
$conn->close();