<?php
if (isset($_cookie["utilisateur"])){
 echo "bonjour" . $_cookie['utilisateur'];

}else {
 echo "aucun cookie trouvé.";
}