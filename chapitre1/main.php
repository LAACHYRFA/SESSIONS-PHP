<?php
if ($_SERVER ["REQUEST_METHOD"] === "post") {
 $nom = trim($_POST['nom']);
 $email = trim($_POST['email']);

 if (empty($nom) || empty($email)) {
  echo "tous les champs sont obligatoires";

 }elseif (!filter_var($emailFILTER_VALIDATE_EMAIL)) {
  echo "email invalide.";

 }else {
  echo "bonjour $nom , votre email est $email"
 }


















}