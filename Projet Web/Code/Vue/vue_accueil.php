<?php
$titre ='Accueil Portfolio';
ob_start();
?>


<?php
$contenu = ob_get_clean();
require "gabarit.php";
