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
/**function getLogin($post)
{
    // connexion à la BD snows
    $connexion = getBD();

    // Requête pour sélectionner la personne loguée
    if ($post['fUserType'] == 'Client')
    {
        $requete = "SELECT * FROM tblclients WHERE login= '".$post['fLogin']."' AND passwd='".$post['fPass']."';";
    }
    else
    {
        $requete = "SELECT * FROM tblvendeurs WHERE login= '".$post['fLogin']."' AND passwd='".$post['fPass']."';";
    }

    // Exécution de la requête et renvoi des résultats
    $resultats = $connexion->query($requete);
    return $resultats;
} **/

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
function ajoutLogin() //ajout d'un login
{
    // Connexion à la BD et au serveur
    $connexion = getBD();
    extract($_POST);
    // test si la valeur est déjà existante
    try
    {
        // requête pour tester l'ID du login existe déjà
        $reqID ="SELECT idLogin FROM login WHERE idLogin ='".$fidLogin."';";
        $resID =$connexion->query($reqID);
        $ligne= $resID->fetch();

        // Ajout de snow si pas de doublon --> fetch() ne renvoie rien
        if (empty($ligne['idsurf']))
        {
            // pas de doublon --> OK, on peut insérer les données
            $reqIns="INSERT INTO login VALUES ('".$fIDSnow."','".$fMarque."','".$fBoot."','".$fType."',".$fDispo.",'')";
            $connexion->exec($reqIns);
        }
        else
        {
            // doublon --> erreur
            throw new Exception("Erreur : doublon sur la clé primaire IDSurf");
        }

    }
    catch (Exception $e)
    {
        trigger_error($e->getMessage(), E_USER_ERROR);
    }
}
function getALogin($ID) //sélectionner un login
{
    $connexion= getBD();
    $requete= "SELECT * FROM login WHERE idLogin='".$ID."';";
    $resultat = $connexion->query($requete);
    return $resultat;
}
function supprLogin($ID) //suppression d'un login
{
    $connexion = getBD();

    $req_suppr = "DELETE FROM login WHERE idLogin='".$ID."'";
    $connexion->exec($req_suppr);
}
function updateLogin($post) //modification d'un login
{
    $connexion = getBD();

    extract($post);  // Transfert des données du POST dans des variables
    // Repère la ligne
    $requete = "UPDATE login SET loginName='".$fLogin."',password='".$fPassword."', loginType='".$fTypeLogin."',loginState=".$fStateLogin." WHERE idLogin='".$fID."';";

    $connexion->exec($requete);
}
function safestrip($string){
    $string = strip_tags($string);
    $string = mysql_real_escape_string($string);
    return $string;
}
//function to show any messages
function messages() {
    $message = '';
    if($_SESSION['success'] != '') {
        $message = '<span class="success" id="message">'.$_SESSION['success'].'</span>';
        $_SESSION['success'] = '';
    }
    if($_SESSION['error'] != '') {
        $message = '<span class="error" id="message">'.$_SESSION['error'].'</span>';
        $_SESSION['error'] = '';
    }
    return $message;
}
function Login()
{
    if(empty($_POST['username']))
    {
        $this->HandleError("Nom d'utilisateur vide");
        return false;
    }

    if(empty($_POST['password']))
    {
        $this->HandleError("Mot de passe vide");
        return false;
    }

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(!$this->CheckLoginInDB($username,$password))
    {
        return false;
    }

    session_start();

    $_SESSION[$this->GetLoginSessionVar()] = $username;
    return true;
}
function CheckLoginInDB($username,$password)
{
    if(!$this->DBLogin())
    {
        $this->HandleError("Erreur de connexion à la base de données");
        return false;
    }
    $username = $this->SanitizeForSQL($username);
    $qry = "Select loginName from login ".
        " where username='$username' and password='$password' ";

    $result = mysql_query($qry,$this->connection);

    if(!$result || mysqli_num_rows($result) <= 0)
    {
        $this->HandleError("Error logging in. ".
            "Le mot de passe entré ne correspond pas");
        return false;
    }
    return true;
}
