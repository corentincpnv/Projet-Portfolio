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
            case 'vue_accueil' :
                accueil();
                break;
            case 'vue_snow' :
                snows();
                break;
            case 'vue_login' :
                login();
                break;
            case 'vue_del_snow' :
                deleteSnow();
                break;
            case 'vue_add_snow' :
                addSnow();
                break;
            case 'vue_upd_snow' :
                updateSnow();
                break;
            case 'vue_panier_demande' :
                panierDemande();
                break;
            case 'vue_panier_gestion' :
                panierGestion();
                break;
            case 'vue_panier_gestion_del' :
                panierGestionDel();
                break;
            case 'vue_panier_gestion_upd' :
                panierGestionUpd();
                break;
            case 'vue_snow_louer' :
                snowLouer();
                break;
            case 'vue_location_gestion' :
                LocationGestion();
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