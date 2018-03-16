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
//Récupère les informations du login
function getLoginType($login)
{
    $connexion = getBD();
    $requete = "SELECT loginType FROM login WHERE loginName='" . $login . "'";
    $resultats = $connexion->query($requete);
    $type = $resultats->fetch();
    return $type;
}
function getlogin()
{
    // Connexion à la BD et au serveur
    $connexion = getBD();

    // Création de la string pour la requête
    $requete = "SELECT loginName FROM login ORDER BY idLogin;";
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
        return $donnees['password'];
    } else {
        return '';
    }
}
function aproposUtilisateur(){

    $connexion = getBD();

    $login=$_SESSION['login'];
    $requete="select * from about inner join portfolio on about.fkPortfolio = idPortfolio inner join login on idPortfolio = login.fkPortfolio where loginName = '$login'";
    $resultats = $connexion->query($requete);
    while ($ligne= $resultats ->fetch()){
        $Retour["firstName"] = $ligne['firstName'];
        $Retour["lastName"] = $ligne['lastName'];
        $Retour["postalCode"] = $ligne['postalCode'];
        $Retour["address"] = $ligne['address'];
        $Retour["addressNumber"] = $ligne['addressNumber'];
        $Retour["phoneNumber"] = $ligne['phoneNumber'];
        $Retour["mailAddress"] = $ligne['mailAddress'];
    }
    return $Retour;
}