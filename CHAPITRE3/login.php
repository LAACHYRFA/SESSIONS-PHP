<?php
session_start();

if($_SERVER ["REQUEST_METHOD"] ==="post") {
 $nom = trim($_POST['nom']);
 if(!empty($nom)) {
  $_SESSION ['utilisateur'] = $nom;
  header ('location : profile.php');
  exit;
 }else {
  $message = "veuiller entrer votre nom.";

 }

}
?>
<form method = "post">
<label> nom : </label>
<input type="text" name = "nom">
<button type = "submit"> se conecter </button>
</form>
<?php if (!empty($message)) echo "<p style='color:blue;'>$message</p>"; ?>