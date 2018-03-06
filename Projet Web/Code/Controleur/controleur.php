<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 05.03.2018
 * Time: 11:45
 */
require "../Modele/modele.php";

// Affichage de la page d'accueil
function accueil()
{
    require "../vue/vue_accueil.php";
}

//Affichage de la page de login
function login()
{
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])) {

        extract($_POST);

        //Appel de la fonction qui vérifie si le login existe dans la BD et retourne le mot de passe
        //définie dans le modèle
        $pwdFromBD= getPwdFromLogin($login);

        //on récupère bien un mot de passe
        if (isset($pwdFromBD) && !empty($pwdFromBD)) {
            if (password_verify($pwd, $pwdFromBD)) {
                //on peut accéder au site. Attention ni la vue ni la fonction ci-dessous n'existe pas encore
                $resultats = getListeTypesRecette();
                $ligne = getLoginInfo($login);
                require "../vue/vue_liste_recettes.php";
            } else {
                $msg_err= 'Le mot de passe est incorrect';
                require "../vue/vue_login.php";
            }
        } else {
            $msg_err= 'Aucun utilisateur avec ce login n\'est défini pour cette application.';
            require "../vue/vue_login.php";
        }
    } else {
        require "../vue/vue_login.php";
    }

}
// Parametres mysql à remplacer par les vôtres
define('DB_SERVER', 'localhost'); // serveur mysql
define('DB_SERVER_USERNAME', 'root'); // nom d'utilisateur
define('DB_SERVER_PASSWORD', 'motdepasse'); // mot de passe
define('DB_DATABASE', 'telechargements'); // nom de la base
// Connexion au serveur mysql
$connect = mysql_connect(DB_SERVER, DB_SERVER_USERNAME,
    DB_SERVER_PASSWORD)
or die('Impossible de se connecter : ' . mysql_error());
// sélection de la base de données
mysql_select_db(DB_DATABASE, $connect);
$msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement remplis:
<br/><br/>";
$msg_ok = "Votre demande a bien été prise en compte.";
$message = $msg_erreur;
// vérification des champs
if (empty($_POST['civilite']))
    $message .= "Votre civilité<br/>";
if (empty($_POST['nom']))
    $message .= "Votre nom<br/>";
if (empty($_POST['adresse']))
    $message .= "Votre adresse<br/>";
if (empty($_POST['codepostal']))
    $message .= "Votre code postal<br/>";
if (empty($_POST['ville']))
    $message .= "Votre ville<br/>";
if (empty($_POST['comments']))
    $message .= "Votre message<br/>";

// si un champ est vide, on affiche le message d'erreur
if (strlen($message) > strlen($msg_erreur)) {

    echo $message;

// sinon c'est ok
} else {

    foreach($_POST as $index => $valeur) {
        $$index = mysql_real_escape_string(trim($valeur));
    }

    $interets = $_POST['interets'];
    $sqlinterets = '';
    for ($i=0; $i<count($interets); $i++)
    {
        $sqlinterets .= $interets[$i];
        $sqlinterets .= ', ';
    }

    $sql = "INSERT INTO formulaire VALUES ('', '".$civilite."', '".$nom."', 
    '".$adresse."', '".$codepostal."', '".$ville."', '".$pays."',
    '".$sqlinterets."', '".$comments."', now())";
    $res = mysql_query($sql);

    if ($res) {
        echo $msg_ok;
    } else {
        echo mysql_error();
    }

}
?>