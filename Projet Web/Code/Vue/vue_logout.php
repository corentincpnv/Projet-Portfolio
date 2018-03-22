<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 22.03.2018
 * Time: 08:17
 */
$titre = 'Déconnection';
$_SESSION = array();
session_destroy();
?>
<?php
$contenu = ob_get_clean();
require "gabarit.php";
