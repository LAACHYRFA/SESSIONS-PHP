<?php
session_start();
include 'users.php';

$erreur = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nom = trim($_POST['nom'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($nom) || empty($password)) {

        $erreur = "veuillez remplir les champs";

    } else {

        $nameFound = false;

        foreach ($users as $user) {

            if ($user['name'] === $nom) {

                $nameFound = true;

                if ($user['password'] !== $password) {

                    $erreur = "password incorrect";
                    break;

                } else {

                    if ($user['active'] === false) {

                        $erreur = "acc desactivé";
                        break;

                    } else {

                        $_SESSION['user'] = $user;
                        header('Location: dashbord.php');
                        exit;
                    }
                }
            }
        }

        if (!$nameFound) {
            $erreur = "nom incorrect";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
</head>
<body>

 <form action="" method="POST">
    <label for=""> name :</label>
    <input type="text"name="nom"><br> <br>

    <label for=""> password :</label>
    <input type="password" name="password"> <br> <br>

    <button name="btn">connect</button>
       </form>
       <p style="color:red;"><?= $erreur ?? '' ?></p>


</body>
</html>
       