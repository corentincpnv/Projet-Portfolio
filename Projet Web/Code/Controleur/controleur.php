<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 05.03.2018
 * Time: 11:45
 */
require "Modele/modele.php";

// Affichage de la page d'accueil
function accueil()
{
    require "vue/vue_exemple.php";
}
/**function fausse
if (!isset($connexion)){
    $connexion = login();
}
$login=$_SESSION['login'];
$res=aproposUtilisateur();
envoyerApropos($connexion, $login);
*/

function erreur($e)
{
    $_SESSION['erreur']=$e;
    require "vue/vue_erreur.php";
}
function login()
{
    if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pwd'])) {

        extract($_POST);

        //Appel de la fonction qui vérifie si le login existe dans la BD et retourne le mot de passe
        //définie dans le modèle
        $pwdFromBD= getPwdFromLogin(@$login);

        //on récupère bien un mot de passe
        if (isset($pwdFromBD) && !empty($pwdFromBD)) {
            if (($pwd == $pwdFromBD)) {
                //on peut accéder au site. Attention ni la vue ni la fonction ci-dessous n'existe pas encore
                $type = getLoginType($login);
                if ($type == 1){
                    $resultats = getlogin();
                    // ouverture de la session
                    session_start();
                    // enregistrement du type en session
                    $_SESSION['type'] = $type;
                    require "vue/vue_administrator.php";
                    exit();
                }
                if ($type[0] == 0){


                    require "vue/vue_portfolio.php";
                }
                else {

                }
            } else {
                $msg_err= 'Le mot de passe est incorrect';
                require "vue/vue_login.php";
            }
        } else {
            $msg_err= 'Aucun utilisateur avec ce login n\'est défini pour cette application.';
            require "vue/vue_login.php";
        }
    } else {
        require "vue/vue_login.php";
    }

}