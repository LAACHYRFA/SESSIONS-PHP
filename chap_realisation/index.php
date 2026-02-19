<?php
$taches = json_decode(file_get_contents('taches.json'), true);

// Ajouter 
if(!empty($_POST['titre'])){
    $id = empty($taches) ? 1 : end($taches)['id'] + 1;
    $taches[] = ["id"=>$id,"titre"=>$_POST['titre'],"etat"=>"a-faire"];
}

// Changer etat
if(!empty($_POST['changer'])){
    foreach($taches as &$tache){
        if($tache['id']==$_POST['changer']){
            if($tache['etat'] == "a-faire"){
                $tache['etat'] = "fait";
            }else {
                $tache['etat'] = "a-faire";
            }
         }
     }
}  

// Supprimer
if(!empty($_POST['supprimer'])){
    $nvltaches = [];
    foreach($taches as $tache){
        if($tache['id'] != $_POST['supprimer']){
            $nvltaches[] = $tache;
        }
    }
    $taches = $nvltaches;
}

// Filtre
$filter = $_POST['filter'] ?? 'toutes';
$afficher = [];
if($filter == "toutes"){
    $afficher = $taches;
}else {
    foreach($taches as $tache){
        if($tache['etat'] == $filter){
            $afficher[] = $tache;
        }
    }
}
// Sauvegarder
file_put_contents('taches.json', json_encode($taches));
?>

<h1>Mes tâches</h1>
<form method="post">
    <!-- Ajouter -->
   <input type="text" name="titre" placeholder="Titre de la tâche">
    <button type="submit">Ajouter</button>
    <!-- Filter -->
    <input type="submit" name="filter" value="toutes">
    <input type="submit" name="filter" value="a-faire">
    <input type="submit" name="filter" value="fait">
</form>

<table border="1">
<tr> 
    <th>ID</th>
    <th>Titre</th>
    <th>Etat</th>
    <th>Actions</th>
</tr>  

<?php
foreach($afficher as $tache){
    echo '<tr>';
    echo '<td>' . $tache['id'] . '</td>';
    echo '<td>' . htmlspecialchars($tache['titre']) . '</td>';
    echo '<td>' . $tache['etat'] . '</td>';
    echo '<td>';

    // Supprimer as input
    echo '<form method="post" style="display:inline;">';
    echo '<input type="submit" name="supprimer" value="' . $tache['id'] . '">';
    echo '</form>';

    echo '</td>';
    echo '</tr>';
}
?>
</table>
