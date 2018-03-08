<!--
 * Projet Portfolio index.php
 * User: corentin.bompard
 * Date: 01.03.2018
 * Time: 09:32
 * Src : https://github.com/BlackrockDigital/startbootstrap-resume & projet snows
-->
<?php
session_set_cookie_params(1200); // durée de vie de session à 20 min si > destruction automatique
session_start();
require  'Controleur/controleur.php';
try
{
    if (isset($_GET['action']))
    {
        $action = $_GET['action'];

        switch ($action)
        {
            case 'welcome' :
                accueil(); //appel de la fonction dans le controleur
                break;
            case 'login' :
                login(); //appel de la fonction dans le controleur
                break;
            case 'rechercher_recettes' :
                rechercheRecettes(); //appel de la fonction dans le controleur
                break;
            case 'rechercher_photo' :
                recherchePhotos();
                break;
            case 'ouvrir_fichier' :
                $nomfichier = $_GET['fichier'];
                ouvrirFichier($nomfichier); //appel de la fonction dans le controleur
                break;
            case 'afficher_film' :
                rechercheFilms(); //appel de la fonction dans le controleur
                break;
            case 'afficher_contenu_pedagogique' :
                rechercheContenuPedagogique(); //appel de la fonction dans le controleur
                break;
            case 'importer_donnees' :
                importDonnees();
                break;
            case 'rechercher_doc_enseignant' :
                rechercheDocEnseignant(); //appel de la fonction dans le controleur
                break;
            case 'logout' :
                logout();
                break;
            case 'changer_pwd' :
                changePwd();
                break;
            default :
                throw new Exception("action non valide");
        }
    }
    else
        accueil();

}
catch (Exception $e)
{
    erreur($e->getMessage());
}