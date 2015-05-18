<!DOCTYPE html>
<html>
<body>

<h1>Database connection</h1>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "time_series";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO omr ( no,year, price )
VALUES 
('1','2000', '786745' ),
('','2001', '987598' ),
('','2002', '907867' ),
('','2003', '908978' ),
('','2004', '789589' ),
('','2005', '987893' ),
('','2006', '983489' ),
('','2007', '891243' ),
('','2008', '897855' ),
('','2009', '987867' ),
('','2010', '324345' ),
('','2011', '909878' ),
('','2012', '909798' )


";
//$sql = "DELETE FROM chennai WHERE no=1";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>



</body>
</html>