<?php
$titre ='Accueil Portfolio';
ob_start();
?>
<html>
    <head>
        <titre>Mon site de Portfolio</titre>
    </head>
<body>

</body>
</html>
<?php
$contenu = ob_get_clean();
require "gabarit.php";