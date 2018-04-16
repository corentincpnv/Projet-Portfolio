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
                    // enregistrement du type en session
                    $_SESSION['login'] = $login;
                    require "vue/vue_administrator_list.php";

                }
                if ($type[0] == 0){
                    $_SESSION['login'] = $login;
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
function logout()
{
    require "vue/vue_logout.php";
    header('Location: index.php');
}
function update($Post){

}
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'administrator';
}

if ($action == 'administrator') {
    $users = getUsers();
    require 'vue/vue_administrator_list.php';
}/*
else if ($action == 'vueAdmin') {
    $idLogin = $_GET['idLogin'];
    vueAdmin($idLogin);
    include 'vue/user-information.php';
}*/
else if ($action == 'updateLogin') {
    $idLogin = $_POST['idLogin']; $loginName = $_POST['loginName']; $password = $_POST['password'];
    $loginType = $_POST['loginType']; $loginState = $_POST['loginState'];

    update_user($idLogin, $loginName, $password, $loginType, $loginState);
    $users = getUsers();
    include 'vue/vue_administrator_list.php';
}
else if ($action == 'deleteLogin') {
    $idLogin = $_POST['idLogin'];
    delete_login($idLogin);
    $users = getUsers();
    include 'vue/vue_administrator_list.php';
}