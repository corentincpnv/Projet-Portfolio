<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 08.03.2018
 * Time: 09:09
 */
$titre ='Portfolio';
ob_start();
?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";