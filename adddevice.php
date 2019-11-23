<?php 
include 'config.php';


$device_name = $_POST["device_name"];

$device_url = $_POST["device_url"];

$device_more = $_POST["device_more"];

$parent_id = $_POST["parent"];

$parent_id2 = $_POST["parent2"];

//$query = $db->prepare("INSERT INTO floor SET floor_name='$floor_name',floor_more='$floor_more'");
  // $query->execute(array($username));
   //$hasil = $query->fetch();

//$query="INSERT INTO floor SET floor_name='$floor_name',floor_more='$floor_more'";
//mysqli_query($query, $query);



try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO menu (title, url, more, parent_id)
    VALUES ('$device_name', '$device_url', '$device_more', '$parent_id2')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    header("Location:index.php");
    exit();
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;


 ?>

