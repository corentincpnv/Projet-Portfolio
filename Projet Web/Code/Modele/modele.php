<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 01.03.2018
 * Time: 10:03
 */
//connexion au serveur MySQL et à la BD
function getBD() {
    $connexion = new PDO('mysql:host=localhost;dbname=ProjetPortfolio;charset=utf8', 'root', '');
    // permet d'avoir plus de détails sur les erreurs retournées
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connexion;

}
//Fonction : vérifie le login de l'utilisateur
//Sortie : résultat de la requête
function getListePortfolio()
{
    $connexion = getBD();
    $requete = "SELECT * FROM about, listofinterests, listofqualities";
    $resultats = $connexion->query($requete);
    return $resultats;
}
//Récupère les informations du login
function getLoginInfo($login)
{
    $connexion = getBD();
    $requete = "SELECT idLogin, loginName, loginType FROM login WHERE login='" . $login . "'";
    $resultats = $connexion->query($requete);
    $ligne = $resultats->fetch();
    return $ligne;
}
function getlogin()
{
    // Connexion à la BD et au serveur
    $connexion = getBD();

    // Création de la string pour la requête
    $requete = "SELECT * FROM login ORDER BY idLogin;";
    // Exécution de la requête
    $resultats = $connexion->query($requete);
    return $resultats;
}

//Fonction : vérifie le login de l'utilisateur
//Sortie : résultat de la requête
function getPwdFromLogin($login)
{
    $connexion = getBD();
    $requete = "SELECT idLogin, password FROM login WHERE loginName='" . $login . "'";
    $resultats = $connexion->query($requete);
    if ($donnees = $resultats->fetch()) {
        return $donnees['pwd'];
    } else {
        return '';
    }
}