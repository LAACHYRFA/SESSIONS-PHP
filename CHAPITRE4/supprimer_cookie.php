<?php
setcookie ("utilisateur", "", time() - 3600, "/");
echo "cookie 'utilisateur' supprime.";