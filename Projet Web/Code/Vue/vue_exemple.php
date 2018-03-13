<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 08.03.2018
 * Time: 09:09
 * vue dans laquelle on verra des exemples de portfolio
 */
$titre ='Portfolio';
ob_start();
?>

<?php
$contenu = ob_get_clean();
require "gabarit.php";