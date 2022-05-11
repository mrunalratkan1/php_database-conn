<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
</head>
<body>
    <?php
    $server="localhost";
    $username= "root";
    $password= "";
    $db= "users";
     
    $conn =mysqli_connect($server, $username, $password, $db);
    if(!$conn){
    die("Connection Failed: ".mysqli_connect_error());
}
// echo "connected successfully";

//Collect form details
// $username= $_REQUEST["uname"];
// $email= $_REQUEST["email"];
// $phone= $_REQUEST["phone"];

// $sql="insert into users_info values('$username', '$email', $phone)";
// if(mysqli_query($conn, $sql)){
//     echo "Records inserted successfully.";
// }
// else{
//     echo "Error: ".mysqli_error($conn);
// }

//Display the records

$sqlSelect= 'SELECT * FROM users_info';
$resultSet=mysqli_query($conn, $sqlSelect);
$nrows = mysqli_num_rows($resultSet);
echo " <br> Number Of Records: ".$nrows;
echo "<table border=2>";
echo "<th>User Name</th><th>Email ID</th><th>Phone Number</th><th>Action</th>";
if ($nrows > 0){
    while($row = mysqli_fetch_assoc($resultSet)){
        echo "<tr>";
        echo "<td>".$row['Username']."</td><td>".$row['Email']."</td><td>".$row['PhoneNumber']."</td><td><a href='welcome.php?id=".$row['Username']."'>Delete</a></td>";
        echo "</tr>";
    }
}

if($_GET){
    $id = $_GET['id'];
    $sqlDel = "delete from users_info where UserName='$id'";
    mysqli_query($conn, $sqlDel);
    header("Location: http://localhost/DatabaseConnection/welcome.php");    
}

mysqli_close($conn);
?>
</body>
</html>