<?php 
include 'config.php';


$floor_name = $_POST["floor_name"]; 

$floor_more = $_POST["floor_more"];

$parent_id = $_POST["parent_id"];



//$query = $db->prepare("INSERT INTO floor SET floor_name='$floor_name',floor_more='$floor_more'");
  // $query->execute(array($username));
   //$hasil = $query->fetch();

//$query="INSERT INTO floor SET floor_name='$floor_name',floor_more='$floor_more'";
//mysqli_query($query, $query);



try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO menu (title, more, parent_id)
    VALUES ('$floor_name', '$floor_more', '$parent_id')";
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

        