<?php
$titre ='Accueil Portfolio';
ob_start();
?>
<?php
require 'vue_exemple.php'?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
