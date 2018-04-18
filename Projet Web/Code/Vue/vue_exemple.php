<?php
/**
 * Created by PhpStorm.
 * User: corentin.bompard
 * Date: 16.04.2018
 * Time: 11:39
 * vue dans laquelle on verra des exemples de portfolio
 */
$titre ='Exemple Portfolio';
ob_start();
$res=afficherPortfolio();
$fkPortfolio = $res['fkPortfolio'];
$firstNameApropos = $res['firstName'];
$lastNameApropos = $res['lastName'];
$postalCodeApropos = $res['postalCode'];
$addressApropos = $res['address'];
$addressNumberApropos = $res['addressNumber'];
$phoneNumberApropos = $res['phoneNumber'];
$mailAddressApropos = $res['mailAddress'];

$ambitiousQuality = $res['ambitious'];
$calmQuality = $res['calm'];
$confidentQuality = $res['confident'];
$disciplinedQuality = $res['disciplined'];
$discreetQuality = $res['discreet'];
$dynamicQuality = $res['dynamic'];
$methodicalQuality = $res['methodical'];
$optimistQuality = $res['optimist'];
$fastQuality = $res['fast'];
$sensibleQuality = $res['sensible'];
$tidyQuality = $res['tidy'];
$voluntaryQuality = $res['voluntary'];

$artInterest = $res['art'];
$litteratureInterest = $res['litterature'];
$cinemaInterest = $res['cinema'];
$sportInterest = $res['sport'];
$travelInterest = $res['travel'];
$musicInterest = $res['music'];
?>
    <div class="exemplePortfolio">
        <title>Bienvenu sur mon Portfolio</title>
        <p>Je m'appelle <?php echo $lastNameApropos; ?> <?php echo $firstNameApropos; ?>.<br>
            J'habite <?php echo $postalCodeApropos; ?> <?php echo $addressApropos; ?> numéro : <?php echo $addressNumberApropos; ?>.<br>
            Vous pouvez me joindre au : <?php echo $phoneNumberApropos; ?>.<br>Et à l'adresse email : <?php echo $mailAddressApropos; ?>.
    </div>
    <div class="formulaire">
        <form>
            <table id="apropos">
                <input disabled="disabled" id="fkPortfolio" type="hidden" value="<?php echo $fkPortfolio; ?>">
            </table>
            <div class="modifydroite">
                <fieldset id="competences">
                    <p id="competences"><label>Mes compétences sont les suivantes :</label><br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="ambitieux" <?php echo ($ambitiousQuality==1 ? 'checked' : '');?> >Ambitieux<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="calme" <?php echo ($calmQuality==1 ? 'checked' : '');?> >Calme<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="confiant" <?php echo ($confidentQuality==1 ? 'checked' : '');?> >Confiant<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="discipline" <?php echo ($disciplinedQuality==1 ? 'checked' : '');?> >Discipliné<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="discret" <?php echo ($discreetQuality==1 ? 'checked' : '');?> >Discret<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="dynamique" <?php echo ($dynamicQuality==1 ? 'checked' : '');?> >Dynamique<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="methodique" <?php echo ($methodicalQuality==1 ? 'checked' : '');?> >Méthodique<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="optimiste" <?php echo ($optimistQuality==1 ? 'checked' : '');?> >Optimiste<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="rapide" <?php echo ($fastQuality==1 ? 'checked' : '');?> >Rapide<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="sensible" <?php echo ($sensibleQuality==1 ? 'checked' : '');?> >Sensible<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="soigneux" <?php echo ($tidyQuality==1 ? 'checked' : '');?> >Soigneux<br />
                        <input disabled="disabled" type="checkbox" name="competences[]" value="volontaire" <?php echo ($voluntaryQuality==1 ? 'checked' : '');?> >Volontaire<br />
                    </p>
                </fieldset>
                <fieldset id="interets">
                    <p id="interets"><label>Et mes centres d'intérets sont ceux-ci :</label><br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="art" <?php echo ($artInterest==1 ? 'checked' : '');?> >L'art<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="litterature" <?php echo ($litteratureInterest==1 ? 'checked' : '');?> >La littérature<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="cinema" <?php echo ($cinemaInterest==1 ? 'checked' : '');?> >Le cinéma<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="sport" <?php echo ($sportInterest==1 ? 'checked' : '');?> >Le sport<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="voyage" <?php echo ($travelInterest==1 ? 'checked' : '');?> >Le voyage<br />
                        <input disabled="disabled" type="checkbox" name="interets[]" value="musique" <?php echo ($musicInterest==1 ? 'checked' : '');?> >La musique<br />
                    </p>
                </fieldset>
                <p id="buttons">
                    <input type="button" onclick='window.location.reload(false)' value="Autre Portfolio" />
                </p>
            </div>
        </form>
    </div>

<?php
$contenu = ob_get_clean();
require "gabarit.php";
