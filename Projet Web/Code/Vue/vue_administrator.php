<?php
// ouverture de la session
session_start();
$titre ='Administrer Portfolio';
ob_start();
if(empty($_SESSION['login']))
{
    require "../index.php";
    exit();
}
else {
?>
    <div id="main">
        <div id="content">
            <h2> Update Customer </h2>
            <form action="../index.php" method="post" id="aligned">
                <input type="hidden" name="action" value="update_user" />
                <input type="hidden" name="idLogin" id="idLogin" />
                <label for="loginName">Nom du login:</label>
                <input type="text" name="loginName" id="loginName" autofocus></br>
                <label for="password">Mot de passe:</label>
                <input type="text" name="password" id="password"></br>
                <label for="loginType">Type de login:</label>
                <input type="checkbox" name="loginType" id="loginType"></br>
                <label for="loginState">Etat du login:</label>
                <input type="checkbox" name="loginState" id="loginState"></br>
            </form>
        </div>
    </div>
    <?php /*}*/?>
<?php
$contenu = ob_get_clean();
require "gabarit.php";