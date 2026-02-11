<?php
session_start();

if (!isset($_SESSION['user'])) {
 header('Location: login.php');
 
 exit;
}

   $user = $_SESSION['user'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>
   
 <?php
 if ($user['role'] === "administrateur") {
  echo "hy administrateur :" .  $user['name'];

 }elseif ($user['role'] === "formateur") {
   echo "hy formateur :" . $user['name'];

 }else {
   echo "hy apprenant :" . $user['name'];

 }
?>
 <form action="logout.php" method="POST">

   <button name="se deconnecte">se deconnecte</button>

 </form>

</body>
</html>