<?php
   session_start();
   require_once("config.php");
   $username = $_POST['username'];
   $pass = $_POST['password'];
   $query = $db->prepare("SELECT * FROM users WHERE username = ?");
   $query->execute(array($username));
   $hasil = $query->fetch();
   if($query->rowCount() == 0) {
     echo "<div align='center'>Username Belum Terdaftar! <a href='login.php'>Back</a></div>";
   } else {
     if($pass <> $hasil['password']) {
       echo "<div align='center'>Password salah! <a href='login.php'>Back</a></div>";
     } else {
       $_SESSION['username'] = $hasil['username'];
       if($hasil['level'] == 1){
      $_SESSION['admin']=$user;
      header('location:index.php');
      }else{
      $_SESSION['user']=$user;
      header('location:user.php');
        }

       }
     }
   
?>



