<?php
$servername = getenv("DB_HOST");
$username = getenv("DB_USERNAME");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `info_submits` WHERE DATE(`timestamp`) = CURDATE()";
$result = $conn->query($sql);
$message = "số người gửi mail ngày mới là"; 
if (isset($result->num_rows) && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $message += "<br>Name: ". $row["name"]. " " . $row["email"] . "<br>";
    }
} else {
    $message += "0 results";
}
$sql = "SELECT * FROM `settings`";
$result = $conn->query($sql);
$to = '';
if (isset($result->num_rows) && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $to += $row["email"].',';
    }
} 

$subject = "reports";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
$conn->close();
?>