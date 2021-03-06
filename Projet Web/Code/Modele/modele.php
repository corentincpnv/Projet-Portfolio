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
function afficherPortfolio(){
    $connexion = getBD();
    $requete="select * from portfolio inner join login on login.fkPortfolio = portfolio.idPortfolio 
inner join about on portfolio.idPortfolio = about.fkPortfolio 
inner join listofinterests on portfolio.idPortfolio = listofinterests.fkPortfolio 
inner join listofqualities on portfolio.idPortfolio = listofqualities.fkPortfolio 
where login.loginType = 0 AND portfolio.visible = 1 ORDER BY RAND() LIMIT 0,1;";
    $resultats = $connexion->query($requete);
    while ($ligne= $resultats ->fetch()){
        $Retour["fkPortfolio"] = $ligne['fkPortfolio'];
        $Retour["firstName"] = $ligne['firstName'];
        $Retour["lastName"] = $ligne['lastName'];
        $Retour["postalCode"] = $ligne['postalCode'];
        $Retour["address"] = $ligne['address'];
        $Retour["addressNumber"] = $ligne['addressNumber'];
        $Retour["phoneNumber"] = $ligne['phoneNumber'];
        $Retour["mailAddress"] = $ligne['mailAddress'];

        $Retour["ambitious"] = $ligne['ambitious'];
        $Retour["calm"] = $ligne['calm'];
        $Retour["confident"] = $ligne['confident'];
        $Retour["disciplined"] = $ligne['disciplined'];
        $Retour["discreet"] = $ligne['discreet'];
        $Retour["dynamic"] = $ligne['dynamic'];
        $Retour["methodical"] = $ligne['methodical'];
        $Retour["optimist"] = $ligne['optimist'];
        $Retour["fast"] = $ligne['fast'];
        $Retour["sensible"] = $ligne['sensible'];
        $Retour["tidy"] = $ligne['tidy'];
        $Retour["voluntary"] = $ligne['voluntary'];

        $Retour["art"] = $ligne['art'];
        $Retour["litterature"] = $ligne['litterature'];
        $Retour["cinema"] = $ligne['cinema'];
        $Retour["sport"] = $ligne['sport'];
        $Retour["travel"] = $ligne['travel'];
        $Retour["music"] = $ligne['music'];
    }
    return $Retour;
}
function aproposUtilisateur(){

    $connexion = getBD();
    $login=$_SESSION['login'];
    $requete="select * from about inner join portfolio on about.fkPortfolio = idPortfolio inner join login on idPortfolio = login.fkPortfolio where loginName = '$login'";
    $resultats = $connexion->query($requete);
    while ($ligne= $resultats ->fetch()){
        $Retour["fkPortfolio"] = $ligne['fkPortfolio'];
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
function competencesUtilisateur(){
    $connexion = getBD();
    $login=$_SESSION['login'];
    $requete="select * from portfolio inner join login on login.fkPortfolio = idPortfolio inner join listofqualities on idPortfolio = listofqualities.fkPortfolio inner join listOfInterests on idPortfolio = listofinterests.fkPortfolio where loginName = '$login'";
    $resultats = $connexion->query($requete);
    while ($ligne= $resultats ->fetch()){
        $Retour["ambitious"] = $ligne['ambitious'];
        $Retour["calm"] = $ligne['calm'];
        $Retour["confident"] = $ligne['confident'];
        $Retour["disciplined"] = $ligne['disciplined'];
        $Retour["discreet"] = $ligne['discreet'];
        $Retour["dynamic"] = $ligne['dynamic'];
        $Retour["methodical"] = $ligne['methodical'];
        $Retour["optimist"] = $ligne['optimist'];
        $Retour["fast"] = $ligne['fast'];
        $Retour["sensible"] = $ligne['sensible'];
        $Retour["tidy"] = $ligne['tidy'];
        $Retour["voluntary"] = $ligne['voluntary'];

        $Retour["art"] = $ligne['art'];
        $Retour["litterature"] = $ligne['litterature'];
        $Retour["cinema"] = $ligne['cinema'];
        $Retour["sport"] = $ligne['sport'];
        $Retour["travel"] = $ligne['travel'];
        $Retour["music"] = $ligne['music'];
    }
    return $Retour;
}
/*function update($Post){
    $connexion = getBD();
    extract($_POST);
    $connexion->exec("update about set firstName = '$prenom', lastName = '$nom', postalCode = '$codepostal', address = '$address', addressNumber = '$numero', phoneNumber = '$numerodetelephone', mailAddress = '$email' where fkPortfolio = '$Post['fkPortfolio']'");
    $connexion->exec("update listofinterests set art = '$art', litterature = '$litterature', cinema = '$cinema', sport = '$sport', travel = '$voyage', music = '$musique'where fkPortfolio = '$fkPortfolio'");
    $connexion->exec("update listofqualities set ambitious = '$ambitieux', calm = '$calme', confident = '$confiant', disciplined = '$discipline', discreet = '$discret', dynamic = '$dynamique',methodical = '$methodique', optimist = '$optimiste', sensible = '$sensible', tidy = '$soigneux', voluntary = '$volontaire' where fkPortfolio = '$fkPortfolio'");
}*/
function getUsers() {
    $connexion = getBD();
    $query = "SELECT * FROM login ORDER BY loginName";
    $users = $connexion->query($query);
    return $users;
}

function delete_login($idLogin) {
    $connexion = getBD();
    $query = "DELETE FROM login WHERE idLogin = '$idLogin'";
    $connexion->exec($query);
}

function update_user($idLogin, $loginName, $password, $loginType, $loginState) {
    $connexion = getBD();
    $query = "UPDATE login
              SET
              loginName = '$loginName', password = '$password', loginType = '$loginType', loginState = '$loginState'
              WHERE idLogin = '$idLogin' ";
    $connexion->exec($query);
}
