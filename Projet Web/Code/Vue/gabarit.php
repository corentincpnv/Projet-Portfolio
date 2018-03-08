<!--
Projet Portfolio
Version 1.0
Corentin Bompard
Src : https://github.com/BlackrockDigital/startbootstrap-resume
-->
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $titre;?></title>

    <!-- Bootstrap core CSS -->
    <link href="../Contenu/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template 0-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="../Contenu/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Contenu/vendor/devicons/css/devicons.min.css" rel="stylesheet">
    <link href="../Contenu/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../Contenu/css/resume.css" rel="stylesheet">
</head>
<body id="page-top">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

    <div class="navbar-brand">
        <button type="button" class="bouton-menu" data-toggle="collapse" data-target=".nav-collapse">
            AUTRES PAGES <span class="icon-chevron-down icon-white"></span>
        </button>
        <div class="nav-collapse collapse">
            <ul class="nav nav-pills">
                <li class="bouton-autres-pages"<?php if (!isset($_GET['action'])) echo 'class="active"'; ?>><a href="../index.php">Accueil</a></li>
                <li class="bouton-autres-pages"<?php if (@$_GET['action']=="vue_exemple") echo 'class="active"'; ?>><a href="../index.php?action=vue_exemple.php">Exemples</a></li>
                <li class="bouton-autres-pages"<?php if (@$_GET['action']=="vue_login") echo 'class="active"'; ?>><a href="../index.php?action=vue_login.php">
                        <?php if(!isset($_SESSION['login'])) :?>
                            Login
                        <?php else :?>
                            Logout
                        <?php endif ?>
                    </a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="content">
    <div class="inner">

        <?=$contenu ?>

    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="../Contenu/vendor/jquery/jquery.min.js"></script>
<script src="../Contenu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../Contenu/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for this template -->
<script src="../Contenu/js/resume.min.js"></script>

</body>

</html>