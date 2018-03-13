<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 06.03.2018
 * Time: 11:04
 */
$titre ='Erreur - Projet Portfolio';

// Tampon de flux stocké en mémoire
ob_start();
?>

<article>
    <header>
        <h2> Erreur </h2>
        <p>Action Impossible</p>
        <?=@$_SESSION['erreur'];?>
    </header>
</article>
<hr/>

<?php
$contenu = ob_get_clean();
require 'gabarit.php';
?>