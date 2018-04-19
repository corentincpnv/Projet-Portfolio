<?php
$titre ='Accueil Portfolio';
ob_start();
?>
<html>
    <head>
        <h2>Bienvenue sur mon site de Portfolio</h2>
    </head>
<body>
    <h3>Ce site permet de créer un portfolio et de pouvoir le montrer à des proches</h3>
    <p>Pour cela il suffit de te connecter avec le bouton <a <?php if (@$_GET['action']=="vue_login") echo 'class="active"'; ?>><a href="index.php?action=login">
            <?php if(!isset($_SESSION['login'])) :?>
                Se connecter
            <?php else :?>
                Se déconnecter
            <?php endif ?>
        </a> juste ici </p>
    <p>Voici un exemple de Portfolio</p>
    <img src="././Contenu/img/exemplePortfolio.PNG">
</body>
</html>
<?php
$contenu = ob_get_clean();
require "gabarit.php";