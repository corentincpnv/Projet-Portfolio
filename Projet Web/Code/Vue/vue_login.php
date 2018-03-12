<?php
$titre ='Modifier Portfolio';
ob_start();
?>
<header>

    <h2>Connexion</h2>
    <p>Veuillez vous connecter pour avoir accès au site.</p>
</header>

<?php

if (isset($msg_err) && !empty($msg_err)) {
    echo $msg_err;
}
?>

    <form method="post" action="index.php?action=login">
        <div>
            <label>Login : </label>
        </div>
        <div>
            <input type="login" size="40" name="login" required/>
        </div>
        <br/>
        <div>
            <label>Mot de passe : </label>
        </div>
        <div>
            <input type="password" size="40" name="pwd" required/>
        </div>
        <br/>

        <div>
            <input type="submit" name="connecter" value="Se connecter"></input>
            <input type="reset" value="Réinitialiser"></input>
        </div>

    </form>
<?php
$contenu = ob_get_clean();
require "gabarit.php";